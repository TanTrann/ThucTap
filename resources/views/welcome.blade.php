<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Mobifone - Trang chủ</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="/public/backend/images/favicon.png" rel="icon">

        <!-- Google Font -->
        <link href="{{asset('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap')}}" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- Template Stylesheet -->
        <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top-bar-left">
                            <div class="text">
                                <h2>7h00 - 17h00</h2>
                                <p>Opening Hour Mon - Fri</p>
                            </div>
                            <div class="text">
                                <h2>+123 456 7890</h2>
                                <p></p>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="top-bar-right">
                           <!-- DANG KI -->
                          
                           <!-- END DANG KI -->
                              <!--  DANG NHAP -->
                            
                                 @php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){ 
                                    @endphp

                                    
                                        <a href="{{URL::to('history')}}" style="padding-right: 44px" >Lịch sử đơn hàng </a>

                                    

                                    
                                   @php
                                    }
                                   @endphp

                                <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id!=NULL){ 
                                    ?>

                                    
                                        <a href="{{URL::to('/logout-checkout')}}"> Đăng xuất :

                                        <img width="15%" src="{{Session::get('customer_picture')}}"> {{Session::get('customer_name')}} </a>

                                   


                                    <?php
                                }else{
                                   ?>
                                   <a href="{{URL::to('/dang-nhap')}}"style="padding-right: 20px"><i class="fa fa-lock"></i> Đăng nhập</a>
                                   <a href="{{URL::to('/dang-ky')}}"  > Đăng ký</a>
                                   <?php 
                               }
                               ?>
                            </a>
                            <a href="{{URL::to('/gio-hang')}}"style="padding-left: 20px"><i class="fa fa-shopping-cart" ></i>Gio hang</a>
                            <!-- END DANG NHAP -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="{{url('/')}}" class="navbar-brand"><img src="public/frontend/img/logo.png" alt="logopage"></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="{{url('/')}}" class="nav-item nav-link">Trang Chủ</a>
                        <a href="{{url('/gioi-thieu')}}" class="nav-item nav-link">Giới thiệu</a>
                        <a href="{{url('/service')}}" class="nav-item nav-link">Dịch vụ</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
                            <div class="dropdown-menu">
                            @foreach($category as $key => $cate)
                               <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}" class="dropdown-item">{{$cate->category_name}}</a></li>
                               @endforeach
                            </div>
                        </div>
                        <a href="{{url('/news-list')}}" class="nav-item nav-link">Tin tức</a>
                        
                        <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
                        <a href="{{url::to('/daugia-list')}}" class="nav-item nav-link">Đấu giá</a>
                        <div class="">
                        <form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{csrf_field()}}
                        <div class="search_box pull-right" style="margin-top: -22px;margin-bottom: -39px;">
                            <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
                            <input type="submit" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm" style="margin-top: 26px;height: 29px;">
                        </div>
                        </form>
                    

                    </div>
                     
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->


       @yield('content')
        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-contact">
                                    <h2>Liên hệ với chúng tôi</h2>
                                    <p><i class="fa fa-map-marker-alt"></i>Tòa nhà MobiFone, đường số 22, Khu CTXD 8, P. Hưng Thạnh, Q. Cái Răng, Tp. Cần Thơ</p>
                                    <p><i class="fa fa-phone-alt"></i>0292 3765 211</p>
                                    <p><i class="fa fa-envelope"></i>mobifonemientay@mobifone.vn</p>
                                    <div class="footer-social">
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-youtube"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>Quick Links</h2>
                                    <a href="">Terms of use</a>
                                    <a href="">Privacy policy</a>
                                    <a href="">Cookies</a>
                                    <a href="">Help</a>
                                    <a href="">FQAs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="footer-newsletter">
                            <h2>Đăng kí nhận thông tin</h2>
                            <p>
                            </p>
                            <div class="form">
                                <input class="form-control" placeholder="Họ tên">
                                <input class="form-control" placeholder="Email">
                                <input class="form-control" placeholder="Số điện thoại">
                                <input class="form-control" placeholder="Tin nhắn">
                                <button class="btn">Gửi thông tin</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('public/frontend/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('public/frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('public/frontend/lib/lightbox/js/lightbox.min.js')}}"></script>
        
        <!-- Contact Javascript File -->
        <script src="{{asset('public/frontend/mail/jqBootstrapValidation.min.js')}}"></script>
        <script src="{{asset('public/frontend/mail/contact.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset('public/frontend/js/main.js')}}"></script>
        <script src="{{asset('public/frontend/js/app.js')}}"></script>
        <script src="{{asset('public/frontend/js/index.js')}}"></script>
        <script src="{{asset('public/frontend/js/slider.js')}}"></script>
        <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script> 
        <script type="text/javascript">
    function remove_background(product_id)
     {
      for(var count = 1; count <= 5; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ccc');
      }
    }
    //hover chuột đánh giá sao
   $(document).on('mouseenter', '.rating', function(){
      var index = $(this).data("index");
      var product_id = $(this).data('product_id');
    // alert(index);
    // alert(product_id);
      remove_background(product_id);
      for(var count = 1; count<=index; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ffcc00');
      }
    });
   //nhả chuột ko đánh giá
   $(document).on('mouseleave', '.rating', function(){
      var index = $(this).data("index");
      var product_id = $(this).data('product_id');
      var rating = $(this).data("rating");
      remove_background(product_id);
      //alert(rating);
      for(var count = 1; count<=rating; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ffcc00');
      }
     });

    //click đánh giá sao
    $(document).on('click', '.rating', function(){
          var index = $(this).data("index");
          var product_id = $(this).data('product_id');
            var _token = $('input[name="_token"]').val();
          $.ajax({
           url:"{{url('insert-rating')}}",
           method:"POST",
           data:{index:index, product_id:product_id,_token:_token},
           success:function(data)
           {
            if(data == 'done')
            {
             alert("Bạn đã đánh giá "+index +" trên 5");
            }
            else
            {
             alert("Lỗi đánh giá");
            }
           }
    });
          
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        
        load_comment();

        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/load-comment')}}",
              method:"POST",
              data:{product_id:product_id, _token:_token},
              success:function(data){
              
                $('#comment_show').html(data);
              }
            });
        }
        $('.send-comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/send-comment')}}",
              method:"POST",
              data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content, _token:_token},
              success:function(data){
                
                $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                load_comment();
                $('#notify_comment').fadeOut(9000);
                $('.comment_name').val('');
                $('.comment_content').val('');
              }
            });
        });
    });
</script>
        <script>
                function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
                }
        </script>
        <script type="text/javascript">
    
    $('.xemnhanhsim').click(function(){
        var sim_id = $(this).data('id_sim');
        var _token = $('input[name="_token"]').val();
        $.ajax({
        url:"{{url('/quickviewsim')}}",
        method:"POST",
        dataType:"JSON",
        data:{sim_id:sim_id, _token:_token},
          success:function(data){
            $('#sim_quickview_title').html(data.sim_number);
            $('#sim_quickview_id').html(data.sim_id);
            $('#sim_quickview_price').html(data.sim_price);
       
            // $('#sim_quickview_gallery').html(data.sim_gallery);
            $('#sim_quickview_desc').html(data.sim_desc);
            
            $('#sim_quickview_value').html(data.sim_quickview_value);
            $('#sim_quickview_button').html(data.sim_button);
                }
             });
        });

        </script>
        <script type="text/javascript">
    
    $('.xemnhanhservice').click(function(){
        var service_id = $(this).data('id_service');
        var _token = $('input[name="_token"]').val();
        $.ajax({
        url:"{{url('/quickviewservice')}}",
        method:"POST",
        dataType:"JSON",
        data:{service_id:service_id, _token:_token},
          success:function(data){
            $('#service_quickview_title').html(data.service_name);
            $('#service_quickview_id').html(data.service_id);
            $('#service_quickview_image').html(data.service_images);
            // $('#service_quickview_gallery').html(data.service_gallery);
            $('#service_quickview_desc').html(data.service_content);
            
            $('#service_quickview_value').html(data.service_quickview_value);
            $('#service_quickview_button').html(data.service_button);
                }
             });
        });

        </script>

<script type="text/javascript">
    
    $('.xemnhanhdataservice').click(function(){
        var data_service_id = $(this).data('id_service');
        var _token = $('input[name="_token"]').val();
        $.ajax({
        url:"{{url('/quickviewdataservice')}}",
        method:"POST",
        dataType:"JSON",
        data:{data_service_id:data_service_id, _token:_token},
          success:function(data){
            $('#data_service_quickview_title').html(data.data_service_name);
            $('#data_service_quickview_id').html(data.data_service_id);
       
            // $('#data_service_quickview_gallery').html(data.data_service_gallery);
            $('#data_service_quickview_desc').html(data.data_service_content);
            
            $('#data_service_quickview_value').html(data.data_service_quickview_value);
            $('#data_service_quickview_button').html(data.data_service_button);
                }
             });
        });

        </script>

<script type="text/javascript">
    
    $('.xemnhanhcallservice').click(function(){
        var call_service_id = $(this).data('id_service');
        var _token = $('input[name="_token"]').val();
        $.ajax({
        url:"{{url('/quickviewcallservice')}}",
        method:"POST",
        dataType:"JSON",
        data:{call_service_id:call_service_id, _token:_token},
          success:function(data){
            $('#call_service_quickview_title').html(data.call_service_name);
            $('#call_service_quickview_id').html(data.call_service_id);
       
            // $('#call_service_quickview_gallery').html(data.call_service_gallery);
            $('#call_service_quickview_desc').html(data.call_service_content);
            
            $('#call_service_quickview_value').html(data.call_service_quickview_value);
            $('#call_service_quickview_button').html(data.call_service_button);
                }
             });
        });

        </script>


<script type="text/javascript">
                $(document).ready(function(){
                    $('.add-to-cart').click(function(){

                        var id = $(this).data('id_product');
                        // alert(id);
                        var cart_product_id = $('.cart_product_id_' + id).val();
                        var cart_product_name = $('.cart_product_name_' + id).val();
                        var cart_product_image = $('.cart_product_image_' + id).val();
                        var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                        var cart_product_price = $('.cart_product_price_' + id).val();
                        var cart_product_qty = $('.cart_product_qty_' + id).val();
                        var _token = $('input[name="_token"]').val();

                        if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                            alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
                        }else{

                            $.ajax({
                                url: '{{url('/add-cart-ajax')}}',
                                method: 'POST',
                                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                                success:function(){

                                    swal({
                                            title: "Đã thêm sản phẩm vào giỏ hàng",
                                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                            showCancelButton: true,
                                            cancelButtonText: "Xem tiếp",
                                            confirmButtonClass: "btn-success",
                                            confirmButtonText: "Đi đến giỏ hàng",
                                            closeOnConfirm: false
                                        },
                                        function() {
                                            window.location.href = "{{url('/gio-hang')}}";
                                        });

                                }

                            });
                        }

                        
                    });
                });
            </script>
            <!-- xem nhanh daugia -->
            <script type="text/javascript">
    
    $('.xemnhanhdaugia').click(function(){
        var daugia_id = $(this).data('id_daugia');
        var _token = $('input[name="_token"]').val();
        $.ajax({
        url:"{{url('/quickviewdaugia')}}",
        method:"POST",
        dataType:"JSON",
        data:{daugia_id:daugia_id, _token:_token},
          success:function(data){
            $('#daugia_quickview_title').html(data.sp_daugia);
            $('#daugia_quickview_id').html(data.daugia_id);
            $('#daugia_quickview_price').html(data.price_start);
            $('#daugia_quickview_image').html(data.anh_daugia);
            // $('#daugia_quickview_gallery').html(data.daugia_gallery);
            $('#daugia_quickview_desc').html(data.chitiet_daugia);
            $('#daugia_quickview_date_start').html(data.date_start);
            $('#daugia_quickview_date_end').html(data.date_end);
            $('#daugia_quickview_value').html(data.daugia_quickview_value);
            $('#daugia_quickview_button').html(data.daugia_button);
                }
             });
        });

        </script>


        <script type="text/javascript">
$(document).ready(function(){
  $('.send_order').click(function(){
var total_after = $('.total_after').val();
      swal({
        title: "Xác nhận đơn hàng",
        text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Cảm ơn, Mua hàng",

          cancelButtonText: "Đóng,chưa mua",
          closeOnConfirm: false,
          closeOnCancel: false
      },
      function(isConfirm){
           if (isConfirm) {
              var shipping_email = $('.shipping_email').val();
              var shipping_name = $('.shipping_name').val();
              var shipping_address = $('.shipping_address').val();
              var shipping_phone = $('.shipping_phone').val();
              var shipping_notes = $('.shipping_notes').val();
              var shipping_method = $('.payment_select').val();

              var _token = $('input[name="_token"]').val();

              $.ajax({
                  url: '{{url('/confirm-order')}}',
                  method: 'POST',
                  data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,shipping_method:shipping_method},
                  success:function(){
                     swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                  }
              });

              // window.setTimeout(function(){ 
              //     location.reload();
              // } ,3000);

            } else {
              swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

            }
    
      });

     
  });
});


</script>
 <!--add to  cart quickview-->
 <script type="text/javascript">
       
       $(document).on('click','.add-to-cart-quickview',function(){

           var id = $(this).data('id_product');
           var cart_product_id = $('.cart_product_id_' + id).val();
           var cart_product_name = $('.cart_product_name_' + id).val();
           var cart_product_image = $('.cart_product_image_' + id).val();
           var cart_product_quantity = $('.cart_product_quantity_' + id).val();
           var cart_product_price = $('.cart_product_price_' + id).val();
           var cart_product_qty = $('.cart_product_qty_' + id).val();
           var _token = $('input[name="_token"]').val();

           if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
               alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
           }else{

               $.ajax({
                   url: '{{url('/add-cart-ajax')}}',
                   method: 'POST',
                   data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                   beforeSend: function(){
                       $("#beforesend_quickview").html("<p class='text text-primary'>Đang thêm sản phẩm vào giỏ hàng</p>");
                   },
                   success:function(){
                       $("#beforesend_quickview").html("<p class='text text-success'>Sản phẩm đã thêm vào giỏ hàng</p>");
                     

                   }

               });
           }

           
       });
       $(document).on('click','.redirect-cart',function(){
           window.location.href = "{{url('/gio-hang')}}";
       });
   
</script>

<script type="text/javascript">
                $(document).ready(function(){
                    $('.add-to-cart-sim').click(function(){

                        var id = $(this).data('id_sim');
                        // alert(id);
                        var cart_sim_id = $('.cart_sim_id_' + id).val();
                        var cart_sim_number = $('.cart_sim_number_' + id).val();
                        var cart_sim_image = $('.cart_sim_image_' + id).val();
                        var cart_sim_quantity = $('.cart_sim_quantity_' + id).val();
                        var cart_sim_price = $('.cart_sim_price_' + id).val();
                        var cart_sim_qty = $('.cart_sim_qty_' + id).val();
                        var _token = $('input[name="_token"]').val();

                        if(parseInt(cart_sim_qty)>parseInt(cart_sim_quantity)){
                            alert('Làm ơn đặt nhỏ hơn ' + cart_sim_quantity);
                        }else{

                            $.ajax({
                                url: '{{url('/add-cart-ajax-sim')}}',
                                method: 'POST',
                                data:{cart_sim_id:cart_sim_id,cart_sim_number:cart_sim_number,cart_sim_image:cart_sim_image,cart_sim_price:cart_sim_price,cart_sim_qty:cart_sim_qty,_token:_token,cart_sim_quantity:cart_sim_quantity},
                                success:function(){

                                    swal({
                                            title: "Đã thêm sản phẩm vào giỏ hàng",
                                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                            showCancelButton: true,
                                            cancelButtonText: "Xem tiếp",
                                            confirmButtonClass: "btn-success",
                                            confirmButtonText: "Đi đến giỏ hàng",
                                            closeOnConfirm: false
                                        },
                                        function() {
                                            window.location.href = "{{url('/gio-hang')}}";
                                        });

                                }

                            });
                        }

                        
                    });
                });
            </script>
            
    </body>
</html>
