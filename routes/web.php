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

//backend + sim
Route::get('/add-sim','App\Http\Controllers\SimController@add_sim');
Route::get('/all-sim','App\Http\Controllers\SimController@all_sim');
Route::get('/edit-sim/{sim_id}','App\Http\Controllers\SimController@edit_sim');
Route::post('/save-sim','App\Http\Controllers\SimController@save_sim');
Route::post('/update-sim/{sim_id}','App\Http\Controllers\SimController@update_sim');
Route::get('/delete-sim/{sim_id}','App\Http\Controllers\SimController@delete_sim');

Route::get('/unactive-sim/{sim_id}','App\Http\Controllers\SimController@unactive_sim');
Route::get('/active-sim/{sim_id}','App\Http\Controllers\SimController@active_sim');





//frontend + product

Route::get('/product','App\Http\Controllers\productController@product');


Route::get('/sim-list','App\Http\Controllers\SimController@sim');


Route::post('/quickviewsim','App\Http\Controllers\SimController@quickviewsim');

//frontend + brand
Route::get('/show-brand-home','App\Http\Controllers\BrandController@show_brand_home');


//checkout
Route::get('/dang-nhap','App\Http\Controllers\CheckoutController@login_checkout');

Route::get('/dang-ky','App\Http\Controllers\CheckoutController@register');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');

//Banner
Route::get('/manage-slider','App\Http\Controllers\SliderController@manage_slider');
Route::get('/add-slider','App\Http\Controllers\SliderController@add_slider');
Route::get('/delete-slide/{slide_id}','App\Http\Controllers\SliderController@delete_slide');
Route::post('/insert-slider','App\Http\Controllers\SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','App\Http\Controllers\SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','App\Http\Controllers\SliderController@active_slide');


// chi tiet sp
Route::get('/chi-tiet/{product_id}','App\Http\Controllers\ProductController@details_product');
Route::get('/danh-muc-san-pham/{category_id}','App\Http\Controllers\CategoryController@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','App\Http\Controllers\BrandController@show_brand_home');


//Cart
Route::post('/update-cart-quantity','App\Http\Controllers\CartController@update_cart_quantity');
Route::post('/update-cart','App\Http\Controllers\CartController@update_cart');
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::post('/add-cart-ajax','App\Http\Controllers\CartController@add_cart_ajax');
Route::post('/add-cart-ajax-sim','App\Http\Controllers\CartController@add_cart_ajax_sim');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::get('/gio-hang','App\Http\Controllers\CartController@gio_hang');
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');
Route::get('/del-product/{session_id}','App\Http\Controllers\CartController@delete_product');
Route::get('/del-all-product','App\Http\Controllers\CartController@delete_all_product');



Route::post('/confirm-order','App\Http\Controllers\CheckoutController@confirm_order');
Route::post('/order-place','App\Http\Controllers\CheckoutController@order_place');

