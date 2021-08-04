@section('content')
@extends('welcome')


<!-- Page Header Start -->
<div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Tin tức</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Trang chủ</a>
                        <a href="">Tin tức</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
  <!-- Blog Start -->
  <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                <h2>Tin Tức trong ngày</h2>
                    <p></p>
                  
                </div>
                <div class="row blog-page">
                @foreach($all_news as $key => $news)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-img">
                            <img src="public/uploads/news/{{$news->news_images}}">
                            </div>
                            <div class="blog-meta">
                                <i class="fa fa-list-alt"></i>
                                <a href=""></a>
                                <i class="fa fa-calendar-alt"></i>
                                <p>{{$news->created_at}}</p>
                            </div>
                            <div class="blog-text">
                                <h2>{{$news->news_name}}</h2>
                                <p>
                                {!!$news->news_desc!!}
                                </p>
                                <a class="btn" href="{{URL::to('/chitiettintuc/'.$news->news_id)}}">Xem thêm<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                    
                    
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul> 
                    </div>
                </div> -->
            </div>
        </div>
        <!-- Blog End -->


@endsection