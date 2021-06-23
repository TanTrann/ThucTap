@section('admin_content')
@extends('admin_layout')


<div class="pcoded-inner-content">

<!-- Main-body start -->
<div class="main-body">
<div class="page-wrapper">
<!-- Page body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm sản phẩm</h4>
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
                        <div class="card-block">
                            <h4 class="sub-title">Thêm sản phẩm</h4>
                            <form action="{{URL::to('save-product')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" 
                                        placeholder="Tên sản phẩm" name="product_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Số lượng</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" 
                                        placeholder="Số lượng" name="product_quantity">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Giá sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" 
                                        placeholder="Giá sản phẩm" name="product_price">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Hình ảnh sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="product_image">
                                    </div>
                                 </div>

                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label">Mô tả sản phẩm</label>
                                    <div class="col-sm-9">
                                    <textarea rows="8" class="form-control" name="product_desc" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nội dung sản phẩm</label>
                                    <div class="col-sm-9">
                                        <textarea rows="8" class="form-control" name="product_desc" id="ckeditor2" placeholder="Mô tả sản phẩm"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Danh mục sản phẩm</label>
                                    <div class="col-sm-9">
                                        <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                            
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Thương hiệu sản phẩm</label>
                                    <div class="col-sm-9">
                                        <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                            
                                    </select>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Trạng thái</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="product_status">
                                                <option value="0">Hiển thị</option>
                                                <option value="1">Ẩn</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <button class="btn btn-grd-success" style="float: right;" name="save-product">Thêm sản phẩm</button>
                            </form>                                                                          
                        </div>
                    </div>                                                                        
                </div>
            </div>
        </div>
</div>
</div>
</div>
           
@endsection