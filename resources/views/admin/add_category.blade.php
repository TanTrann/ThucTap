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
                        <h4>Danh mục sản phẩm</h4>
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
                            <h4 class="sub-title">Thêm danh mục</h4>
                            <form action="{{URL::to('save-category')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tên danh mục</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" 
                                        placeholder="Tên danh mục" name="category_name">
                                    </div>
                                </div>
                                           <!--  <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Upload File</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control">
                                                </div>
                                            </div> -->
                                    <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Mô tả</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="5" cols="5" class="form-control"
                                                    placeholder="Mô tả" name="category_desc"></textarea>
                                                </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Trạng thái</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="category_status">
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiện</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <button class="btn btn-grd-success" style="float: right;" name="save-category">Thêm danh mục</button>
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