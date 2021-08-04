@extends('admin_layout');
@section('admin_content')
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4>Tin tức</h4>
                  <p class="card-brand"></p>
                  <span> <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?></span>
                </div>
                <div class="card-body table-responsive">
                <table class="table table-hover"  >
                    <thead style="background-color: #add2fb">
                      <th>ID</th>
                      <th>Tiêu đề</th>
                      <th>Hinh ảnh</th>
                      <th>Trạng thái</th>
                        <th style="width:400px">Tóm tắt</th>
                      <th colspan="2" style="text-align: center; width: 88px;"> Quản lý</th>
                    </thead>
                    <tbody>
                    @foreach($all_news as $key =>$news)
          <tr>
             <td>{{$news ->news_id}}</td>
            <td>{{$news ->news_name}}</td>
          <td><img src="public/uploads/news/{{$news->news_images }}" height="100" width="100"></td>
            <td><span class="text-ellipsis">
                 <?php   
                 if ($news->news_status==0){
                    ?>

                        <a href="{{URL::to('/unactive-news/'.$news ->news_id)}}"><span class="mdi mdi-cart" style="font-size: 20px"></span></a>
                 
                      <?php
                          }else{
                      ?>
                        <a href="{{URL::to('/active-news/'.$news ->news_id)}}"><span class="mdi mdi-cart-off" style="font-size: 20px"></span></a>'
                      <?php   
                          }
                      ?>
                
                </span>
            </td>
            <td>
              {!!$news ->news_desc!!}  
            </td>
            <td style="text-align: center; width: 15px;">
              <a href="{{URL::to('/edit-news/'.$news->news_id)}}" class="mdi mdi-pencil" style="color: blue ;font-size: 17px" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
            </td>
            <td style="text-align: center;width: 15px;">  
              <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-news/'.$news->news_id)}}" class="mdi mdi-delete" style="color: red ;font-size: 17px"ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>

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