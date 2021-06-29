@section('admin_content')
@extends('admin_layout')

<div class="col-lg-12 col-md-12">

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
                        <h4>Chỉnh sửa danh mục </h4>
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
                         <div class="card-body table-responsive">
                            @foreach($edit_category as $key => $edit_value)
                            
                            <form action="{{URL::to('/update-category/'.$edit_value->category_id)}}" method="post">
                                    {{ csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tên danh mục</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" 
                                        value="{{$edit_value->category_name}}" name="category_name">
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
                                                    name="category_desc" >{{$edit_value->category_desc}}</textarea>
                                                </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Trạng thái</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="category_status">
                                                <option value="0">Hiện</option>
                                                <option value="1">Ẩn</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary mr-2" style="float: right;"  name="save-category">Cập nhật</button>
                            </form> 
                            @endforeach                                                                         
                        </div>
                    </div>                                                                        
                </div>
            </div>
        </div>
</div>
</div>
</div>
           
@endsection