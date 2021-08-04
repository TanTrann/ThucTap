@extends('admin_layout')
@section('admin_content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="">Thêm đấu giá </h4>
                            </div>
                            <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?>

                        <div class="card-body">
                        @foreach($edit_daugia as $key => $edit_value)
                        <form action="{{URL::to('/update-daugia/'.$edit_value->daugia_id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="sp_daugia" class="form-control" id="exampleInputEmail1" value="{{$edit_value->sp_daugia}}" >
                                </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">
                              <label for="exampleInputEmail1">Hình ảnh</label>
                              <img src="{{URL::to('public/uploads/daugia/'.$edit_value->anh_daugia )}}" height="100" width="100">
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Noi dung dau gia</label>
                                    <textarea  name="chitiet_daugia" rows="8"  class="form-control" id="ckeditor6" >{{$edit_value->chitiet_daugia}}</textarea>
                                </div>
                                    </div>
                                    <div class="col-md-12">
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                    <input type="text"  name="date_start" class="form-control" id="date_start" value="{{$edit_value->date_start}}">
                                </div>
                                    </div>
                                    <div class="col-md-12">
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                                    <input type="text" name="date_end" class="form-control" id="date_end" value="{{$edit_value->date_end}}">
                                </div>
                                    </div>
                                    <div class="col-md-12">
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Giá khởi điểm</label>
                                    <input type="text" name="price_start" class="form-control" id="exampleInputEmail1" value="{{$edit_value->price_start}}">
                                </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">
                    
                    
                               
                                <button type="submit" name="save_daugia" class="btn btn-primary pull-right" style="float:right;">Cập nhật</button>
                                </form>
                            </div>
@endforeach
                        </div>
                    </section>
              </div></div></div>
            </div>
@endsection