<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Carbon\Carbon;
use Session;
use Illuminate\support\facades\redirect;
use App\Service;
use Illuminate\Pagination\PaginationServiceProvider;

session_start();
class NewsController extends Controller
{
    public function add_news(){
        return view('admin.news.add_news');

    }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function save_news(Request $Request){
        $this->AuthLogin();
   		$data =  array();
   		$data['news_name']= $Request->news_name;

   		$data['news_content']= $Request->news_content;
   		
   		$data['news_desc']= $Request->news_desc;
   		$data['news_status']= $Request->news_status;
       $data['news_images']= $Request->news_images;
     
      $get_image = $Request->file('news_images');
         
          if($get_image){
               $get_name_image = $get_image->getClientOriginalName();
               $name_image = current(explode('.', $get_name_image));
               $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
               $get_image->move('public/uploads/news',$new_image);
               $data['news_images'] = $new_image;
               DB::table('tbl_news') -> insert($data);
               Session::put('message','Thêm tin tức thành công');
               return Redirect::to('add-news');
            }
             $data['news_images'] = '';
          DB::table('tbl_news')->insert($data);
          Session::put('message','Thêm tin tức thành công');
          return Redirect::to('add-news');

      	
    }
public function all_news (){
        $this->AuthLogin();
        $all_news = DB::table('tbl_news')
        
        ->orderby('tbl_news.news_id','desc')->get();
        $manager_news  = view('admin.news.all_news')->with('all_news',$all_news);
        return view('admin_layout')->with('admin.news.all_news', $manager_news);   
   }

 

   public function unactive_news($news_id){
         $this->AuthLogin();
        DB::table('tbl_news')->where('news_id',$news_id)->update(['news_status'=>1]);
        Session::put('message','Ẩn tin tức');
        return Redirect::to('all-news');

    }

  public function active_news($news_id){
         $this->AuthLogin();
        DB::table('tbl_news')->where('news_id',$news_id)->update(['news_status'=>0]);
        Session::put('message','Hiện tin tức');
        return Redirect::to('all-news');
    }

     public function edit_news($news_id){
        $this->AuthLogin();
        $edit_news = DB::table('tbl_news')->where('news_id',$news_id)->get();

        $manager_news  = view('admin.news.edit_news')->with('edit_news',$edit_news);
        return view('admin_layout')->with('admin.news.edit_news', $manager_news);
    }

    public function update_news(Request $request,$news_id){
        $this->AuthLogin();
        $data = array();
        $data['news_name'] = $request->news_name;     
        $data['news_content'] = $request->news_content;
        $data['news_desc'] = $request->news_desc;
        $get_image = $request->file('news_images');
         if($get_image){
               $get_name_image = $get_image->getClientOriginalName();
               $name_image = current(explode('.', $get_name_image));
               $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
               $get_image->move('public/uploads/news',$new_image);
               $data['news_images'] = $new_image;
               DB::table('tbl_news')->where('news_id', $news_id) -> update($data);
               Session::put('message','Cập nhật tin tuc thành công');
               return Redirect::to('all-news');
            }
            DB::table('tbl_news')->where('news_id', $news_id) -> update($data);
            Session::put('message','Cap nhat tin tuc không thành công');
            return Redirect::to('all-news');
        DB::table('tbl_news')->where('news_id',$news_id)->update($data);
        Session::put('message','Cập nhật tin tức thành công');
        return Redirect::to('all-news');
    }
    public function delete_news($news_id){
        $this->AuthLogin();
        DB::table('tbl_news')->where('news_id',$news_id)->delete();
        Session::put('message','Xóa tin tức thành công');
        return Redirect::to('all-news');
    }


    // frontend
    public function news_list (){
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $all_news = DB::table('tbl_news')->orderby('news_id','desc')->get(); 
        return view('pages.news.news_list')->with('category', $category)->with('all_news',$all_news);
    }

    public function news_details($news_id){
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $details_news = DB::table('tbl_news')->where('tbl_news.news_id',$news_id)->get();
        
        $related_news =  DB::table('tbl_news')->where('tbl_news.news_id',$news_id)->limit(4)->get();  
        return view('pages.news.news_details')->with('details_news',$details_news)->with('category',$category)->with('related_news',$related_news);
    }
}
