@extends('admin_layout')
@section('admin_content')


            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4>Thêm danh mục sản phẩm</h4>
                  <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?>
                </div>
               
                <div class="card-body">
                 
                   <form role="form" action="{{URL::to('save-category')}}" method="post">
                                    {{csrf_field()}}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên danh mục</label>
                          <input type="text" data-validation="lenght" data-validation-lenght="min3" data-validation-error-msg= "Điền ít nhất 10 kí tự" name="category_name" class="form-control" id="exampleInputEmail1">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mô tả danh mục</label>
                          <textarea style="resize :none" rows="8" name="category_desc"  class="form-control" id="ckeditor1" > </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Trạng thái</label>
                       <select  class="form-control" name="category_status" input-sm m-bot15> 
                                        <option value="0">Hiện</option>
                                        <option value="1">Ẩn</option>
                                    </select>
                      </div>
                    <div style="float:right">
                    <button type="submit" class="btn btn-primary pull-right" name="add-category">Thêm danh mục</button></div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
            </div>
          </div>
        </div>
     
  
  @endsection