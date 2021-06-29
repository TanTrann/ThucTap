@extends('admin_layout')
@section('admin_content')


<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 >Thêm dịch vụ thoại </h4>
                  <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?>
                </div>
               
                <div class="card-body">
                 
                  <form action="{{URL::to('save-call-service')}}" method="post">
                                {{csrf_field()}}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên dịch vụ</label>
                          <input type="text" name="call_service_name" class="form-control" id="exampleInputEmail1">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Giá tiền</label>
                           <input type="text" name="call_service_price" class="form-control" id="exampleInputEmail1">
                         
                        </div>
                      </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Chi tiet dich vu</label>
                          <textarea rows="8"  name="call_service_content"  class="form-control"  > </textarea>
                        </div>
                      </div>
                   </div>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <br>
                                    <select  style="height: 30px ;width: 100px ; padding-left: 10px" name="call_service_status" input-sm m-bot15> 
                                        <option value="0">Hiện</option>
                                        <option value="1">Ẩn</option>
                                    </select>

                   </div>
                   </div>
                    <button type="submit" class="btn btn-primary pull-right" style="float:right" name="add-call-service">Thêm dich vu</button>
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
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
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
      
    </div>
  </div>
  
  @endsection