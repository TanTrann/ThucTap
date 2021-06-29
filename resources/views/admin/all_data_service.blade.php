@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4>Dich vu data</h4>
                  <p class="card-brand">
                  <span> <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?></span>
                </div>
                <div class="card-body table-responsive">
                <table  class="table table-hover" >
                    <thead style="background-color: #add2fb">
                    <tr>
                      <th>ID</th>
                      <th>Tên dịch vụ</th>
                      <th>Giá tiền</th>
                      <th>Trạng thái</th>
                      <th style="width:400px">Chi tiết</th>
                      <th colspan="2" style="text-align: center; width: 88px;"> Quản lý</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all_data_service as $key =>$data_serv)
          <tr>
          <td>{{$data_serv ->data_service_id}}</td>
            <td>{{$data_serv ->data_service_name}}</td>
            <td>{{ number_format($data_serv->data_service_price,0,',','.') }}vnd  </td>
            <td><span class="text-ellipsis">
                 <?php   
                 if ($data_serv->data_service_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-data-service/'.$data_serv ->data_service_id)}}"><span class="mdi mdi-cart" style="font-size: 20px"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-data-service/'.$data_serv ->data_service_id)}}"><span class="mdi mdi-cart-off" style="font-size: 20px"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>
            </td>
            <td>
              {{$data_serv ->data_service_content}}  
            </td>
            <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-data-service/'.$data_serv->data_service_id)}}" class="active styling-edit" ui-toggle-class=""><i class="mdi mdi-pencil" style="color: blue ;font-size: 17px"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-data-service/'.$data_serv->data_service_id)}}" class="active styling-edit" ui-toggle-class=""><i class="mdi mdi-delete" style="color: red ;font-size: 17px"></i></a>

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