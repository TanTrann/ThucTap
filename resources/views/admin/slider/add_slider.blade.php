@extends('admin_layout')
@section('admin_content')



            

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4>Thêm Slider</h4>
                  <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?>
                </div>
              
                <div class="card-body">
                 
                <form role="form" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên slide</label>
                          <input type="text" data-validation="lenght" data-validation-lenght="min3"  name="slider_name" class="form-control" id="exampleInputEmail1">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Slide">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả slider</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="slider_desc" id="exampleInputPassword1" ></textarea>
                        </div>
                      </div>         
                      
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <br>
                                    <select style="height: 30px ;width: 100px ; padding-left: 10px" name="slider_status" input-sm m-bot15> 
                                        <option value="0">Hiện</option>
                                        <option value="1">Ẩn</option>
                                    </select>

                  </div>
                   </div>
                    <button type="submit" class="btn btn-primary pull-right" style="float:right;" name="add-slider">Thêm slider</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              {{-- <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-brand text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
@endsection