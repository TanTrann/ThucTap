<?php

use Illuminate\Support\Facades\Route;

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
//trangchu
Route::get('/','App\Http\Controllers\HomeController@index');

//gioithieu
Route::get('/gioi-thieu','App\Http\Controllers\AboutController@about');


//admin
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');

//backend + Category
Route::get('/add-category','App\Http\Controllers\CategoryController@add_category');
Route::get('/all-category','App\Http\Controllers\CategoryController@all_category');
Route::get('/edit-category/{category_id}','App\Http\Controllers\CategoryController@edit_category');
Route::post('/save-category','App\Http\Controllers\CategoryController@save_category');
Route::post('/update-category/{category_id}','App\Http\Controllers\CategoryController@update_category');
Route::get('/delete-category/{category_id}','App\Http\Controllers\CategoryController@delete_category');


Route::get('/unactive-category/{category_id}','App\Http\Controllers\CategoryController@unactive_category');
Route::get('/active-category/{category_id}','App\Http\Controllers\CategoryController@active_category');


//backend + Brand
Route::get('/add-brand','App\Http\Controllers\BrandController@add_brand');
Route::get('/all-brand','App\Http\Controllers\BrandController@all_brand');
Route::get('/edit-brand/{brand_id}','App\Http\Controllers\BrandController@edit_brand');
Route::post('/save-brand','App\Http\Controllers\BrandController@save_brand');
Route::post('/update-brand/{brand_id}','App\Http\Controllers\BrandController@update_brand');
Route::get('/delete-brand/{brand_id}','App\Http\Controllers\BrandController@delete_brand');

Route::get('/unactive-brand/{brand_id}','App\Http\Controllers\BrandController@unactive_brand');
Route::get('/active-brand/{brand_id}','App\Http\Controllers\BrandController@active_brand');



//backend + Product
Route::get('/add-product','App\Http\Controllers\productController@add_product');
Route::get('/all-product','App\Http\Controllers\productController@all_product');
Route::get('/edit-product/{product_id}','App\Http\Controllers\productController@edit_product');
Route::post('/save-product','App\Http\Controllers\productController@save_product');
Route::post('/update-product/{product_id}','App\Http\Controllers\productController@update_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\productController@delete_product');

Route::get('/unactive-product/{product_id}','App\Http\Controllers\productController@unactive_product');
Route::get('/active-product/{product_id}','App\Http\Controllers\productController@active_product');




