@section('admin_content')
@extends('admin_layout')





            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">
                        <h4>Chỉnh sửa sản phẩm </h4>
                        <span> <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?></span>
                        <div class="card-header-right"><i
                            class="icofont icofont-spinner-alt-5"></i></div>

                            <div class="card-header-right">
                                <i class="icofont icofont-spinner-alt-5"></i>
                            </div>

                        </div>
                        <div class="card-body">
                            @foreach($edit_product as $key => $edit_value)
                            <h4 class="sub-title"></h4>
                            <form action="{{URL::to('/update-product/'.$edit_value->product_id)}}" method="post">
                                    {{ csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" 
                                        value="{{$edit_value->product_name}}" name="product_name">
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Số lượng</label>
                                    <div class="col-sm-10">
                                        <textarea rows="5" cols="5" class="form-control"
                                        name="product_quantity" >{{$edit_value->product_quantity}}</textarea>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Giá bán</label>
                                    <div class="col-sm-10">
                                        <textarea rows="5" cols="5" class="form-control"
                                        name="product_price" >{{$edit_value->product_price}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Hình ảnh sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="product_image" class="form-control" >
                                        <img src="{{URL::to('public/uploads/products/'.$edit_value->product_images )}}" height="100" width="100">
                                    </div>
                                </div>

                               <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Danh mục sản phẩm</label>
                                   <div class="col-sm-10">
                                    <select class="form-control" name="product_cate" input-sm m-bot15> 
                                        @foreach ($cate_product as $key =>$cate ) 
                                            @if($cate->category_id==$cate->category_id)
                                            <option selected value="{{$cate->category_id}}">{{($cate->category_name)}}</option>
                                              @else
                                        <option value="{{($cate->category_id)}}">{{$cate->category_name}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>  

                               <div class="form-group row">
                                     <label class="col-sm-2 col-form-label">Thương hiệu</label>
                                      <div class="col-sm-10">
                                    <select class="form-control" name="product_brand" input-sm m-bot15> 
                                       @foreach ($brand_product as $key =>$brand ) 
                                            @if($brand->brand_id==$brand->brand_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                              @else
                                        <option value="{{($brand->brand_id)}}">{{($brand->brand_name)}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                            </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tóm tắt sản phẩm</label>
                                    <div class="col-sm-10">
                                        <textarea rows="8" class="form-control" name="product_desc" id="ckeditor3" >{{$edit_value->product_desc}}</textarea>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
                                    <div class="col-sm-10">
                                        <textarea rows="8" class="form-control" name="product_content" id="ckeditor4" >{{$edit_value->product_content}}</textarea>
                                    </div>
                                </div>

                                    
                                    <div style="float:right">
                                    <button type="submit" class="btn btn-primary pull-right"  style="float: right;" name="save-product">Cập nhật</button>
                                    </div>
                                    <div class="clearfix"></div>
                            </form> 
                          
                            @endforeach                                                                         
      </div>
      </div>
@endsection