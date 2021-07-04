<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\support\facades\redirect;
use App\CatePost;
session_start();

class CheckoutController extends Controller
{
    
    public function login_checkout(Request $request){
        $cate_product = DB::table('tbl_category')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        return view('pages.customer.login')->with('category',$cate_product)->with('brand',$brand_product);
    }    
    public function add_customer(Request $request){

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
       
        $customer_id = DB::table('tbl_customers')->insertGetId($data);
       
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/checkout');
       
       
       }

       public function checkout(Request $request){
                  
            $cate_product = DB::table('tbl_category')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
            

            return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product);
        }

        public function login_customer(Request $request){

            $email = $request->email_account;
            $password = md5($request->password_account);
            $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
         
if($result){
    Session::put('customer_id',$result->customer_id);
    return Redirect::to('/checkout');
  }else{
    return Redirect::to('/dang-nhap');
  }
  Session::save();
  
  
  }
  public function logout_checkout(){
    Session::forget('customer_id');
    Session::forget('coupon');
   
    return Redirect::to('/dang-nhap');
   }
}
