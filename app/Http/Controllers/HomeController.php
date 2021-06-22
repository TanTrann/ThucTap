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
	 $all_service = DB::table('tbl_service')->where('service_status','0')->orderby(DB::raw('RAND()'))->paginate(6); 
	 return view('pages.home')->with('all_service',$all_service)->with('cate_product', $cate_product);
   }
  
}
