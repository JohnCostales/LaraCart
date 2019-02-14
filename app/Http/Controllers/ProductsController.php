<?php

namespace App\Http\Controllers;

//-- HEADERS --//
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Auth;
use Session;
use App\Category;
use App\Product;
use App\ProductsAttribute;

class ProductsController extends Controller
{
    public function addProduct(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // Redirect page if category field is empty
            if (empty($data['category_id'])) {
                return redirect()->back()->with('flash_message_error', 'Please choose a category for the product');
            }
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->description = $data['description'];   
            $product->price = $data['price'];
            
            //Image Upload
            if($request->hasFile('image')){
                // echo $image_tmp = Input::file('image');
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){

                    // Declare file paths
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename; // Path the images to folders
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;

                    // Resize images
                    Image::make($image_tmp)->fit(1200,1200)->save($large_image_path); // Resize images -> save image
                    Image::make($image_tmp)->fit(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->fit(300,300)->save($small_image_path);

                    // Store image name in products table
                    $product->image = $filename;
                }
            }
            else {
                $product->image = '';
            }

            $product->save();
            return redirect('admin/view-products')->with('flash_message_success', 'Product has been added successfully!');
        }

        // List available categories
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>"; 
            }
        }

        return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }

    public function editProduct(Request $request, $id){
        // echo "test"; die;

        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            //Image Upload
            if($request->hasFile('image')){
                // echo $image_tmp = Input::file('image');
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){

                    // Declare file paths
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename; // Path the images to folders
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;

                    // Resize images
                    Image::make($image_tmp)->fit(1200,1200)->save($large_image_path); // Resize images -> save image
                    Image::make($image_tmp)->fit(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->fit(300,300)->save($small_image_path);
                }
            }
            else {
                $filename = $data['current_image'];
            }

            Product::where(['id'=>$id])->update([
                'category_id'=>$data['category_id'],
                'product_name'=>$data['product_name'],
                'product_code'=>$data['product_code'],
                'description'=>$data['description'],
                'price'=>$data['price'],
                'image'=>$filename, 
                ]);

            return redirect()->back()->with('flash_message_success', 'Product updated successfully' );
        }

        //Product Details
        $productDetails = Product::where(['id'=>$id])->first();

        // List available categories
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach($categories as $cat){
            // List Selected Category
            if ($cat->id==$productDetails->category_id) {
                $selected = "selected";
            }
            else {
                $selected = "";
            }
            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat) {
                if ($sub_cat->id==$productDetails->category_id) {
                    $selected = "selected";
                }
                else {
                    $selected = "";
                }
                $categories_dropdown .= "<option value = '".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>"; 
            }
        }

        return view('admin.products.edit_product')->with(compact('productDetails', 'categories_dropdown'));
    }

    public function viewProducts(){
        $products = Product::get();

        // $products = json_decode(json_encode($products));
        // echo "<pre>"; print_r($products);die;

        // Grab each category under the category id
        foreach($products as $key => $item){
            $category_name = Category::where(['id'=>$item->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        return view('admin.products.view_products')->with(compact('products'));
    }

    public function deleteProduct($id){
        // echo "test";
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully'); 
    }

    // Pass id as paramaeter to write query to delete products
    public function deleteProductImage($id){

        // Get image name
        $productImage = Product::where(['id'=>$id])->first();
        // echo $productImage->image; die;

        // Get image path
        $large_image_path = 'images/backend_images/products/large/';
        $medium_image_path = 'images/backend_images/products/medium/';
        $small_image_path = 'images/backend_images/products/small/';

        // echo $large_image_path.$productImage->image; die;

        // Delete Larage Image if not exist in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }
        // echo $large_image_path.$productImage->image; die;

        // Medium
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Small
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }
        
        // Delete the image
        Product::where(['id'=>$id])->update(['image'=>'']); // update image as an empty product

        return redirect()->back()->with('flash_message_success', 'Product image has been deleted');
        
    }

    // Product attribues
    public function addAttributes(Request $request, $id=null)
    {
        // echo "test"; die;
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        // $productDetails = json_decode(json_encode($productDetails));
        // echo "<pre>"; print_r($productDetails); die;
        
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            foreach($data['sku'] as $key => $val){
                if(!empty($val)){
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id; 
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_success','Product details added');
        }
        return view('admin.products.add_attributes')->with(compact('productDetails'));
        
    }

    public function deleteAttribute($id){
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Attribute has been deleted successfully'); 
    }

    //Using Category URL variable to display items within the category
    public function products($url = null)
    {

        // 404 if url or category status is null is incorrect
        $countCategory = Category::where(['url'=>$url, 'status'=>1])->count();
        // echo $countCategory;die;
        if($countCategory==0){
            abort(404);
        }
        // echo $url; die;
        //Get parent categories their sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $categoryList = Category::where(['url' => $url])->first();
        // $categoryList = json_decode(json_encode($categoryList));
        // echo "<pre>"; print_r($categoryList);die;

        if($categoryList->parent_id==0){
            // if the url is a main category
            $subCategories = Category::where(['parent_id'=>$categoryList->id])->get();

            foreach($subCategories as $key => $subcat){
                $cat_ids[] = $subcat->id;
            }
            // print_r ($cat_ids);die;

            $productsAll = Product::whereIn('category_id', $cat_ids)->get();
            // $productsAll = json_decode(json_encode($productsAll));
            // echo "<pre>"; print_r($productsAll);die;
        }
        else{
            // If the url is a sub category
            $productsAll = Product::where(['category_id' => $categoryList->id])->get();
        }

        

        // echo $category->id; die;
        
        
        return view('products.list')->with(compact('categories','categoryList', 'productsAll'));
    }

    public function product($id = null){
        // Product Details
        $productDetails = Product::where('id', $id)->first();
        
        //Get parent categories their sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        return view('products.detail')->with(compact('productDetails', 'categories'));
    }
}