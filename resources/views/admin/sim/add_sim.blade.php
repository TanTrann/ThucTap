@extends('admin_layout')
@section('admin_content')


      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Thêm sim</h4>
                  <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?>
                </div>
              
                <div class="card-body">
                 
                   <form role="form" action="{{URL::to('save-sim')}}" method="post">
                                    {{csrf_field()}}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Số sim</label>
                          <input type="text" data-validation="lenght" data-validation-lenght="min3" name="sim_number" class="form-control" id="exampleInputEmail1">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Giá sim</label>
                          <input type="text" data-validation="lenght" data-validation-lenght="min3" name="sim_price" class="form-control" id="exampleInputEmail1">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mô tả sim</label>
                          <textarea style="resize :none" rows="8" name="sim_desc"  class="form-control" > </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <br>
                                    <select style="height: 30px ;width: 100px ; padding-left: 10px" name="sim_status" input-sm m-bot15> 
                                        <option value="0">Hiện</option>
                                        <option value="1">Ẩn</option>
                                    </select>

                  </div>
                   </div>
                    <button type="submit" class="btn btn-primary pull-right" style="float:right;" name="add-sim">Thêm sim</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
     
     
  
  @endsection