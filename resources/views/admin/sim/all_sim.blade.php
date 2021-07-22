@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4>Liệt kê sim</h4>
                  <p class="card-sim"></p>
                  <span> <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?></span>
                </div>
                <div class="card-body table-responsive">
                <table class="table table-hover" >
                <thead style="background-color: #add2fb">
                      <th>ID</th>
                      <th>Số sim</th>
                      <th>Giá sim</th>
                      <th>Ẩn/Hiện</th>
                      <th>Mô tả</th>
                      <th colspan="2" style="text-align: center; width: 88px;"> Quản lý</th>
                    </thead>
                    <tbody>
                    @foreach($all_sim as $key =>$sim)
          <tr>
          <td>{{$sim ->sim_id}}</td>
            <td>{{$sim ->sim_number}}</td>
           <td>{{ number_format($sim ->sim_price,0,',','.') }}vnd  </td>
            <td><span class="text-ellipsis">
                 <?php   
                 if ($sim->sim_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-sim/'.$sim ->sim_id)}}"><span class="mdi mdi-cart" style="font-size: 20px"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-sim/'.$sim ->sim_id)}}"><span class="mdi mdi-cart-off" style="font-size: 20px"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>
            </td>
            <td>
              {!!$sim ->sim_desc!!}  
            </td>
            <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-sim/'.$sim->sim_id)}}" class="active styling-edit" ui-toggle-class=""><i class="mdi mdi-pencil" style="color: blue ;font-size: 17px"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-sim/'.$sim->sim_id)}}" class="active styling-edit" ui-toggle-class=""><i  class="mdi mdi-delete" style="color: red ;font-size: 17px"></i></a>

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