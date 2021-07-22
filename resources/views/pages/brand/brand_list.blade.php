@extends('pages/product')
@section('product_content')
 <!-- product list -->
 @foreach($brand_name as $key => $brand_0)
 <div class="product-list">
        <div class="container">
            
            <div class="section-header">
           
                <h4>{{$brand_0->brand_name}}</h4>
                @endforeach
            </div>
                
						
                       
            <div class="row" id="best-products">

                <div class="all-product" >
                @foreach($brand_by_id as $key => $product)
                    <div class="product-card" >
                  
                        <div class="product-card-img" style="width:300px;height:300px">
                        
                        <img src="{{URL::to('public/uploads/products/'.$product->product_images)}}" alt="" />
                           
                        </div>
                        <div class="product-card-info">
                            <div class="product-btn">
                            <button class="btn-flat btn-hover btn-shop-now"><a href="{{URL::to('/chi-tiet/'.$product->product_id)}}">Chi tiết </a></button>
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-cart-add'></i>
                                </button>
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-heart'></i>
                                </button>
                            </div>
                          
                            <div class="product-card-name">
                            {{$product->product_name}}
                            </div>
                            <div class="product-card-price">
                                <span><del>$300</del></span>
                                <span class="curr-price">{{number_format($product->product_price).' '.'VND'}}</span>
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
    <div class="clear-fix"></div>
@endsection 