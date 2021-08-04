@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4>Danh sách đấu giá</h4>
                  
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
                      <th>Tên sản phẩm</th>
                      <th>Giá khoi diem</th>
                      <th>Giá hiện tại</th>
                      <th>Còn hạn</th>
                      <th>Chi tiết</th>
                    
                    </thead>
                    <tbody>
                     @foreach($all_daugia as $key =>$daugia)
          <tr>
                                <th scope="row">{{$daugia ->daugia_id}}</th>
                                                            <td>{{$daugia ->sp_daugia}}</td>
                                                         
                                                            <td>{{number_format($daugia->price_start,0,',','.') }}vnd  </td>
                                                            
                                                          
                                                           
                                                            <td>{{number_format($daugia->gia_ht,0,',','.') }}vnd  </td>
                                                            <td>
                                                            @if($daugia->date_end>=$today)
                                                            <span style="color:green">Còn hạn</span>
                                                            @else 
                                                            <span style="color:red">Đã hết hạn</span>
                                                            @endif
                                                            </td>
                                                            <td><span class="text-ellipsis">
                 
                    
                        <a href="{{URL::to('/ds-kh/'.$daugia ->daugia_id)}}"><span style="font-size: 20px">Chitiet</span></a>
                 
                     
                
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