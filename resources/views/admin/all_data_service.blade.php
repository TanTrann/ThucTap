@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Dich vu data</h4>
                  <p class="card-brand"></p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Tên dịch vụ</th>
                      <th>Giá tiền</th>
                      <th>Trạng thái</th>
                        <th>Chi tiết</th>
                      <th colspan="2" style="text-align: center; width: 88px;"> Quản lý</th>
                    </thead>
                    <tbody>
                    @foreach($all_data_service as $key =>$data_serv)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$data_serv ->data_service_name}}</td>
            <td>{{ number_format($data_serv->data_service_price,0,',','.') }}vnd  </td>
            <td><span class="text-ellipsis">
                 <?php   
                 if ($data_serv->data_service_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-brand/'.$data_serv ->data_service_id)}}"><span class="fa-thump-styling fa fa-thumbs-up"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-brand/'.$data_serv ->data_service_id)}}"><span class="fa-thump-styling fa fa-thumbs-down"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>
            </td>
            <td>
              {{$data_serv ->data_service_content}}  
            </td>
            <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-brand/'.$data_serv->data_service_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-brand/'.$data_serv->data_service_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>

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