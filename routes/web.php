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

//backend + service
Route::get('/add-serv','App\Http\Controllers\ServiceController@add_service');
Route::get('/all-serv','App\Http\Controllers\ServiceController@all_service');
Route::get('/edit-service/{service_id}','App\Http\Controllers\ServiceController@edit_service');
Route::post('/save-service','App\Http\Controllers\ServiceController@save_service');
Route::post('/update-service/{service_id}','App\Http\Controllers\ServiceController@update_service');
Route::get('/delete-service/{service_id}','App\Http\Controllers\ServiceController@delete_service');

Route::get('/unactive-service/{service_id}','App\Http\Controllers\ServiceController@unactive_service');
Route::get('/active-service/{service_id}','App\Http\Controllers\ServiceController@active_service');

//backend + data_service
Route::get('/add-data-service','App\Http\Controllers\DataServiceController@add_data_service');
Route::get('/all-data-service','App\Http\Controllers\DataServiceController@all_data_service');
Route::get('/edit-data-service/{data_service_id}','App\Http\Controllers\DataServiceController@edit_data_service');
Route::post('/save-data-service','App\Http\Controllers\DataServiceController@save_data_service');
Route::post('/update-data-service/{data_service_id}','App\Http\Controllers\DataServiceController@update_data_service');
Route::get('/delete-data-service/{data_service_id}','App\Http\Controllers\DataServiceController@delete_data_service');

Route::get('/unactive-data-service/{data_service_id}','App\Http\Controllers\DataServiceController@unactive_data_service');
Route::get('/active-data-service/{data_service_id}','App\Http\Controllers\DataServiceController@active_data_service');


//backend + call_service
Route::get('/add-call-service','App\Http\Controllers\CallServiceController@add_call_service');
Route::get('/all-call-service','App\Http\Controllers\CallServiceController@all_call_service');
Route::get('/edit-call-service/{call_service_id}','App\Http\Controllers\CallServiceController@edit_call_service');
Route::post('/save-call-service','App\Http\Controllers\CallServiceController@save_call_service');
Route::post('/update-call-service/{call_service_id}','App\Http\Controllers\CallServiceController@update_call_service');
Route::get('/delete-call-service/{call_service_id}','App\Http\Controllers\CallServiceController@delete_call_service');

Route::get('/unactive-call-service/{call_service_id}','App\Http\Controllers\CallServiceController@unactive_call_service');
Route::get('/active-call-service/{call_service_id}','App\Http\Controllers\CallServiceController@active_call_service');

//frontend + product

Route::get('/product','App\Http\Controllers\productController@product');



//frontend + brand
Route::get('/show-brand-home','App\Http\Controllers\BrandController@show_brand_home');
