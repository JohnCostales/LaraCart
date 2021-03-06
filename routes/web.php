<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], '/admin', 'AdminController@login');

Auth::routes();

// All User Access
Route::get('/home', 'HomeController@index')->name('home');

// Home
Route::get('/', 'IndexController@index');

/*--- Products Controller ---*/
// Category/Listing Page
Route::get('/products/{url}', 'ProductsController@products');
// Product Detail Page
Route::get('product/{id}', 'ProductsController@product');
// Product Attribute Price
Route::get('/get-product-price', 'ProductsController@getProductPrice');

/*--- Cart Controller ---*/
// Add to Cart Route
Route::match(['get', 'post'], '/add-cart','CartController@addtocart');
// Shopping Cart
Route::match(['get', 'post'], '/cart','CartController@shoppingCart');
// Delete Product from Cart Page
Route::get('/cart/delete-product/{id}', 'CartController@deleteCart');
// Update Product Quantity
Route::get('/cart/update-quantity/{id}/{quantity}','CartController@updateCartQuantity'); 

// Admin middleware. Routes only accissible to logged in users
Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@checkPassword');
    Route::match(['get', 'post'],'/admin/update-pwd','AdminController@updatePassword');

    // Categories routes for Admins
    Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
    Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoryController@editCategory');
    Route::match(['get', 'post'], '/admin/delete-category/{id}', 'CategoryController@deleteCategory');
    Route::get('/admin/view-categories', 'CategoryController@viewCategories');

    // Product routes for Admins
    Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
    Route::match(['get', 'post'], '/admin/edit-product/{id}', 'ProductsController@editProduct');
    Route::get('/admin/view-products', 'ProductsController@viewProducts'); 
    Route::get('/admin/delete-product/{id}', 'ProductsController@deleteProduct');
    Route::get('/admin/delete-product-image/{id}', 'ProductsController@deleteProductImage');

    //Products attributes routes for Admins
    Route::match(['get', 'post'], 'admin/add-attributes/{id}', 'ProductsController@addAttributes');
    Route::match(['get', 'post'], 'admin/update-attributes/{id}', 'ProductsController@updateAttributes');
    Route::get('/admin/delete-attribute/{id}', 'ProductsController@deleteAttribute');
});