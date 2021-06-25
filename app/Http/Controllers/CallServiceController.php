<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\support\facades\redirect;
session_start();

class CallServiceController extends Controller
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
        $cate_callservice = DB::table('tbl_category')->orderby('category_id','desc')->get(); 
        

        return view('admin.add_call_service')->with('cate_call_service', $cate_callservice);

    }


public function save_call_service(Request $Request){
        $this->AuthLogin();
   		$data =  array();
   		$data['call_service_name']= $Request->call_service_name;
   		$data['call_service_price']= $Request->call_service_price;
   		$data['call_service_content']= $Request->call_service_content;
   		$data['call_service_status']= $Request->call_service_status;


      		DB::table('tbl_call_service')->insert($data);
      		Session::put('message','Thêm dịch vụ thành công');
      		return Redirect::to('add-data-service');
    }
public function all_call_service (){
        $this->AuthLogin();
        $all_call_service = DB::table('tbl_call_service')->orderby('tbl_call_service.call_service_id','desc')->get();
        $manager_call_service  = view('admin.all_call_service')->with('all_call_service',$all_call_service);
        return view('admin_layout')->with('admin.all_call_service', $manager_call_service);

   
   }

   public function unactive_callservice($callservice_id){
         $this->AuthLogin();
        DB::table('tbl_callservice')->where('callservice_id',$callservice_id)->update(['callservice_status'=>1]);
        Session::put('message','Ẩn thương hiệu');
        return Redirect::to('all-callservice');

    }

  public function active_callservice($callservice_id){
         $this->AuthLogin();
        DB::table('tbl_callservice')->where('callservice_id',$callservice_id)->update(['callservice_status'=>0]);
        Session::put('message','Hiện thương hiệu');
        return Redirect::to('all-callservice');
    }

     public function edit_callservice($callservice_id){
        $this->AuthLogin();
        $edit_callservice = DB::table('tbl_callservice')->where('callservice_id',$callservice_id)->get();

        $manager_callservice  = view('admin.edit_callservice')->with('edit_callservice',$edit_callservice);
        return view('admin_layout')->with('admin.edit_callservice', $manager_callservice);
    }

    public function update_callservice(Request $request,$callservice_id){
        $this->AuthLogin();
        $data = array();
        $data['callservice_name'] = $request->callservice_name;     
        $data['callservice_desc'] = $request->callservice_desc;
        $data['callservice_status'] = $request->callservice_status;
        DB::table('tbl_callservice')->where('callservice_id',$callservice_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-callservice');
    }
    public function delete_callservice($callservice_id){
        $this->AuthLogin();
        DB::table('tbl_callservice')->where('callservice_id',$callservice_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-callservice');
    }
}
