<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\support\facades\redirect;
session_start();

class callserviceController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
   	
   	public function add_call_service(){
      $this->AuthLogin();
        $cate_call_service = DB::table('tbl_category')->orderby('category_id','desc')->get(); 
        

        return view('admin.add_call_service')->with('cate_call_service', $cate_call_service);

    }


public function save_call_service(Request $Request){
        $this->AuthLogin();
   		$data =  array();
   		$data['call_service_name']= $Request->call_service_name;
   		$data['call_service_price']= $Request->call_service_price;
   		$data['call_service_content']= $Request->call_service_content;
   		$data['call_service_status']= $Request->call_service_status;


      		DB::table('tbl_call_service')->insert($data);
      		Session::put('message','Thêm dịch vụ thoại thành công');
      		return Redirect::to('add-call-service');
    }
public function all_call_service (){
        $this->AuthLogin();
        $all_call_service = DB::table('tbl_call_service')->orderby('tbl_call_service.call_service_id','desc')->get();
        $manager_call_service  = view('admin.all_call_service')->with('all_call_service',$all_call_service);
        return view('admin_layout')->with('admin.all_call_service', $manager_call_service);

   
   }

   public function unactive_call_service($call_service_id){
         $this->AuthLogin();
        DB::table('tbl_call_service')->where('call_service_id',$call_service_id)->update(['call_service_status'=>1]);
        Session::put('message','Ẩn dịch vụ thoại');
        return Redirect::to('all-call-service');

    }

  public function active_call_service($call_service_id){
         $this->AuthLogin();
        DB::table('tbl_call_service')->where('call_service_id',$call_service_id)->update(['call_service_status'=>0]);
        Session::put('message','Hiện dịch vụ thoại');
        return Redirect::to('all-call-service');
    }

     public function edit_call_service($call_service_id){
        $this->AuthLogin();
        $edit_call_service = DB::table('tbl_call_service')->where('call_service_id',$call_service_id)->get();

        $manager_call_service  = view('admin.edit_call_service')->with('edit_call_service',$edit_call_service);
        return view('admin_layout')->with('admin.edit_call_service', $manager_call_service);
    }

    public function update_call_service(Request $request,$call_service_id){
        $this->AuthLogin();
        $data = array();
        $data['call_service_name'] = $request->call_service_name; 
        $data['call_service_price'] = $request->call_service_price;    
        $data['call_service_content'] = $request->call_service_content;

        DB::table('tbl_call_service')->where('call_service_id',$call_service_id)->update($data);
        Session::put('message','Cập nhật dịch vụ thoại thành công');
        return Redirect::to('all-call-service');
    }
    public function delete_call_service($call_service_id){
        $this->AuthLogin();
        DB::table('tbl_call_service')->where('call_service_id',$call_service_id)->delete();
        Session::put('message','Xóa dịch vụ thoại thành công');
        return Redirect::to('all-call-service');
    }
}
