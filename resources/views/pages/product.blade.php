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
  <!-- Page Header End -->

    @yield('product_content')

@endsection