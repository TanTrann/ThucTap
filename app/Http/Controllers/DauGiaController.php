<?php

namespace App\Http\Controllers;

use App\DauGia;
use Illuminate\Http\Request;

use DB;
use App\http\Requests;
use App\Order;
use App\OrderDauGia;
use App\Product;
use Carbon\Carbon;
use Session;


use Illuminate\support\facades\redirect;

use function PHPUnit\Framework\returnValue;

session_start();

class DauGiaController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
   	
    public function add_daugia()
    { 
        $this->AuthLogin();
        return view('admin.daugia.add_daugia');
    }
    public function save_daugia(Request $Request){
        $this->AuthLogin();
        $data =array();
        $data['sp_daugia']= $Request->sp_daugia;
        $data['date_start']= $Request->date_start;
        $data['date_end']= $Request->date_end;
        $data['price_start']= $Request->price_start;
        $data['chitiet_daugia']= $Request->chitiet_daugia;
        $data['daugia_status']= $Request->daugia_status;
        $data['gia_ht']= $Request->price_start;
        $data['anh_daugia']= $Request->anh_daugia;
        $get_image = $Request->file('anh_daugia');
      
           if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/daugia',$new_image);
            $data['anh_daugia'] = $new_image;
            DB::table('tbl_daugia') -> insert($data);
            Session::put('message','Thêm đấu giá thành công');
            return Redirect::to('add-daugia');
         }
          $data['anh_daugia'] = '';
           DB::table('tbl_daugia')->insert($data);
           Session::put('message','Thêm đấu giá ko thành công');
           return Redirect::to('add-daugia');
        
       
     }
        
    public function all_daugia(){    
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $all_daugia = DauGia::orderby('daugia_id','DESC')->get();
        return view ('admin.daugia.all_daugia')->with(compact('all_daugia','today'));
    }

    public function unactive_daugia($daugia_id){
        $this->AuthLogin();
       DB::table('tbl_daugia')->where('daugia_id',$daugia_id)->update(['daugia_status'=>1]);
       Session::put('message','Ẩn đấu giá thành công');
       return Redirect::to('all-daugia');

   }

 public function active_daugia($daugia_id){
        $this->AuthLogin();
       DB::table('tbl_daugia')->where('daugia_id',$daugia_id)->update(['daugia_status'=>0]);
       Session::put('message','Hiện đấu giá thành công');
       return Redirect::to('all-daugia');
   }
   public function edit_daugia($daugia_id){
        $this->AuthLogin();
        $edit_daugia = DB::table('tbl_daugia')->where('daugia_id',$daugia_id)->get();

        $manager_daugia  = view('admin.daugia.edit_daugia')->with('edit_daugia',$edit_daugia);
        return view('admin_layout')->with('admin.daugia.edit_daugia', $manager_daugia);
    }

    public function update_daugia(Request $Request,$daugia_id){
      $this->AuthLogin();
    $data = array();
     $data['sp_daugia']= $Request->sp_daugia;
      $data['price_start']= $Request->price_start;
      $data['chitiet_daugia']= $Request->chitiet_daugia;
      $data['date_start']= $Request->date_start;
      $data['date_end']= $Request->date_end;

$get_image = $Request->file('anh_daugia');
      if($get_image){
               $get_name_image = $get_image->getClientOriginalName();
               $name_image = current(explode('.', $get_name_image));
               $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
               $get_image->move('public/uploads/daugia',$new_image);
               $data['anh_daugia'] = $new_image;
               DB::table('tbl_daugia')->where('daugia_id', $daugia_id) -> update($data);
               Session::put('message','Cập nhật đấu giá không thành công');
               return Redirect::to('all-daugia');
            }
            DB::table('tbl_daugia')->where('daugia_id', $daugia_id) -> update($data);
            Session::put('message','Cap nhat đấu giá thành công');
            return Redirect::to('all-daugia');
    
   }
   public function list_daugia(){
    $today = Carbon::now('Asia/Ho_Chi_Minh')->format('dd/mm/yyyy');
    $all_daugia = DauGia::orderby('daugia_id','DESC')->get();
       return view('admin.daugia.list_daugia')->with(compact('all_daugia','today'));
   }


   public function ds_kh($daugia_id){
    $top_kh = DB::table('tbl_order_daugia')->where('daugia_id',$daugia_id)->orderby('Giadau_KH','desc')->limit(1)->get();
    $ds_kh = DB::table('tbl_order_daugia')->where('daugia_id',$daugia_id)->orderby('Giadau_KH','desc')->get();
    
    $manager_order_daugia  = view('admin.daugia.ds_kh')->with('ds_kh',$ds_kh)->with('top_kh', $top_kh);
    return view('admin_layout')->with('admin.daugia.ds_kh', $manager_order_daugia);
   }

   public function chi_tiet_khach_hang($order_daugia_id){
    
    $chitiet_kh = DB::table('tbl_order_daugia')->where('order_daugia_id',$order_daugia_id)->orderby('order_daugia_id','desc')->get();
    $manager_chitiet_kh = view('admin.daugia.chitiet_kh')->with('chitiet_kh',$chitiet_kh);
    return view('admin_layout')->with('admin.daugia.chitiet_kh', $manager_chitiet_kh);
   }
   public function delete_daugia($daugia_id){
    $this->AuthLogin();
    DB::table('tbl_daugia')->where('daugia_id',$daugia_id)->delete();
    DB::table('tbl_order_daugia')->where('daugia_id',$daugia_id)->delete();
    Session::put('message','Xóa đấu giá thành công');
    return Redirect::to('all-daugia');
}
// frontend
    public function daugia_list(){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('dd/mm/yyyy');
        $category = DB::table('tbl_category')->orderby('category_id','asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','asc')->get();
        $list_daugia = DB::table('tbl_daugia')->where('daugia_status','0')->orderby('daugia_id','desc')->get(); 
        return view('pages.daugia.daugia_list')->with('category',$category)->with('list_daugia',$list_daugia)->with('brand',$brand_product)->with('today',$today);
    }
    
    public function quickviewdaugia(Request $request){

        $daugia_id = $request->daugia_id;
        $daugia = DauGia::find($daugia_id);
        $output['sp_daugia'] = $daugia->sp_daugia;
        $output['daugia_id'] = $daugia->daugia_id;
        $output['chitiet_daugia'] = $daugia->chitiet_daugia;
        $output['price_start'] = number_format($daugia->price_start,0,',','.').'VNĐ';
        $output['anh_daugia'] = '<p><img width="100%" src="public/uploads/daugia/'.$daugia->anh_daugia.'"></p>';
        $output['date_start'] = $daugia->date_start;
        $output['date_end'] = $daugia->date_end;
         echo json_encode($output);
       
    
    }

    public function chi_tiet_dau_gia($daugia_id)
    {
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $chitiet = DB::table('tbl_daugia')->where('daugia_id',$daugia_id)->get();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('dd/mm/yyyy');
        $giadau_kh= DB::table('tbl_order_daugia')->where('daugia_id',$daugia_id)->orderby('order_daugia_id','desc')->limit(1)->get();
       return view('pages.daugia.chitiet_daugia')->with('category',$category)->with('chitiet',$chitiet)->with('brand',$brand_product)->with('giadau_kh',$giadau_kh)->with(compact('chitiet','today'));
    }
    

    public function luu_daugia(Request $Request ,$daugia_id){
        $data = $Request->all();
        $cmnd_kh = DB::table('tbl_daugia')->orderby('daugia_id','desc')->get();
        foreach ($cmnd_kh as $key => $value){
		if($value->gia_ht >= $data['Giadau_KH']){
            Session::put('message','Đấu giá that bai. Vui lòng nhập giá trị cao hơn giá hiện tại');
            return Redirect()->back();
		}else{
            $data =array();
            $data['daugia_id']= $Request->daugia_id;
            $data['Giadau_KH']= $Request->Giadau_KH;
            $data['Hoten_KH']= $Request->Hoten_KH;
            $data['Sdt_KH']= $Request->Sdt_KH;
            $data['Diachi_KH']= $Request->Diachi_KH;
            $data['daugia_id']= $Request->daugia_id;
            $data['CMND_KH']= $Request->CMND_KH;
            DB::table('tbl_order_daugia')-> insert($data);
            $data2 = array();
            $data2['gia_ht']= $Request->Giadau_KH;
            DB::table('tbl_daugia')-> update($data2);
            Session::put('message','Đấu giá thành công. Cảm ơn bạn đã đấu giá sản phẩm,Nhân viên sẽ liên hệ với bạn nếu bạn chốt được giá cao nhất ');
            return Redirect()->back();
		} 

        
    }
    }

    public function done_daugia(){
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        return view('pages.daugia.done_daugia')->with('category',$category)->with('brand',$brand_product);
    }
 

}
