<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
  //trang chu
  public function index(){
   	$cate_product = DB::table('tbl_category')->orderby('category_id','desc')->get(); 
	$all_service = DB::table('tbl_service')->where('service_status','0')->orderby(DB::raw('RAND()'))->get(); 
	$all_data_service = DB::table('tbl_data_service')->where('data_service_status','0')->orderby(DB::raw('RAND()'))->get(); 
	$all_call_service = DB::table('tbl_call_service')->where('call_service_status','0')->orderby(DB::raw('RAND()'))->get(); 
	return view('pages.home')->with('all_service',$all_service)->with('cate_product', $cate_product)->with('all_data_service', $all_data_service)->with('all_call_service',$all_call_service);
   }
  
}
