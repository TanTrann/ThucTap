@section('content')
@extends('welcome')

<!-- Page Header Start -->
<div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Chi Tiết Đấu Giá</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Trang chủ</a>
                        <a href="">Chi Tiểt Đấu Giá</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

   

        @foreach($chitiet as $key => $value)
        <div class="col-sm-11" style="    margin-left: 105px;" >
<div  class="daugia-details" ><!--daugia-details-->


						<div class="col-sm-11">
							<div class="daugia-information" style="    "><!--/daugia-information-->
                            <div class="price_daugia" style="margin-left: 403px ;height:800px;position: absolute;">    
                                    <span class="daugia-card-price" > <h4 style="color:red">Giá khởi điểm: {{ number_format($value->price_start,0,',','.') }}vnd </h4></span>
                                    @foreach($giadau_kh as $key => $gd_kh)
                                    <span class="daugia-card-price" > <h4 style="color:green">Giá hiện tại: {{ number_format($gd_kh->Giadau_KH,0,',','.') }}vnd </h4></span>
                                    @endforeach
									<input name="productid_hidden" type="hidden"  value="" />
                                    @if($value->date_end>=$today)
                                  <p>  (Lưu ý : Giá nhập phải lớn hơn giá khởi điểm hoặc giá hiện tại(nếu có)):</p>
                                  <?php
                                            $message = Session::get('message');
                                            if ($message){
                                            echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                                Session::put('message',null);
                                }
                                ?>
                                 <form action="{{URL::to('/luu-daugia/'.$value->daugia_id)}}" method="POST">
                                 @csrf
                                  <p> Nhập thông tin</p>
                                  <p> <?php
                             $message = Session::get('message');
                            if ($message){
                             echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                Session::put('message',null);
                                }
                                 ?></p>  
                                  <input type="hidden" name="daugia_id" value="{{($value->daugia_id)}}">
                                    <input type="text"  class="member" name="Hoten_KH" placeholder="Họ tên" >
                                    <input type="text"  class="member" name="CMND_KH" placeholder="Số CMND" >
                                    <input type="text"   class="member" name="Sdt_KH" placeholder="Số điện thoại" >
                                    <input type="text"   class="member" name="Diachi_KH" placeholder="Địa chỉ" >
                                    <input type="text"   class="member" name="Giadau_KH" placeholder="Nhập giá" >
									<button class="add-daugia" name="luu-giadau" style="margin-left: 400px;">Đấu giá</button>
                                    @else 
                                    <input type="button" onclick="myFunction()" value="Đã hết hạn" class="add-daugia-hethan" disabled>
                                    @endif
                                    </form>
								

                                </div>       
							
							
							</div><!--/daugia-information-->
                        
						</div>
                            <img src="{{URL::to('public/uploads/daugia/'.$value->anh_daugia)}}" alt="" style="width: 297px; margin-top: -44px;"/>
							

                               
                                <form>
                             
                               
                         
                                <h2>Số sim: {{($value->sp_daugia)}}</h2>


                               
								<p names="daugia-id"> MÃ ID: {{($value->daugia_id)}}</p>
                                Ngày bắt đầu: <p style="color:green">{{($value->date_start)}}</p>
                           Ngày kết thúc:<p style="color:green">{{($value->date_end)}}</p>
                    
                           <p><b>Tình trạng:</b> @if($value->date_end>=$today)
                                                       <span style="color:green">Còn hạn</span>
                                                       @else 
                                                       <span style="color:red">Đã hết hạn</span>
                                                       @endif
                                                    </p>
                                <p><b>Nội dung đầu giá:</b>{!!$value->chitiet_daugia!!} </p>
                           
                       
</div>	

                       
                    
					</div><!--/daugia-details-->
                    </form>
                    @endforeach
                    <div class="clear-fix"></div>		
		<!--/category-tab-->
					


        
        
@endsection