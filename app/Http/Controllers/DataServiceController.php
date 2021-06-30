<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\support\facades\redirect;
session_start();

class DataserviceController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
   	
   	public function add_data_service(){
      $this->AuthLogin();
        $cate_data_service = DB::table('tbl_category')->orderby('category_id','desc')->get(); 
        

        return view('admin.add_data_service')->with('cate_data_service', $cate_data_service);

    }


public function save_data_service(Request $Request){
        $this->AuthLogin();
   		$data =  array();
   		$data['data_service_name']= $Request->data_service_name;
   		$data['data_service_price']= $Request->data_service_price;
   		$data['data_service_content']= $Request->data_service_content;
   		$data['data_service_status']= $Request->data_service_status;


      		DB::table('tbl_data_service')->insert($data);
      		Session::put('message','Thêm dịch vụ data thành công');
      		return Redirect::to('add-data-service');
    }
public function all_data_service (){
        $this->AuthLogin();
        $all_data_service = DB::table('tbl_data_service')->orderby('tbl_data_service.data_service_id','desc')->get();
        $manager_data_service  = view('admin.all_data_service')->with('all_data_service',$all_data_service);
        return view('admin_layout')->with('admin.all_data_service', $manager_data_service);

   
   }

   public function unactive_data_service($data_service_id){
         $this->AuthLogin();
        DB::table('tbl_data_service')->where('data_service_id',$data_service_id)->update(['data_service_status'=>1]);
        Session::put('message','Ẩn dịch vụ data ');
        return Redirect::to('all-data-service');

    }

  public function active_data_service($data_service_id){
         $this->AuthLogin();
        DB::table('tbl_data_service')->where('data_service_id',$data_service_id)->update(['data_service_status'=>0]);
        Session::put('message','Hiện dịch vụ data ');
        return Redirect::to('all-data-service');
    }

     public function edit_data_service($data_service_id){
        $this->AuthLogin();
        $edit_data_service = DB::table('tbl_data_service')->where('data_service_id',$data_service_id)->get();

        $manager_data_service  = view('admin.edit_data_service')->with('edit_data_service',$edit_data_service);
        return view('admin_layout')->with('admin.edit_data_service', $manager_data_service);
    }

    public function update_data_service(Request $request,$data_service_id){
        $this->AuthLogin();
        $data = array();
        $data['data_service_name'] = $request->data_service_name;     
        $data['data_service_content'] = $request->data_service_content;
        $data['data_service_price'] = $request->data_service_price;
        DB::table('tbl_data_service')->where('data_service_id',$data_service_id)->update($data);
        Session::put('message','Cập nhật dịch vụ data  thành công');
        return Redirect::to('all-data-service');
    }
    public function delete_data_service($data_service_id){
        $this->AuthLogin();
        DB::table('tbl_data_service')->where('data_service_id',$data_service_id)->delete();
        Session::put('message','Xóa dịch vụ data thành công');
        return Redirect::to('all-data-service');
    }
}

