@section('content')
@extends('welcome')
<!-- Page Header Start -->
<div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Đấu Giá</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Trang chủ</a>
                        <a href="">Đấu Giá</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <div class="cate-brand-list">
        <ul class="list-group">
                            <li class="list-group-item">Danh mục sản phẩm</li>
                            	
                            @foreach($category as $key => $cate)
                            <li class="list-group-item"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                            @endforeach
                            </li>
                            <li class="list-group-item">Thương hiệu sản phẩm</li>
                            @foreach($brand as $key => $brand)
                            <li class="list-group-item"><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> {{$brand->brand_name}}</a></li>
                            @endforeach
        </ul>
       
        </div>


    
 <!-- product list -->
     <div class="product-list">
        <div class="container">
            <div class="section-header">
                <h4>Dau gia</h4>
            </div>
            
                @foreach($list_daugia as $key =>$daugia)
                    <div class="product-pages" >
                    <form>
                                    @csrf
                    <input type="hidden" value="{{$daugia->daugia_id}}" class="cart_daugia_id_{{$daugia->daugia_id}}">
                    <input type="hidden" value="{{$daugia->anh_daugia}}" class="cart_anh_daugia_{{$daugia->daugia_id}}">
                    <input type="hidden" value="{{$daugia->price_start}}" class="cart_price_start_{{$daugia->daugia_id}}">


                        <div class="product-card-img" style="width:300px;height:300px">
                        <a href="{{URL::to('/chi-tiet-dau-gia/'.$daugia->daugia_id)}}"> 
                        <img src="public/uploads/daugia/{{$daugia->anh_daugia}}">
                        </a>
                        </div>
                        <div class="product-card-info">
                            <div class="btndaugia">
                            <button class="btn-flat btn-hover btn-shop-now"><a href="{{URL::to('/chi-tiet-dau-gia/'.$daugia->daugia_id)}}">Chi tiết </a></button>

                            <input type="button" value="Xem nhanh" class="btn-flat btn-hover btn-cart-add xemnhanhdaugia" data-toggle="modal" data-target="#xemnhanhdaugia" data-id_daugia="{{$daugia->daugia_id}}"  name="chi-tiet" name="add-to-cart" > 
                           
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-heart'></i>
                                </button>
                            </div>
                          
                            <div class="product-card-name">
                            {{$daugia ->sp_daugia}}
                            </div>
                            
                            <p><b>Tình trạng:</b> @if($daugia->date_end>=$today)
                                                       <span style="color:green">Còn hạn</span>
                                                       @else 
                                                       <span style="color:red">Đã hết hạn</span>
                                                       @endif
                                                    </p>
                            <div class="product-card-price">
                            Giá khởi điểm:
                                <span class="curr-price">  {{ number_format($daugia->price_start,0,',','.') }}vnd </span>
                            </div>
                          
                        </div>
                       
                    </div>
                </form>
                    @endforeach
                    
                    
            </div>
            
        </div>
</div>
    <!-- end product list -->
    <div class="clear-fix"></div>
<!-- Modal xem nhanh daugia-->
<div class="modal fade" id="xemnhanhdaugia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg"  role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title daugia_quickview_title" id="">
                                                Tên sản phẩm:
                                                        <span id="daugia_quickview_title" style="font-weight: bold;"></span>
                                                        
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body" style="padding-bottom: 40px;">
                                                    <style type="text/css">
                                                        span#daugia_quickview_content img {
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
                                                    <div class="col-md-7">
                                                            <span id="daugia_quickview_image"></span>
                                                            <span id="daugia_quickview_gallery"></span>
                                                            <strong> Thời gian:</strong>
                                                             Từ ngày <span id="daugia_quickview_date_start" style="color:green"></span>
                                                            
                                                         Hến hạn: <span id="daugia_quickview_date_end" style="color:green"> </span>
                                                         <br>
                                                         <p class="daugia_price">Giá khởi điểm: <span id="daugia_quickview_price" style="color:red"> </span></p>
                                                        </div>
                                                        <form>
                                                            @csrf
                                                            <div id="daugia_quickview_value"></div>
                                                        <div class="col-md-13" style="padding-left: 10px;">
                                                            <h2><span id="daugia_quickview_title"></span></h2>
                                                            <p>Mã ID: <span id="daugia_quickview_id"></span></p>
                                                           
                                                             
                                                            </span>
                                                            <h4 style="font-size: 20px; color: brown;font-weight: bold;">Chi tiết đấu giá</h4>
                                                         
                                                           
                                                            <p><span id="daugia_quickview_desc"></span></p>
                                                            <hr>
                                                          
                                                            
                                                            <div id="daugia_quickview_button"></div>
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

                         <!-- Modal xem nhanh daugia-->
@endsection
       