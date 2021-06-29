<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\support\facades\redirect;
session_start();

class BrandController extends Controller
{
	public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
   	
   	public function add_brand(){
        
  
      return view ('admin.add_brand');
    }

public function save_brand(Request $Request){
      $this->AuthLogin();
      $data =array();
      $data['brand_name']= $Request->brand_name;
      $data['brand_desc']= $Request->brand_desc;
      $data['brand_status']= $Request->brand_status;

      DB::table('tbl_brand')->insert($data);
      Session::put('message','Thêm thương hiệu thành công');
      return Redirect::to('add-brand');
   }
  
public function all_brand (){
      $this->AuthLogin();
      $all_brand = DB::table('tbl_brand')->get();
      $manager_brand = view('admin.all_brand')->with('all_brand',$all_brand);
      return view ('admin_layout')->with('admin.all_brand',$manager_brand);
   }

   public function unactive_brand($brand_id){
         $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=>1]);
        Session::put('message','Ẩn thương hiệu');
        return Redirect::to('all-brand');

    }

  public function active_brand($brand_id){
         $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=>0]);
        Session::put('message','Hiện thương hiệu');
        return Redirect::to('all-brand');
    }

     public function edit_brand($brand_id){
        $this->AuthLogin();
        $edit_brand = DB::table('tbl_brand')->where('brand_id',$brand_id)->get();

        $manager_brand  = view('admin.edit_brand')->with('edit_brand',$edit_brand);
        return view('admin_layout')->with('admin.edit_brand', $manager_brand);
    }

    public function update_brand(Request $request,$brand_id){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_name;     
        $data['brand_desc'] = $request->brand_desc;
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);
        Session::put('message','Cập nhật thương hiệu thành công');
        return Redirect::to('all-brand');
    }
    public function delete_brand($brand_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();
        Session::put('message','Xóa thương thành công');
        return Redirect::to('all-brand');
    }
}
