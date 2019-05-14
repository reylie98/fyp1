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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
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
    Route::get('/admin/deleteatribute/{id}','ProductsController@deleteAttribute');
    
});

Route::get('/logout','AdminController@logout');