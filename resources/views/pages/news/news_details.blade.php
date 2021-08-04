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


       


        


        <!-- Single Page Start -->
        <div class="single">
            <div class="container">
            @foreach($details_news as $key => $details)
                <div class="section-header text-center">
                    <h2>{{$details->news_name}}</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                    
                        <h5>{!!$details->news_content!!}</h5>
                       
                       
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Single Page End -->


         <!-- Service Start -->
         <div class="service" style="padding-bottom: 20px;">
            <div class="container">
                <div class="section-header text-center">
                    
                    <h2>Tin tức khác </h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-img">
                            @foreach($related_news as $key => $related)
                                <img src="public/uploads/news/{{$related->news_images}}">
                            </div>
                            <h3>{{$related->news_name}}</h3>
                            <p>
                            {!!$related->news_desc!!}
                            </p>
                            <a class="btn" href="">Learn More</a>
                        </div>
                        @endforeach
                    </div>
                   
                </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

@endsection