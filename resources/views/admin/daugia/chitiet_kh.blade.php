@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
<div class="card">
                <div class="card-header card-header-warning">
              
                  <h4>Chi tiet khách hàng</h4>
               
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
                      
                      <th>Tên khách hàng</th>
                 
                      <th>SDT</th>
                    
                      <th>CMND</th>
                       
                   
                    </thead>
                    <tbody>
                     @foreach($chitiet_kh as $key =>$chitiet)
          <tr>
                        
                                                            <td>{{$chitiet ->Hoten_KH}}</td>
                                                         
                                                           
                                                            <td>{{$chitiet->Sdt_KH}}</td>
                                                           
                                                            <td>{{$chitiet->CMND_KH}} </td>
                                                            
                                                            


          </tr>
            @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card">
                <div class="card-header card-header-warning">
              
                  <h4>Chi tiet don dau gia</h4>
              
                 
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
                      
                      <th>Số sim</th>
                      <th>Giá đấu</th>
                      <th>SDT</th>
                      <th>Địa chỉ</th>
                    
                       <th>ID sản phẩm</th>         
                   
                    </thead>
                    <tbody>
                     @foreach($chitiet_kh as $key =>$chitiet)
          <tr>
                               
                                                            <td>{{$chitiet ->Hoten_KH}}</td>
                                                         
                                                            <td>{{number_format($chitiet->Giadau_KH,0,',','.') }}vnd  </td>
                                                            <td>{{$chitiet->Sdt_KH}}</td>
                                                            <td>{{$chitiet->Diachi_KH}}</td>
                                                          
                                                            
                                                            <td>{{$chitiet->daugia_id}} </td>
                                                           
                
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