@section('admin_content')
@extends('admin_layout')

<div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-table bg-c-blue"></i>
                                                    <div class="d-inline">
                                                        <h4>Liệt kê dịch vụ</h4>
                                                        <span> <?php
                                                                 $message = Session::get('message');
                                                                if ($message){
                                                                 echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                                                    Session::put('message',null);
                                                                    }
                                                                ?>
                                                                    
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                   <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index.html">
                                                            <i class="icofont icofont-home"></i>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Basic Table</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <!-- Basic table card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Basic table</h5>
                                            <span>use class <code>table</code> inside table element</span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Tên dịch vụ</th>
                                                            <th>Giá tiền</th>
                                                            <th>Trạng thái</th>
                                                            <th>Chi tiết</th>
                                                            <th>Danh mục</th>
                                                            <th colspan="2"> Quản lí</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          @foreach($all_service as $key =>$serv)
                                                        <tr>
                                                            <th scope="row">{{$serv ->service_id}}</th>
                                                            <td>{{$serv ->service_name}}</td>
                                                            <td>{{$serv ->service_price }}</td>
                                                            <td><span class="text-ellipsis">
                 <?php   
                 if ($serv->service_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-service/'.$serv ->service_id)}}"><span class="ti-thumb-up" style="color: red;font-size: 25px;"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-service/'.$serv ->service_id)}}"><span class="ti-thumb-down" style="size:17px;color: blue;font-size: 25px;"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>

            </td>

            <td>
              {{$serv ->service_content}}  
            </td>
            <td>{{ $serv->category_name }}</td>
            <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-service/'.$serv->service_id)}}" class="active styling-edit" ui-toggle-class=""><i class="ti-pencil" style="color: green;"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-service/'.$serv->service_id)}}" class="active styling-edit" ui-toggle-class=""><i class="ti-trash" style="color: red;"></i></a>

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