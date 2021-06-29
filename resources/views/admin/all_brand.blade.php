@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4>Thương hiệu sản phẩm</h4>
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
                <table class="table table-hover" >
                <thead style="background-color: #add2fb">
                      <th>ID</th>
                      <th>Tên thương hiệu</th>
                      <th>Ẩn/Hiện</th>
                      <th>Mô tả</th>
                      <th colspan="2" style="text-align: center; width: 88px;"> Quản lý</th>
                    </thead>
                    <tbody>
                    @foreach($all_brand as $key =>$cate_pro)
          <tr>
          <td>{{$cate_pro ->brand_id}}</td>
            <td>{{$cate_pro ->brand_name}}</td>
            <td><span class="text-ellipsis">
                 <?php   
                 if ($cate_pro->brand_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-brand/'.$cate_pro ->brand_id)}}"><span class="mdi mdi-cart" style="font-size: 20px"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-brand/'.$cate_pro ->brand_id)}}"><span class="mdi mdi-cart-off" style="font-size: 20px"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>
            </td>
            <td>
              {!!$cate_pro ->brand_desc!!}  
            </td>
            <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-brand/'.$cate_pro->brand_id)}}" class="active styling-edit" ui-toggle-class=""><i class="mdi mdi-pencil" style="color: blue ;font-size: 17px"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-brand/'.$cate_pro->brand_id)}}" class="active styling-edit" ui-toggle-class=""><i  class="mdi mdi-delete" style="color: red ;font-size: 17px"></i></a>

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