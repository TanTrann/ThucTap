@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4>Thêm sản phẩm</h4>
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
                  <form class="forms-sample" action="{{URL::to('save-product')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                    <div class="form-group">
                      <label for="exampleInputName1">Tên sản phẩm</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="product_name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Số lượng</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="product_quantity" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Giá tiền</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="product_price" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh</label>
                              <input type="file" class="form-control" name="product_images">
                            </div>
                    <div class="form-group">
                     <div class="form-group">
                      <label for="exampleTextarea1">Tóm tắt sản phẩm</label>
                      <textarea class="form-control"  rows="8" name="product_desc"  id="ckeditor1"></textarea>
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Chi tiết sản phẩm</label>
                      <textarea class="form-control"  rows="8" name="product_content"  id="ckeditor2"></textarea>
                      
                    </div>
                    <div class="form-group">
                       <label for="exampleInputPassword4" >Danh mục sản phẩm</label>
                                    <div>
                                        <select name="product_cate" class="form-control">
                                        @foreach($cate_product as $key => $cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}} </option>
                                        @endforeach
                                            
                                    </select>
                                    </div>
                        </div>
                  
                       <label for="exampleInputPassword4">Thương hiệu sản phẩm</label>
                                    <div>
                                        <select name="product_brand"class="form-control"  >
                                      @foreach($brand_product as $key => $brand)
                                            <option value="{{$brand->brand_id}}" >{{$brand->brand_name}}</option>
                                        @endforeach
                                            
                                    </select>
                                    </div>
                      </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Trạng thái</label>
                       <select  class="form-control" name="product_status" input-sm m-bot15> 
                                        <option value="0">Hiện</option>
                                        <option value="1">Ẩn</option>
                                    </select>
                      </div>
                    
                      <div style="float:right">
                       <button type="submit" name="add-product" class="btn btn-primary mr-2">Thêm sản phẩm</button>
                       </div>
                  </form>
                </div>
              </div>
            </div>


@endsection