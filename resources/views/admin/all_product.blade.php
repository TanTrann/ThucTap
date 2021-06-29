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
                      <th>Số lượng </th>
                      <th>Giá tiền</th>
                      <th>Hình ảnh</th>
                      <th>Danh mục</th>
                      <th>Thương hiệu</th>
                      
                      <th>Trạng thái</th>
                      <th colspan="2" style="text-align: center; width: 88px;"> Quản lý</th>
                    </thead>
                    <tbody>
                     @foreach($all_product as $key =>$pro)
          <tr>
                                <th scope="row">{{$pro ->product_id}}</th>
                                                            <td>{{$pro ->product_name}}</td>
                                                            <td>{{$pro->product_quantity}}</td>
                                                            <td>{{ number_format($pro->product_price,0,',','.') }}vnd  </td>
                                                            <td><img src="public/uploads/products/{{$pro->product_images}}"></td>
                                                            <td>{{ $pro->category_name }}</td>
                                                            <td>{{ $pro->brand_name }}</td>
                                                            
                                                            <td  style="text-align:  center"><span class="text-ellipsis">
                 
                    <?php   
                 if ($pro->product_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-product/'.$pro ->product_id)}}"><span class="mdi mdi-cart" style="font-size: 20px"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-product/'.$pro ->product_id)}}"><span class="mdi mdi-cart-off" style="font-size: 20px"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>
            </td>
            
          <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-product/'.$pro ->product_id)}}" class="mdi mdi-pencil" style="color: blue ;font-size: 17px" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-product/'.$pro ->product_id)}}" class="mdi mdi-delete" style="color: red ;font-size: 17px" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>

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