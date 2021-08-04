@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
<div class="card">
                <div class="card-header card-header-warning">
              
                  <h4>Khach hang đấu giá cao nhất</h4>
              
                 
                  <p class="card-brand"></p>
                  <span> <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?></span>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover"  >
                    <thead style="background-color: #add2fb">
                      <th>ID</th>
                      <th>Tên khách hàng</th>
                      <th>Giá đấu</th>
                      <th>Địa chỉ</th>
                      <th>CMND</th>
                       <th>ID sản phẩm</th>         
                    <th>chitiet</th>
                    </thead>
                    <tbody>
                     @foreach($top_kh as $key =>$topkhach)
          <tr>
                                <th scope="row">{{$topkhach ->order_daugia_id}}</th>
                                                            <td>{{$topkhach ->Hoten_KH}}</td>
                                                         
                                                            <td>{{number_format($topkhach->Giadau_KH,0,',','.') }}vnd  </td>
                                                            <td>{{$topkhach->Diachi_KH}}</td>
                                                            <td>{{$topkhach->CMND_KH}} </td>
                                                            
                                                            <td>{{$topkhach->daugia_id}} </td>
                                                            <td><span class="text-ellipsis">
                 
                    
                        <a href="{{URL::to('/chi-tiet-khach-hang/'.$topkhach ->order_daugia_id)}}"><span style="font-size: 20px">Chitiet</span></a>
                 
                     
                
                </span>
          

          </tr>
            @endforeach
                    </tbody>
                  </table>
                </div>
              </div><div class="card">
                <div class="card-header card-header-warning">
              
                  <h4>Danh sách khách hàng</h4>
              
                 
                  <p class="card-brand"></p>
                  <span> <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?></span>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover"  >
                    <thead style="background-color: #add2fb">
                      <th>ID</th>
                      <th>Tên khách hàng</th>
                      <th>Giá đấu</th>
                      <th>Địa chỉ</th>
                      <th>CMND</th>
                       <th>ID sản phẩm</th>         
                    <th>chitiet</th>
                    </thead>
                    <tbody>
                     @foreach($ds_kh as $key =>$khach)
          <tr>
                                <th scope="row">{{$khach ->order_daugia_id}}</th>
                                                            <td>{{$khach ->Hoten_KH}}</td>
                                                         
                                                            <td>{{number_format($khach->Giadau_KH,0,',','.') }}vnd  </td>
                                                            <td>{{$khach->Diachi_KH}}</td>
                                                            <td>{{$khach->CMND_KH}} </td>
                                                            
                                                            <td>{{$khach->daugia_id}} </td>
                                                            <td><span class="text-ellipsis">
                 
                    
                        <a href="{{URL::to('/chi-tiet-khach-hang/'.$khach ->order_daugia_id)}}"><span style="font-size: 20px">Chitiet</span></a>
                 
                     
                
                </span>
          

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