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
                        <h4>Gói cước data</h4>
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
                            <h4 class="sub-title">Thêm Dịch vụ</h4>
                            <form action="{{URL::to('save-data-service')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tên Dịch vụ</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" 
                                        placeholder="Tên Dịch vụ" name="data_service_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Chi tiet dich vu</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" 
                                        placeholder="Chi tiet dich vu" name="data_service_content">
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Giá tiền</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" 
                                        placeholder="Giá tiền" name="data_service_price">
                                    </div>
                                </div> 

                               
                                    
                                <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Trạng thái</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="data_service_status">
                                                <option value="0">Hiển thị</option>
                                                <option value="1">Ẩn</option>
                                                
                                            </select>
                                        </div>
                                </div>

                                    <button class="btn btn-grd-success" style="float: right;" name="save-data_service">Thêm Dịch vụ</button>
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