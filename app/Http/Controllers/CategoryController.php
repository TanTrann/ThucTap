<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\support\facades\redirect;
session_start();

class CategoryController extends Controller
{
	public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
   	
   	public function add_category(){
        
  
      return view ('admin.add_category');
    }

	public function save_category(Request $Request){
      $this->AuthLogin();
      $data =array();
      $data['category_name']= $Request->category_name;
      $data['category_desc']= $Request->category_desc;
      $data['category_status']= $Request->category_status;

      DB::table('tbl_category')->insert($data);
      Session::put('message','Thêm danh mục sản phẩm thành công');
      return Redirect::to('add-category');
   }
  
	public function all_category (){
      $this->AuthLogin();
      $all_category = DB::table('tbl_category')->get();
      $manager_category = view('admin.all_category')->with('all_category',$all_category);
      return view ('admin_layout')->with('admin.all_category',$manager_category);
   }


	public function unactive_category($category_id){
         $this->AuthLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>1]);
        Session::put('message','Ẩn danh mục');
        return Redirect::to('all-category');

    }

	public function active_category($category_id){
         $this->AuthLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>0]);
        Session::put('message','Hiện danh mục');
        return Redirect::to('all-category');
    }

     public function edit_category($category_id){
        $this->AuthLogin();
        $edit_category = DB::table('tbl_category')->where('category_id',$category_id)->get();

        $manager_category  = view('admin.edit_category')->with('edit_category',$edit_category);
        return view('admin_layout')->with('admin.edit_category', $manager_category);
    }

    public function update_category(Request $request,$category_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;     
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;
        DB::table('tbl_category')->where('category_id',$category_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category');
    }
    public function delete_category($category_id){
        $this->AuthLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category');
    }


    //end admin 
     
    public function show_category_home($category_id){
            $cate_product = DB::table('tbl_category')->where('category_status','0')->orderby('category_id','desc')->get(); 
            $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
            $category_name = DB::table('tbl_category')->where('tbl_category.category_id', $category_id)->limit(1)->get();
            $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')->where('tbl_product.category_id',$category_id)->get();
            
            
        return view('pages.category.category_list')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }

}