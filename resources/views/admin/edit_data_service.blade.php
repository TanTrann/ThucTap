@section('admin_content')
@extends('admin_layout')



            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">
                        <h4>Chỉnh sửa gói cước thoại </h4>
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
                            @foreach($edit_data_service as $key => $edit_value)
                           
                            <form action="{{URL::to('/update-data-service/'.$edit_value->data_service_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tên dịch vụ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" 
                                        value="{{$edit_value->data_service_name}}" name="data_service_name">
                                    </div>
                                </div>
                                           <!--  <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Upload File</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control">
                                                </div>
                                            </div> -->
                                    

                                    

                                     

                                   <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Chi tiết dịch vụ</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="8" class="form-control" name="data_service_content">{{$edit_value->data_service_content}}</textarea>
                                                </div>
                                    </div>
                                    

                                    <button  class="btn btn-primary mr-2" style="float: right;"  name="save-data-service">Cập nhật</button>
                            </form> 
                            @endforeach                                                                         
                        </div>
                    </div>                                                                        
                </div>
        
           
@endsection