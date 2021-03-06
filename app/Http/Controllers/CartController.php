<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

// Extensions
use Image;
use Auth;
use Session;
use DB;
// Models used
use App\Category;
use App\Product;
use App\ProductsAttribute;

class CartController extends Controller
{
    // Add items into cart
    public function addToCart(Request $request)
    {
        // Call a request to all items
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;

        // Get past authentication
        if(empty($data['user_email'])){
            $data['user_email'] = '';
        }
        
        // Get current session id
        $session_id = Session::get('session_id');
        // Check session is still empty and generate random string as a session and place into session
        if(empty($session_id)){
            $session_id = str_random(40);
            Session::put('session_id', $session_id);
        }

        // Break the string into an array to call just the second element
        $sizeArr = explode("-",$data['size']);
        // echo "<pre>"; print_r($sizeArr); die;

        $countProducts = DB::table('carts')->where([
            'product_id'=>$data['product_id'],
            'size'=>$sizeArr[1],
            'session_id'=>$session_id,
            ])->count();
            // echo $countProducts; die;

            // Insert in to carts table
            if($countProducts>0){
                return redirect()->back()->with('flash_message_error', 'Product already exists in Cart');
            }
            else{
                DB::table('carts')->insert([
                    'product_id'=>$data['product_id'], 
                    'product_name'=>$data['product_name'],
                    'product_code'=>$data['product_code'],
                    'size'=>$sizeArr[1],
                    'price'=>$data['price'],
                    'quantity'=>$data['quantity'],
                    'user_email'=>$data['user_email'],
                    'session_id'=>$session_id,
                    ]);
            }
            
        return redirect('cart')->with('flash_message_success', 'Product has been added to your cart!');
    }

    public function shoppingCart(Request $request)
    {
        // Query into session
        $session_id = Session::get('session_id');
        // Add to user's cart
        $userCart = DB::table('carts')->where(['session_id'=>$session_id])->get();
        // Get products from key in carts table to get product images
        foreach($userCart as $key => $products){
            // echo $products->product_id;die;
            $productDetails = Product::where('id',$products->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }
        // echo "<pre>"; print_r($userCart);die;
        return view('products.cart')->with(compact('userCart'));
    }

    public function deleteCart($id = null)
    {
        // echo $id; die;
        // Delete product from cart
        DB::table('carts')->where('id', $id)->delete();
        return redirect('cart')->with('flash_message_success', 'Product has been deleted from your cart');
    }

    // Update cart quantity
    public function updateCartQuantity($id, $quantity = null){
        DB::table('carts')->where('id',$id)->increment('quantity',$quantity); // Laravel 5.6 allows the use of increments and decrements to add or subtract quantity
        return redirect('cart')->with('flash_message_success', 'Product quanitity has been updated from your cart');
    }
}
