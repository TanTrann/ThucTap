<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Slider;
session_start();

class HomeController extends Controller
{
  //trang chu
  public function index(){
	
		 $all_news = DB::table('tbl_news')->orderby('news_id','desc')->get(); 
		 $category = DB::table('tbl_category')->orderby('category_id','desc')->get(); 
	$slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(3)->get();
	$all_phone = DB::table('tbl_product')->where('category_id','4')->orderby('product_id','desc')->limit(4)->get(); 
	$all_sim = DB::table('tbl_product')->where('category_id','8')->orderby('product_id','desc')->limit(12)->get(); 
   	$cate_product = DB::table('tbl_category')->orderby('category_id','desc')->limit(4)->get(); 
	$all_service = DB::table('tbl_service')->where('service_status','0')->orderby(DB::raw('RAND()'))->limit(4)->get(); 
	$all_data_service = DB::table('tbl_data_service')->where('data_service_status','0')->orderby(DB::raw('RAND()'))->limit(4)->get(); 
	$all_call_service = DB::table('tbl_call_service')->where('call_service_status','0')->orderby(DB::raw('RAND()'))->limit(4)->get(); 
	return view('pages.home')->with('all_phone', $all_phone)->with('all_sim', $all_sim)->with('all_service',$all_service)->with('cate_product', $cate_product)->with('all_data_service', $all_data_service)->with('all_call_service',$all_call_service)->with('all_news',$all_news)->with('slider',$slider)->with('category',$category);
   }
   public function search(Request $request){
	
	$keywords = $request->keywords_submit;

	$cate_product = DB::table('tbl_category')->where('category_status','0')->orderby('category_id','asc')->get(); 
	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','asc')->get(); 

	$search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 


	return view('pages.product.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);

  }
  
}
