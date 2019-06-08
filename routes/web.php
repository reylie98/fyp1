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

Route::get('/','IndexController@index');

Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//category listing
Route::get('/products/{url}','ProductsController@product');
// product detail page
Route::get('/product/{id}','ProductsController@products');
//get product attribute price
Route::get('/getproductprice','ProductsController@productprice');
//add to cart
Route::match(['get','post'],'/addcart','ProductsController@addtocart');
Route::match(['get','post'],'/cart','ProductsController@cart');
Route::get('/cart/deleteproduct/{id}','ProductsController@deletecart');
//delete product from cart
Route::get('/cart/updatequantity/{id}/{quantity}','ProductsController@updatequantity');

Route::group(['middleware'=> ['auth']],function(){
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/updatepwd','AdminController@updatePassword');

    Route::match(['get','post'],'/admin/addcategory','CategoryController@addCategory');
    Route::match(['get','post'],'/admin/editcategory/{id}','CategoryController@editCategory');
    Route::match(['get','post'],'/admin/deletecategory/{id}','CategoryController@deleteCategory');
    Route::get('/admin/viewcategory','CategoryController@viewCategory');

    Route::match(['get','post'],'/admin/addproduct','ProductsController@addProduct');
    Route::get('/admin/viewproduct','ProductsController@viewProduct');
    Route::match(['get','post'],'/admin/editproduct/{id}','ProductsController@editProduct');
    Route::get('/admin/deleteproduct/{id}','ProductsController@deleteProduct');

    Route::match(['get','post'],'/admin/addatributes/{id}','ProductsController@addAttributes');
    Route::match(['get','post'],'/admin/addatributes/{id}','ProductsController@addAttributes');
    Route::match(['get','post'],'/admin/editatributes/{id}','ProductsController@editAttributes');
    Route::match(['get','post'],'/admin/addimages/{id}','ProductsController@addImages');
    Route::get('/admin/deleteatribute/{id}','ProductsController@deleteAttribute');
    Route::get('/admin/deletealtimage/{id}','ProductsController@deletealtimage');
    
    Route::match(['get','post'],'/admin/addcoupon','CouponsController@addCoupon');
    Route::get('/admin/viewcoupon','CouponsController@viewCoupons');
});

Route::get('/logout','AdminController@logout');