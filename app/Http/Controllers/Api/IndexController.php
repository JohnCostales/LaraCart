<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;    
use App\Category;

class IndexController extends Controller
{
    public function index()
    {
        // Ascending order by id (default)
        $productsAll = Product::all(); 

        // Display all Categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        
        return $productsAll;
    }
}
