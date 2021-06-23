<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\support\facades\redirect;
session_start();

class DataServiceController extends Controller
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
        $cate_dataservice = DB::table('tbl_category')->orderby('category_id','desc')->get(); 
        

        return view('admin.add_data_service')->with('cate_data_service', $cate_dataservice);

    }


public function save_data_service(Request $Request){
        $this->AuthLogin();
   		$data =  array();
   		$data['data_service_name']= $Request->data_service_name;
   		$data['data_service_price']= $Request->data_service_price;
   		$data['data_service_content']= $Request->data_service_content;
   		$data['data_service_status']= $Request->data_service_status;


      		DB::table('tbl_data_service')->insert($data);
      		Session::put('message','Thêm dịch vụ thành công');
      		return Redirect::to('add-data-service');
    }
public function all_data_service (){
        $this->AuthLogin();
        $all_data_service = DB::table('tbl_data_service')->orderby('tbl_data_service.data_service_id','desc')->get();
        $manager_data_service  = view('admin.all_data_service')->with('all_data_service',$all_data_service);
        return view('admin_layout')->with('admin.all_data_service', $manager_data_service);

   
   }

   public function unactive_dataservice($dataservice_id){
         $this->AuthLogin();
        DB::table('tbl_dataservice')->where('dataservice_id',$dataservice_id)->update(['dataservice_status'=>1]);
        Session::put('message','Ẩn thương hiệu');
        return Redirect::to('all-dataservice');

    }

  public function active_dataservice($dataservice_id){
         $this->AuthLogin();
        DB::table('tbl_dataservice')->where('dataservice_id',$dataservice_id)->update(['dataservice_status'=>0]);
        Session::put('message','Hiện thương hiệu');
        return Redirect::to('all-dataservice');
    }

     public function edit_dataservice($dataservice_id){
        $this->AuthLogin();
        $edit_dataservice = DB::table('tbl_dataservice')->where('dataservice_id',$dataservice_id)->get();

        $manager_dataservice  = view('admin.edit_dataservice')->with('edit_dataservice',$edit_dataservice);
        return view('admin_layout')->with('admin.edit_dataservice', $manager_dataservice);
    }

    public function update_dataservice(Request $request,$dataservice_id){
        $this->AuthLogin();
        $data = array();
        $data['dataservice_name'] = $request->dataservice_name;     
        $data['dataservice_desc'] = $request->dataservice_desc;
        $data['dataservice_status'] = $request->dataservice_status;
        DB::table('tbl_dataservice')->where('dataservice_id',$dataservice_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-dataservice');
    }
    public function delete_dataservice($dataservice_id){
        $this->AuthLogin();
        DB::table('tbl_dataservice')->where('dataservice_id',$dataservice_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-dataservice');
    }
}

