@extends('admin_layout')
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4>  Liệt kê bình luận</h4>
                  <p class="card-brand"></p>
    
    </div>
    <div id="notify_comment"></div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
       <div class="card-body table-responsive">
                  <table class="table table-hover"  >
                  <thead style="background-color: #add2fb">
          <tr>
           
            <th>Duyệt</th>
            <th>Tên người gửi</th>
            <th>Bình luận</th>
            <th>Ngày gửi</th>
            <th>Sản phẩm</th>
            <th>Quản lý</th>
           
          </tr>
        </thead>
        <tbody>
          @foreach($comment as $key => $comm)
          <tr>
        
            <td>
              @if($comm->comment_status==1)
                <input type="button" data-comment_status="0" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt" >
              @else 
                <input type="button" data-comment_status="1" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ Duyệt" >
              @endif
            
            </td>
            <td>{{ $comm->comment_name }}</td>

            <td>{{ $comm->comment }}
              <style type="text/css">
                ul.list_rep li {
                  list-style-type: decimal;
                  color: blue;
                  margin: 5px 40px;
              }
              </style>
              <ul class="list_rep">
                Trả lời : 
                @foreach($comment_rep as $key => $comm_reply)
                  @if($comm_reply->comment_parent_comment==$comm->comment_id)
                    <li> {{$comm_reply->comment}}</li>
                  @endif
                
                @endforeach

              </ul>
              @if($comm->comment_status==0)
              <br/><textarea class="form-control reply_comment_{{$comm->comment_id}}" rows="5"></textarea>
              <br/><button class="btn btn btn-primary btn-xs btn-reply-comment" data-product_id="{{$comm->comment_product_id}}"  data-comment_id="{{$comm->comment_id}}">Trả lời bình luận</button>
              
              @endif
             

            </td>
            <td>{{ $comm->comment_date }}</td>
            <td>   <a href="{{url('/chi-tiet/'.$comm->product->product_id)}}" target="_blank">{{$comm->product->product_name }}</a></td>
            <td>
              <a href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
             <a onclick="return confirm('Bạn có chắc là muốn xóa binh luan này ko?')" href="{{URL::to('/delete-comment/'.$comm->comment_id)}}" class="mdi mdi-delete" ui-toggle-class="" style="color:red;text-decoration: none;"> xóa
               
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
  </div>
</div>
@endsection