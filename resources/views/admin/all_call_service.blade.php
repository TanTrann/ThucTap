@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4>Dich vu thoai</h4>
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
                <table class="table table-hover">
                    <thead style="background-color: #add2fb">
                      <th>ID</th>
                      <th>Tên dịch vụ</th>
                      <th>Giá tiền</th>
                      <th>Trạng thái</th>
                      <th>Chi tiết</th>
                      <th colspan="2" style="text-align: center; width: 88px;"> Quản lý</th>
                    </thead>
                    <tbody>
                    @foreach($all_call_service as $key =>$call_serv)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$call_serv ->call_service_name}}</td>
            <td>{{ number_format($call_serv->call_service_price,0,',','.') }}vnd  </td>
            <td><span class="text-ellipsis">
                 <?php   
                 if ($call_serv->call_service_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-call-service/'.$call_serv ->call_service_id)}}"><span class="mdi mdi-cart" style="font-size: 20px"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-call-service/'.$call_serv ->call_service_id)}}"><span class="mdi mdi-cart-off" style="font-size: 20px"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>
            </td>
            <td>
              {{$call_serv ->call_service_content}}  
            </td>
            <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-call-service/'.$call_serv->call_service_id)}}" class="active styling-edit" ui-toggle-class=""><i class="mdi mdi-pencil" style="color: blue ;font-size: 17px"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-call-service/'.$call_serv->call_service_id)}}" class="active styling-edit" ui-toggle-class=""><i class="mdi mdi-delete" style="color: red ;font-size: 17px"></i></a>

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