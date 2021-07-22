@extends('product')
@section('product_content')

 <!-- product list -->
     <div class="product-list">
        <div class="container">
            <div class="section-header">
                <h4>Điện thoại di động</h4>
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
                            <button class="btn-flat btn-hover btn-shop-now"><a href="{{URL::to('/chi-tiet/'.$pro->product_id)}}">Chi tiết </a></button>
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