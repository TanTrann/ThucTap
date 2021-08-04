@extends('pages/product')
@section('product_content')
 <!-- product list -->
 @foreach($category_name as $key => $category_0)
 <div class="product-list">
        <div class="container">
            
            <div class="section-header">
           
                <h4>{{$category_0->category_name}}</h4>
                @endforeach
            </div>
            
						
                       
        

         
                @foreach($category_by_id as $key => $product)
                    <div class="product-card" >
                    <form>
                                    @csrf
                                    <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">

<input type="hidden" id="wishlist_productname{{$product->product_id}}" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">

<input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">

<input type="hidden" value="{{$product->product_images}}" class="cart_product_image_{{$product->product_id}}">

<input type="hidden" id="wishlist_productprice{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}}VNĐ">

<input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">

<input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                        <div class="product-card-img" style="width:300px;height:300px">
                        <a href="{{URL::to('/chi-tiet/'.$product->product_id)}}"> 
                        <img src="{{URL::to('public/uploads/products/'.$product->product_images)}}" alt="" />
                        </a>
                        </div>
                        <div class="product-card-info">
                            <div class="product-btn">
                            <button class="btn-flat btn-hover btn-shop-now"><a href="{{URL::to('/chi-tiet/'.$product->product_id)}}">Chi tiết </a></button>
                            <input type="button" class="btn-flat btn-hover btn-cart-add add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart" value="Mua ngay">
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-heart'></i>
                                </button>
                            </div>
                          
                            <div class="product-card-name">
                            {{$product->product_name}}
                            </div>
                            <div class="product-card-price">
                                
                                <span class="curr-price">{{number_format($product->product_price).' '.'VND'}}</span>
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
@endsection 