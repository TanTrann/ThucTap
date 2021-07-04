@extends('welcome')
@section('content')




<!-- Page Header Start -->
<div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Sản phẩm</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Trang chủ</a>
                        <a href="">Sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>

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
        <!-- Page Header End -->

 

     <!-- product list -->
     <div class="product-list">
        <div class="container">
            <div class="section-header">
                <h2>Điện thoại di động</h2>
            </div>
            <div class="row" id="best-products">

                <div class="all-product" >
                @foreach($all_product as $key =>$pro)
                    <div class="product-card" >
                  
                        <div class="product-card-img" style="width:300px;height:300px">
                        
                        <img src="public/uploads/products/{{$pro->product_images}}">
                           
                        </div>
                        <div class="product-card-info">
                            <div class="product-btn">
                                <button class="btn-flat btn-hover btn-shop-now">Chi tiết</button>
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-cart-add'></i>
                                </button>
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-heart'></i>
                                </button>
                            </div>
                          
                            <div class="product-card-name">
                            {{$pro ->product_name}}
                            </div>
                            <div class="product-card-price">
                                <span><del>$300</del></span>
                                <span class="curr-price">{{ number_format($pro->product_price,0,',','.') }}vnd </span>
                            </div>
                          
                        </div>
                       
                    </div>
                    @endforeach
                    
                    
                    </div>
                </div>
            </div>
            
        </div>
</div>
    <!-- end product list -->

@endsection