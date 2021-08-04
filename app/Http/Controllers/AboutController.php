<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AboutController extends Controller
{
  //gioithieu
  public function about(){
    $category = DB::table('tbl_category')->orderby('category_id','desc')->get(); 
   	return view('pages.about')->with('category',$category);

   }
  
}
