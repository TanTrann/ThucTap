@section('content')
@extends('welcome')


        <!-- Slide Start -->
        <div class="hero">
                <div class="row">
                    <!-- Thẻ Chứa Slideshow -->
                    <div class="slideshow-container">
                    <!-- Kết hợp hình ảnh và nội dung cho mội phần tử trong slideshow-->
                 
                        @foreach($slider as $key => $slide)
                         
                         
                    <div class="mySlides">
                        
                        <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" style="height: 500px; width:100%" >
                       
                        
                    </div>

                            @endforeach
                    <!-- Nút điều khiển mũi tên-->
                    <i class="prev" onclick="plusSlides(-1)">❮</i>
                    <i class="next" onclick="plusSlides(1)">❯</i>
                    </div>
                    <br>
                    </div>      
            </div>
            <!-- Nút tròn điều khiển slideshow-->
            <div class="dot-class" style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        


        <!-- Service Start -->
        <div class="service">
            <div class="container" >
                <!-- Row start -->
                    <H2>Dịch vụ di động</H2>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs  tabs" role="tablist">
                            <li class="nav-item">
                                                                        
                             <li class="nav-item" style="width: 200px; font-size: 20px;text-align: center ">
                                <a class="nav-link active" data-toggle="tab" href="#call" role="tab">Gói cước thoại</a>
                            </li>
                           
                            <li class="nav-item" style="width: 200px; font-size: 20px;text-align: center">
                                <a class="nav-link" data-toggle="tab" href="#data" role="tab">Gói data</a>
                            </li>
                            <li class="nav-item" style="width: 200px; font-size: 20px;text-align: center">
                                <a class="nav-link" data-toggle="tab" href="#service" role="tab">Dich vu khác</a>
                            </li>
                           </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabs card-block">
                           

                             <div class="tab-pane active" id="call" role="tabpanel" >
                                 <div class="owl-carousel service-carousel">
                                    @foreach($all_call_service as $key => $call_serv)
                                        <div class="service-item">
                                            <div class="service-text">
                                                <form>

                                                    @csrf           
                                                    <i class="fas fa-phone-alt" style="font-size: 50px ; border: 1px solid; padding: 19px"></i>
                                                        <h2 class="name">{{$call_serv->call_service_name}}</h2>    <p>{{ number_format($call_serv->call_service_price,0,',','.') }}vnd  </p>
                                                        {{-- <p>{!!$call_serv->call_service_content!!}</p> --}}
                                                        <input type="button" value="Chi tiết" class="chitiet xemnhanhcallservice" data-toggle="modal" data-target="#xemnhanhcallservice" data-id_service="{{$call_serv->call_service_id}}"  name="chi-tiet" name="add-to-cart" > 
                                                            </form>
                                            </div>
                                        </div>
                                    @endforeach
                                
                                </div>
                             </div>
                            <div class="tab-pane" id="data" role="tabpanel">
                                <div class="owl-carousel service-carousel">
                                    @foreach($all_data_service as $key => $data_serv)
                                        <div class="service-item">
                                            <div class="service-text">
                                                <form method="POST">
                                                    @csrf           
                                                    <i class="fas fa-rss" style="font-size: 50px ; border: 1px solid; padding: 19px"></i>
                                                        <h2 class="name">{{$data_serv->data_service_name}}</h2>    <p>{{ number_format($data_serv->data_service_price,0,',','.') }}vnd  </p>
                                                      {{--   <p>{!!$data_serv->data_service_content!!}</p> --}}
                                                      <input type="button" value="Chi tiết" class="chitiet xemnhanhdataservice" data-toggle="modal" data-target="#xemnhanhdataservice" data-id_service="{{$data_serv->data_service_id}}"  name="chi-tiet" name="add-to-cart" > 
                                                            </form>
                                            </div>
                                        </div>
                                    @endforeach
                                
                                </div>
                            </div>
                             <div class="tab-pane" id="service" role="tabpanel">
                                <div class="owl-carousel service-carousel">
                                    @foreach($all_service as $key => $serv)
                                        <div class="service-item">
                                            <div class="service-text">                                                       
                                               <form method="POST">
                                                    @csrf  
                                                    <img src="public/uploads/service/{{ $serv->service_images }}" style="    width: 98px;
                                                        margin-top: 15px;
                                                        margin-left: 36%;
                                                        padding-bottom: 110px;">          
                                                        <h2 class="name">{{$serv->service_name}}</h2>     
                                                     {{--    <p>{!!$serv->service_content!!}</p> --}}
                                                    <input type="button" value="Chi tiết" class="chitiet xemnhanhservice" data-toggle="modal" data-target="#xemnhanhservice" data-id_service="{{$serv->service_id}}"  name="chi-tiet" name="add-to-cart" > 
                                                            </form>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>


                        </div>
                </div>
</div></div>
        <!-- Service End -->
        

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="about-img">
                            <img src="public/frontend/img/about.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="section-header text-left">
                            <p>Giới thiệu mobifone</p>
                            <h2>Lịch sử hình thành</h2>
                        </div>
                        <div class="about-text">
                            <p>
                                MobiFone được thành lập ngày 16/04/1993 với tên gọi ban đầu là Công ty thông tin di động. Ngày 01/12/2014, Công ty được chuyển đổi thành Tổng công ty Viễn thông MobiFone, trực thuộc Bộ Thông tin và Truyền thông, kinh doanh trong các lĩnh vực: dịch vụ viễn thông truyền thống, VAS, Data, Internet & truyền hình IPTV/cable TV, sản phẩm khách hàng doanh nghiệp, dịch vụ công nghệ thông tin, bán lẻ và phân phối và đầu tư nước ngoài.
                            </p>
                            
                            <a class="btn" href="{{url("gioi-thieu")}}">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


         <!-- product list -->
   <div class="product">
        <div class="container">
            <div class="section-header">
                <h2>Sản phẩm mới nhất</h2>
            </div>
  

                <div class="new-product owl-carousel service-carousel" >
                @foreach($all_phone as $key =>$phone)
                    <div class="product-card" >
                    <form>
                                    @csrf
                    <input type="hidden" value="{{$phone->product_id}}" class="cart_product_id_{{$phone->product_id}}">

<input type="hidden" id="wishlist_productname{{$phone->product_id}}" value="{{$phone->product_name}}" class="cart_product_name_{{$phone->product_id}}">

<input type="hidden" value="{{$phone->product_quantity}}" class="cart_product_quantity_{{$phone->product_id}}">

<input type="hidden" value="{{$phone->product_images}}" class="cart_product_image_{{$phone->product_id}}">

<input type="hidden" id="wishlist_productprice{{$phone->product_id}}" value="{{number_format($phone->product_price,0,',','.')}}VNĐ">

<input type="hidden" value="{{$phone->product_price}}" class="cart_product_price_{{$phone->product_id}}">

<input type="hidden" value="1" class="cart_product_qty_{{$phone->product_id}}">
                        <div class="product-card-img" style="
    margin-left: 56px;">
                            <a href="{{URL::to('/chi-tiet/'.$phone->product_id)}}"> 
                        <img src="public/uploads/products/{{$phone->product_images}}">
                            </a>
                        </div>
                        <div class="product-card-info">
                            <div class="product-btn">
                                <button class="btn-flat btn-hover btn-shop-now"><a href="{{URL::to('/chi-tiet/'.$phone->product_id)}}">Chi tiết </a></button>
                                <input type="button" class="btn-flat btn-hover btn-cart-add add-to-cart" data-id_product="{{$phone->product_id}}" name="add-to-cart" value="Mua ngay">
                                    
                                </input>

                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-heart'></i>
                                </button>
                            </div>
                           

                                       
                            <div class="product-card-name">
                            {{$phone ->product_name}}
                            </div>
                            <div class="product-card-price">
                                
                                <span class="curr-price">{{ number_format($phone->product_price,0,',','.') }}vnd </span>
                            </div>
                          
                        </div>
                       
                    </div>
                                    </form>
                    @endforeach
                    
                    
                    </div>
                </div>
          
            
        </div>
</div>
    <!-- end product list -->

        <!-- Pricing Start -->
        <div class="price" style="background-color: #cee6f5;padding:80px;">
            <div class="container">
                <div class="section-header text-center" style="margin-bottom: 45px;">
                    <p></p>
                    <h2>Sim điện thoại</h2>
                </div>
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="sim-list">
                    @foreach($all_sim as $key =>$sim)
                        <div class="price-item" style="padding: 10px; border-radius: 30px;">
                            <div class="price-img">
                                <img src="public/frontend/img/sim.png" alt="Image">
                            </div>
                            <div class="price-text">
                                <h2> {{$sim ->product_name}}</h2>
                                <h3>{{number_format($sim->product_price,0,',','.') }} vnd</h3>
                                <input type="button" data-toggle="modal" data-target="#xemnhanhsim"  value="Chi tiết" class="btn btn-default xemnhanhsim" data-id_sim="{{$sim->product_id}}" name="add-to-cart">
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                   
                </div>
                </form>
            </div>
            <div class="section-footer" style="margin-top: 100px">
                <a href="{{URL('/sim-list')}}" class=" btn-hover" style=" border-radius: 20px;">Xem thêm</a>
            </div>
        </div>
        <!-- Pricing End -->
        
        
       
        
       


        <!-- Blog Start -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    
                    <h2>Tin tức</h2>
                </div>
                <div class="owl-carousel blog-carousel">
                @foreach($all_news as $key => $news)
                    <div class="blog-item">
                  
                        <div class="blog-img">
                        <img src="public/uploads/news/{{$news->news_images}}">
                        </div>
                        <div class="blog-meta">
                            <i class="fa fa-list-alt"></i>
                         
                            <i class="fa fa-calendar-alt"></i>
                           
                        </div>
                        <div class="blog-text">
                           <h2>{{$news->news_name}}</h2>
                            <p>
                            {!!$news->news_desc!!}
                            </p>
                            <a class="btn" href="{{URL::to('/chitiettintuc/'.$news->news_id)}}">Xem thêm <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                    
                   
                    
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->
<!-- Modal xem nhanh-->
<div class="modal fade" id="xemnhanhsim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg"  role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title sim_quickview_title" id="">
                                                   Số sim: 
                                                        <span id="sim_quickview_title"></span>
                                                        
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <style type="text/css">
                                                        span#sim_quickview_content img {
                                                            width: 100%;
                                                        }

                                                        @media screen and (min-width: 768px) {
                                                            .modal-dialog {
                                                              width: 700px; /* New width for default modal */
                                                            }
                                                            .modal-sm {
                                                              width: 350px; /* New width for small modal */
                                                            }
                                                        }
                                                        
                                                        @media screen and (min-width: 992px) {
                                                            .modal-lg {
                                                              width: 1200px; /* New width for large modal */
                                                            }
                                                        }
                                                    </style>
                                                    <div class="row">
                                                    <div class="col-md-5">
                                                            <span id="product_quickview_image"><img src="public/frontend/img/sim.png" alt="Image" style="width: 316px;"></span>
                                                            <span id="product_quickview_gallery"></span>
                                                        </div>
                                                        <form>
                                                            @csrf
                                                            <div id="sim_quickview_value"></div>
                                                        <div class="col-md-13" style="padding-left: 10px;">
                                                            <h2><span id="sim_quickview_title"></span></h2>
                                                            <p>Mã ID: <span id="sim_quickview_id"></span></p>
                                                            <p style="font-size: 20px; color: brown;font-weight: bold;">Giá sản phẩm : <span id="sim_quickview_price"></span></p>
                                
                                                                
                                                             
                                                            </span>
                                                            <h4 style="font-size: 20px; color: brown;font-weight: bold;">Mô tả sản phẩm</h4>
                                                            <hr>
                                                            <p><span id="sim_quickview_desc"></span></p>
                                                         
                                                            
                                                            <div id="sim_quickview_button"></div>
                                                            <div id="beforesend_quickview"></div>
                                                        </div>
                                                        </form>

                                                    </div>
                                                   
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    <button type="button" class="btn btn-default redirect-cart">Đi tới giỏ hàng</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div> 
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                    
                      </ul>

                     <!-- Modal xem nhanh service-->
<div class="modal fade" id="xemnhanhservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg"  role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title service_quickview_title" id="">
                                                   Tên dịch vụ:
                                                        <span id="service_quickview_title"></span>
                                                        
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <style type="text/css">
                                                        span#service_quickview_content img {
                                                            width: 100%;
                                                        }

                                                        @media screen and (min-width: 768px) {
                                                            .modal-dialog {
                                                              width: 700px; /* New width for default modal */
                                                            }
                                                            .modal-sm {
                                                              width: 350px; /* New width for small modal */
                                                            }
                                                        }
                                                        
                                                        @media screen and (min-width: 992px) {
                                                            .modal-lg {
                                                              width: 1200px; /* New width for large modal */
                                                            }
                                                        }
                                                    </style>
                                                    <div class="row">
                                                    <div class="col-md-5">
                                                            <span id="service_quickview_image"></span>
                                                            <span id="product_quickview_gallery"></span>
                                                        </div>
                                                        <form>
                                                            @csrf
                                                            <div id="service_quickview_value"></div>
                                                        <div class="col-md-13" style="padding-left: 10px;position: absolute;">
                                                            <h2><span id="service_quickview_title"></span></h2>
                                                            <p>Mã ID: <span id="service_quickview_id"></span></p>
                                                           
                                                             
                                                            </span>
                                                            <h4 style="font-size: 20px; color: brown;font-weight: bold;">Mô tả dịch vụ</h4>
                                                            <hr>
                                                            <p><span id="service_quickview_desc"></span></p>
                                                         
                                                            
                                                            <div id="service_quickview_button"></div>
                                                            <div id="beforesend_quickview"></div>
                                                        </div>
                                                        </form>

                                                    </div>
                                                   
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                            </div> 
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                    
                      </ul>

                         <!-- Modal xem nhanh data service-->
   <div class="modal fade" id="xemnhanhdataservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg"  role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title data_service_quickview_title" id="">
                                                   Tên dịch vụ:
                                                        <span id="data_service_quickview_title"></span>
                                                        
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <style type="text/css">
                                                        span#data_service_quickview_content img {
                                                            width: 100%;
                                                        }

                                                        @media screen and (min-width: 768px) {
                                                            .modal-dialog {
                                                              width: 700px; /* New width for default modal */
                                                            }
                                                            .modal-sm {
                                                              width: 350px; /* New width for small modal */
                                                            }
                                                        }
                                                        
                                                        @media screen and (min-width: 992px) {
                                                            .modal-lg {
                                                              width: 1200px; /* New width for large modal */
                                                            }
                                                        }
                                                    </style>
                                                    <div class="row">
                                                    <div class="col-md-5">
                                                            <span id="product_quickview_image"><img src="public/frontend/img/dataservice.png" alt="Image" style="width:275px;"></span>
                                                            <span id="product_quickview_gallery"></span>
                                                        </div>
                                                        <form>
                                                            @csrf
                                                            <div id="data_service_quickview_value"></div>
                                                        <div class="col-md-13" style="padding-left: 10px;position: absolute;">
                                                            <h2><span id="data_service_quickview_title"></span></h2>
                                                            <p>Mã ID: <span id="data_service_quickview_id"></span></p>
                                                           
                                                             
                                                            </span>
                                                            <h4 style="font-size: 20px; color: brown;font-weight: bold;">Mô tả dịch vụ</h4>
                                                            <hr>
                                                            <p><span id="data_service_quickview_desc"></span></p>
                                                         
                                                            
                                                            <div id="data_service_quickview_button"></div>
                                                            <div id="beforesend_quickview"></div>
                                                        </div>
                                                        </form>

                                                    </div>
                                                   
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                            </div> 
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                    
                      </ul>

                       <!-- Modal xem nhanh data service-->
 <div class="modal fade" id="xemnhanhcallservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg"  role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title call_service_quickview_title" id="">
                                                   Tên dịch vụ:
                                                        <span id="call_service_quickview_title"></span>
                                                        
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <style type="text/css">
                                                        span#call_service_quickview_content img {
                                                            width: 100%;
                                                        }

                                                        @media screen and (min-width: 768px) {
                                                            .modal-dialog {
                                                              width: 700px; /* New width for default modal */
                                                            }
                                                            .modal-sm {
                                                              width: 350px; /* New width for small modal */
                                                            }
                                                        }
                                                        
                                                        @media screen and (min-width: 992px) {
                                                            .modal-lg {
                                                              width: 1200px; /* New width for large modal */
                                                            }
                                                        }
                                                    </style>
                                                    <div class="row">
                                                    <div class="col-md-5">
                                                            <span id="call_service_quickview_image"><img src="public/frontend/img/callservice.png" alt="Image" style="width:275px;"></span>
                                                            <span id="product_quickview_gallery"></span>
                                                        </div>
                                                        <form>
                                                            @csrf
                                                            <div id="call_service_quickview_value"></div>
                                                        <div class="col-md-13" style="padding-left: 10px;position: absolute;">
                                                            <h2><span id="call_service_quickview_title"></span></h2>
                                                            <p>Mã ID: <span id="call_service_quickview_id"></span></p>
                                                           
                                                             
                                                            </span>
                                                            <h4 style="font-size: 20px; color: brown;font-weight: bold;">Mô tả dịch vụ</h4>
                                                            <hr>
                                                            <p><span id="call_service_quickview_desc"></span></p>
                                                         
                                                            
                                                            <div id="call_service_quickview_button"></div>
                                                            <div id="beforesend_quickview"></div>
                                                        </div>
                                                        </form>

                                                    </div>
                                                   
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                            </div> 
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                    
                      </ul>
@endsection