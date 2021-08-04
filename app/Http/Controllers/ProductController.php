<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\support\facades\redirect;
use App\Product;
use App\Rating;

session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
   	
   	public function add_product(){
      $this->AuthLogin();
        $cate_product = DB::table('tbl_category')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
       

        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
        

    }


public function save_product(Request $Request){
        $this->AuthLogin();
   		$data =  array();
   		$data['product_name']= $Request->product_name;
   		$data['product_price']= $Request->product_price;
   		$data['product_quantity']= $Request->product_quantity;
   		$data['product_desc']= $Request->product_desc;
   		$data['product_content']= $Request->product_content;
   		$data['category_id']= $Request->product_cate;
   		$data['brand_id']= $Request->product_brand;
   		$data['product_status']= $Request->product_status;
         $data['product_images']= $Request->product_images;
   		$get_image = $Request->file('product_images');
         
      		if($get_image){
               $get_name_image = $get_image->getClientOriginalName();
               $name_image = current(explode('.', $get_name_image));
               $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
               $get_image->move('public/uploads/products',$new_image);
               $data['product_images'] = $new_image;
               DB::table('tbl_product') -> insert($data);
               Session::put('message','Thêm sản phẩm thành công');
               return Redirect::to('add-product');
            }
             $data['product_images'] = '';
      		DB::table('tbl_product')->insert($data);
      		Session::put('message','Thêm sản phẩm thành công');
      		return Redirect::to('add-product');
    }
public function all_product (){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_product  = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);

   
   }
   public function reply_comment(Request $request){
    $data = $request->all();
    $comment = new Comment();
    $comment->comment = $data['comment'];
    $comment->comment_product_id = $data['comment_product_id'];
    $comment->comment_parent_comment = $data['comment_id'];
    $comment->comment_status = 0;
    $comment->comment_name = 'ADMIN';
    $comment->save();

}
public function allow_comment(Request $request){
    $data = $request->all();
    $comment = Comment::find($data['comment_id']);
    $comment->comment_status = $data['comment_status'];
    $comment->save();
}
   public function insert_rating(Request $request){
    $data = $request->all();
    $rating = new Rating();
    $rating->product_id = $data['product_id'];
    $rating->rating = $data['index'];
    $rating->save();
    echo 'done';
}
public function list_comment(){
    $comment = Comment::with('product')->where('comment_parent_comment','=',0)->orderBy('comment_id','DESC')->get();
    $comment_rep = Comment::with('product')->where('comment_parent_comment','>',0)->get();
    return view('admin.comment.list_comment')->with(compact('comment','comment_rep'));
}
public function load_comment(Request $request){
    $product_id = $request->product_id;
    $comment = Comment::where('comment_product_id',$product_id)->where('comment_parent_comment','=',0)->where('comment_status',0)->get();
    $comment_rep = Comment::with('product')->where('comment_parent_comment','>',0)->get();
    $output = '';
    foreach($comment as $key => $comm){
        $output.= ' 
        <div class="row style_comment">

                                    <div class="col-md-2">
                                        <img width="100%" src="'.url('/public/frontend/img/anhdaidien.png').'" class="img img-responsive img-thumbnail">
                                    </div>
                                    <div class="col-md-10">
                                        <p style="color:green;">@'.$comm->comment_name.'</p>
                                        <p style="color:#000;">'.$comm->comment_date.'</p>
                                        <p>'.$comm->comment.'</p>
                                    </div>
                                </div><p></p>
                                ';

                                foreach($comment_rep as $key => $rep_comment)  {
                                    if($rep_comment->comment_parent_comment==$comm->comment_id)  {
                                 $output.= ' <div class="row style_comment" style="margin:5px 40px;background: aquamarine;">

                                    <div class="col-md-2">
                                        <img width="80%" src="'.url('/public/frontend/img/ava-admin.png').'" class="img img-responsive img-thumbnail">
                                    </div>
                                    <div class="col-md-10">
                                        <p style="color:blue;">@Admin</p>
                                        <p style="color:#000;">'.$rep_comment->comment.'</p>
                                        <p></p>
                                    </div>
                                </div><p></p>';
                                    }
                                }
    }
    echo $output;

}   
public function send_comment(Request $request){
    $product_id = $request->product_id;
    $comment_name = $request->comment_name;
    $comment_content = $request->comment_content;
    $comment = new Comment();
    $comment->comment = $comment_content;
    $comment->comment_name = $comment_name;
    $comment->comment_product_id = $product_id;
    $comment->comment_status = 1;
    $comment->comment_parent_comment = 0;
    $comment->save();
}
public function delete_comment($comment_id){
    $this->AuthLogin();
    DB::table('tbl_comment')->where('comment_id',$comment_id)->delete();

    return Redirect::to('all-comment');
}
   public function unactive_product($product_id){
         $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Ẩn sản phẩm thành công');
        return Redirect::to('all-product');

    }

  public function active_product($product_id){
         $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Hiện sản phẩm thành công');
        return Redirect::to('all-product');
    }
  

      public function edit_product($product_id){
      $this->AuthLogin();
         $cate_product = DB::table('tbl_category')->orderby('category_id','desc')->get();
         $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
      
      $edit_product = DB::table('tbl_product')->where ('product_id',$product_id)->get();
      $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)
         ->with('brand_product',$brand_product);
      return view ('admin_layout')->with('admin.edit_product',$manager_product);
   }

   public function update_product(Request $Request,$product_id){
      $this->AuthLogin();
    $data = array();
     $data['product_name']= $Request->product_name;
      $data['product_price']= $Request->product_price;
      $data['product_desc']= $Request->product_desc;
      $data['product_content']= $Request->product_content;
      $data['category_id']= $Request->product_cate;
      $data['brand_id']= $Request->product_brand;
      $get_image = $Request->file('product_images');
      if($get_image){
               $get_name_image = $get_image->getClientOriginalName();
               $name_image = current(explode('.', $get_name_image));
               $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
               $get_image->move('public/uploads/products',$new_image);
               $data['product_images'] = $new_image;
               DB::table('tbl_product')->where('product_id', $product_id) -> update($data);
               Session::put('message','Cập nhật sản phẩm thành công');
               return Redirect::to('all-product');
            }
            DB::table('tbl_product')->where('product_id', $product_id) -> update($data);
            Session::put('message','Cap nhat sản phẩm thành công');
            return Redirect::to('all-product');
    
   }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa thương sản phẩm thành công');
        return Redirect::to('all-product');
    }


    // frontend 
    public function product(){
    	$cate_product = DB::table('tbl_category')->where('category_status','0')->orderby('category_id','desc')->get();
        	
        	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        	
        	
        
				$all_product = DB::table('tbl_product')->where('category_id','4')->where('product_status','0')->orderby('product_id','desc')->get();

    	return view ('pages.product.product_list')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    

    public function details_product($product_id){
        $cate_product = DB::table('tbl_category')->where('category_status','0')->orderby('category_id','desc')->get(); 
            $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $details_product = DB::table('tbl_product')
             ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
             ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id') 
             ->where('tbl_product.product_id',$product_id)->get();  
             $rating = Rating::where('product_id',$product_id)->avg('rating');
             $rating = round($rating);
        foreach ($details_product as $key => $value) {
          $category_id = $value ->category_id;
        }
    
        $related_product = DB::table('tbl_product')
             ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
             ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id') 
             ->where('tbl_category.category_id',$category_id)->wherenotin('tbl_product.product_id',[$product_id])->limit(4)->get();  
        
        $product = Product::where('product_id',$product_id)->first();
        
        $product->save();
             
    return view('pages.product.product_details')->with('rating',$rating)->with('product',$product)->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product)->with('relate',$related_product);
    }
}

