@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4>Danh mục sản phẩm</h4>
                  <p class="card-category"></p>
                  <span> <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?></span>
                </div>
                <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead style="background-color: #add2fb">
                      <th>ID</th>
                      <th>Tên danh mục</th>
                      <th>Mô tả</th>
                      <th>Ẩn/Hiện</th>
                      <th colspan="2" style="text-align: center; width: 88px;"> Quản lý</th>
                    </thead>
                    <tbody>
                    @foreach($all_category as $key =>$cate_pro)
          <tr>
            <td>{{$cate_pro ->category_id}}</td>
            <td>{{$cate_pro ->category_name}}</td>
            <td>
                {{$cate_pro ->category_desc}}  
            </td>
            <td  style="text-align:  center"><span class="text-ellipsis">
                 
                 <?php   
              if ($cate_pro->category_status==0){
                 ?>

                     <a href="{{URL::to('/unactive-category/'.$cate_pro ->category_id)}}"><span class="mdi mdi-cart" style="font-size: 20px"></span></a>
              
                   <?php
                       }else{
                   ?>
                     <a href="{{URL::to('/active-category/'.$cate_pro ->category_id)}}"><span class="mdi mdi-cart-off" style="font-size: 20px"></span></a>'
                   <?php   
                       }
                   ?>
             
             </span>
            </td>  
            <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-category/'.$cate_pro ->category_id)}}" class="mdi mdi-pencil" style="color: blue ;font-size: 17px" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-category/'.$cate_pro ->category_id)}}" class="mdi mdi-delete" style="color: red ;font-size: 17px" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>

            </td>
                     
          </tr>
            @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection