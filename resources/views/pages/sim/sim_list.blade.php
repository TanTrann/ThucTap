@extends('pages/product')
@section('product_content')


 <!-- product list -->
     <div class="product-list">
        <div class="container">
            <div class="section-header">
                <h4>Sim</h4>
            </div>
            <div class="row" id="best-products">

                <div class="" >
                @foreach($all_sim as $key =>$sim)
                    <div class="product-card" style="margin-left: 15px;" >
                  
                    <form>
                                    @csrf
                    <input type="hidden" value="{{$sim->product_id}}" class="cart_product_id_{{$sim->product_id}}">

<input type="hidden" id="wishlist_simmunber{{$sim->product_id}}" value="{{$sim->product_name}}" class="cart_product_name_{{$sim->product_id}}">

<input type="hidden" value="{{$sim->product_quantity}}" class="cart_product_quantity_{{$sim->product_id}}">

<input type="hidden" value="{{$sim->product_images}}" class="cart_product_image_{{$sim->product_id}}">

<input type="hidden" id="wishlist_simprice{{$sim->product_id}}" value="{{number_format($sim->product_price,0,',','.')}}VNĐ">

<input type="hidden" value="{{$sim->product_price}}" class="cart_product_price_{{$sim->product_id}}">

<input type="hidden" value="1" class="cart_product_qty_{{$sim->product_id}}">
                        <div class="product-card-info">
                            
                        <div class="price-img">
                        
                        
                        <img src="public/uploads/products/{{$sim->product_images}}">
                           
                       
                      
                            </div>  
                            <div class="product-card-name">
                            {{$sim ->product_name}}
                            </div>
                            <div class="product-card-price">
                                
                                <span class="curr-price">{{ number_format($sim->product_price,0,',','.') }}vnd </span>
                            </div>
                            <button class="btn-flat btn-hover btn-shop-now"><a href="{{URL::to('/chi-tiet/'.$sim->product_id)}}">Chi tiết </a></button>
                                <input type="button" class="btn-flat btn-hover btn-cart-add add-to-cart" data-id_product="{{$sim->product_id}}" name="add-to-cart" value="Mua nhanh">
                                 
                            </input>
                                <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-heart'></i>
                                </button>
                           
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