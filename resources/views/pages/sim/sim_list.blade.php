@extends('pages/product')
@section('sim_content')


 <!-- product list -->
     <div class="product-list">
        <div class="container">
            <div class="section-header">
                <h4>Sim</h4>
            </div>
            <div class="row" id="best-products">

                <div class="all-product" >
                @foreach($all_sim as $key =>$sim)
                    <div class="product-card" style="margin-left: 15px;" >
                  
                    <form>
                                    @csrf
                    <input type="hidden" value="{{$sim->sim_id}}" class="cart_sim_id_{{$sim->sim_id}}">

<input type="hidden" id="wishlist_simmunber{{$sim->sim_id}}" value="{{$sim->sim_number}}" class="cart_sim_number_{{$sim->sim_id}}">




<input type="hidden" id="wishlist_simprice{{$sim->sim_id}}" value="{{number_format($sim->sim_price,0,',','.')}}VNĐ">

<input type="hidden" value="{{$sim->sim_price}}" class="cart_sim_price_{{$sim->sim_id}}">

<input type="hidden" value="1" class="cart_sim_qty_{{$sim->sim_id}}">
                        <div class="product-card-info">
                            
                        <div class="price-img">
                                <img src="public/frontend/img/sim.png" alt="Image" style="width:150px;">
                            </div>  
                            <div class="product-card-name">
                            {{$sim ->sim_number}}
                            </div>
                            <div class="product-card-price">
                                
                                <span class="curr-price">{{ number_format($sim->sim_price,0,',','.') }}vnd </span>
                            </div>
                            <button class="btn-flat btn-hover btn-shop-now"><a href="{{URL::to('/chi-tiet/'.$sim->sim_id)}}">Chi tiết </a></button>
                                <button class="btn-flat btn-hover btn-cart-add add-to-cart">
                                    <i class='bx bxs-cart-add'></i>
                                </button>
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