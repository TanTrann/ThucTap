@section('admin_content')
@extends('admin_layout')

<div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    
                                <!-- Page-header end -->
                                
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <!-- Basic table card start -->
                                    <div class="card">
                                        <div class="card-header">
                                             <div class="page-header-title">
                                                    <i class="icofont icofont-table bg-c-blue"></i>
                                                    
                                                </div>
                                            <h5>Danh sách sản phẩm</h5>
                                            <span>
                                                <?php
                                                     $message = Session::get('message');
                                                    if ($message){
                                                     echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                                        Session::put('message',null);
                                                        }
                                                ?>
                                            </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Tên sản phẩm</th>
                                                            <th>SL</th>
                                                            <th>Giá bán</th>
                                                            <th>Hình sản phẩm</th>
                                                            <th>Danh mục</th>
                                                            <th>Thương hiệu</th>   
                                                            <th>Trạng thái</th>
                                                            <th>Tóm tắt sản phẩm</th>
                                                            <th>Chi tiết sản phẩm</th>
                                                            <th colspan="2"> Quản lí</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	  @foreach($all_product as $key =>$pro)
                                                        <tr>
                                                            <th scope="row">{{$pro ->product_id}}</th>
                                                            <td>{{$pro ->product_name}}</td>
                                                            <td>{{$pro->product_quantity}}</td>
                                                            <td>{{ number_format($pro->product_price,0,',','.') }}vnd  </td>
                                                            <td><img src="public/uploads/products/{{$pro->product_image }}" height="100" width="100"></td>
                                                            <td>{{ $pro->category_name }}</td>
                                                            <td>{{ $pro->brand_name }}</td>
                                                            <td><span class="text-ellipsis">
                 <?php   
                 if ($pro->product_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-product/'.$pro ->product_id)}}"><span class="ti-thumb-up" style="color: red;font-size: 25px;"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-product/'.$pro ->product_id)}}"><span class="ti-thumb-down" style="size:17px;color: blue;font-size: 25px;"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>
            </td>
            <td>
              {{$pro ->product_desc}}  
            </td>
            <td>
              {{$pro ->product_content}}  
            </td>
            <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class=""><i class="ti-pencil" style="color: green;"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class=""><i class="ti-trash" style="color: red;"></i></a>

            </td>

          </tr>
            @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Basic table card end -->
                                    <!-- Inverse table card start -->
                                    
                                    <!-- Inverse table card end -->
                                    <!-- Hover table card start -->
                                    
                                    <!-- Hover table card end -->
                                    <!-- Contextual classes table starts -->
                                   
                                    
                                </div>
                                <!-- Page-body end -->
                            </div>
                        
@endsection