@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4>Liệt kê sản phẩm</h4>
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
                      <th>Hình ảnh</th>
                      <th>Ngay bat dau</th>
                      <th>Ngay ket thuc</th>
                      <th>Còn hạn</th>
                   
                      <th>Trạng thái</th>
                      <th colspan="2" style="text-align: center; width: 88px;"> Quản lý</th>
                    </thead>
                    <tbody>
                     @foreach($all_daugia as $key =>$daugia)
          <tr>
                                <th scope="row">{{$daugia ->daugia_id}}</th>
                                                            <td>{{$daugia ->sp_daugia}}</td>
                                                         
                                                            <td>{{number_format($daugia->price_start,0,',','.') }}vnd  </td>
                                                            <td><img src="public/uploads/daugia/{{$daugia->anh_daugia}}"></td>
                                                            <td>{{ $daugia->date_start}}</td>
                                                            <td>{{ $daugia->date_end}}</td>
                                                            <td>
                                                            @if($daugia->date_end>=$today)
                                                          
                                                         
                                                            
                                                            <span style="color:green">Còn hạn</span>
                                                            @else 
                                                            <span style="color:red">Đã hết hạn</span>
                                                            @endif
                                                            </td>
                                                        
                                                            <td  style="text-align:  center"><span class="text-ellipsis">
                 
                    <?php   
                 if ($daugia->daugia_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-daugia/'.$daugia ->daugia_id)}}"><span class="mdi mdi-cart" style="font-size: 20px"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-daugia/'.$daugia ->daugia_id)}}"><span class="mdi mdi-cart-off" style="font-size: 20px"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>
            </td>
            
          <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-daugia/'.$daugia ->daugia_id)}}" class="mdi mdi-pencil" style="color: blue ;font-size: 17px" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-daugia/'.$daugia ->daugia_id)}}" class="mdi mdi-delete" style="color: red ;font-size: 17px" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>

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