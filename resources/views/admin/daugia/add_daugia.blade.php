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
                            if($message){
                                echo '<span class="text-alert;color:red;">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                   

                        <div class="card-body">
                                <form role="form" action="{{URL::to('/save-daugia')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="sp_daugia" class="form-control" id="exampleInputEmail1" >
                                </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">
                              <label for="exampleInputEmail1">Hình ảnh</label>
                              <input type="file" class="form-control" name="anh_daugia">
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Chi tiết sản phẩm</label>
                                    <textarea  name="chitiet_daugia" rows="8"  class="form-control" id="ckeditor6" ></textarea>
                                </div>
                                    </div>
                                    <div class="col-md-12">
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                    <input type="text"  name="date_start" class="form-control" id="date_start" >
                                </div>
                                    </div>
                                    <div class="col-md-12">
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                                    <input type="text" name="date_end" class="form-control" id="date_end" >
                                </div>
                                    </div>
                                    <div class="col-md-12">
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Giá khởi điểm</label>
                                    <input type="text" name="price_start" class="form-control" id="exampleInputEmail1" >
                                </div>
                                    </div>

                                   
                                    <div class="col-md-12">
                                    <div class="form-group">
                      <label for="exampleSelectGender">Trạng thái</label>
                       <select  class="form-control" name="daugia_status" input-sm m-bot15> 
                                        <option value="0">Hiện</option>
                                        <option value="1">Ẩn</option>
                                    </select>
                      </div>
                                    </div>
                    
                               
                                <button type="submit" name="add_daugia" class="btn btn-primary pull-right" style="float:right;">Thêm dau giá</button>
                                </form>
                            </div>

                        </div>
                    </section>
              </div></div></div>
            </div>
@endsection