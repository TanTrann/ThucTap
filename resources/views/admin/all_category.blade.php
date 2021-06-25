@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Danh mục sản phẩm</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Tên danh mục</th>
                      <th>Ẩn/Hiện</th>
                      <th>Mô tả</th>
                      <th colspan="2" style="text-align: center; width: 88px;"> Quản lý</th>
                    </thead>
                    <tbody>
                    @foreach($all_category as $key =>$cate_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$cate_pro ->category_name}}</td>
            <td><span class="text-ellipsis">
                 <?php   
                 if ($cate_pro->category_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-category/'.$cate_pro ->category_id)}}"><span class="fa-thump-styling fa fa-thumbs-up"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-category/'.$cate_pro ->category_id)}}"><span class="fa-thump-styling fa fa-thumbs-down"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>
            </td>
            <td>
              {{$cate_pro ->category_desc}}  
            </td>
            <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-category/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-category/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>

            </td>

          </tr>
            @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection