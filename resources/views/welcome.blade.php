<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Mobifone - Trang chủ</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="{{asset('public/backend/images/favicon.png')}}" rel="icon">

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
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
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
                                <a href="blog.html" class="dropdown-item">Sim</a>
                                <a href="single.html" class="dropdown-item">Thiết bị di dộng</a>
                            </div>
                        </div>
                        <a href="{{url('/team.html')}}" class="nav-item nav-link">Tin tức</a>
                        <a href="{{url('/portfolio')}}" class="nav-item nav-link">Hổ trợ khách hàng</a>
                       
                        <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
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
                                    <h2>Salon Address</h2>
                                    <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                                    <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                                    <p><i class="fa fa-envelope"></i>info@example.com</p>
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
                            <h2>Newsletter</h2>
                            <p>
                                Lorem ipsum dolor sit amet elit. Quisque eu lectus a leo dictum nec non quam. Tortor eu placerat rhoncus, lorem quam iaculis felis, sed lacus neque id eros.
                            </p>
                            <div class="form">
                                <input class="form-control" placeholder="Email goes here">
                                <button class="btn">Submit</button>
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
    </body>
</html>
