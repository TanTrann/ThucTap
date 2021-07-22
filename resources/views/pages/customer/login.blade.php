@section('content')
@extends('welcome')


<!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Tài khoản</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Trang chủ</a>
                        <a href="">Tài khoản</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						@if(session()->has('message'))
							<div class="alert alert-success">
								{!! session()->get('message') !!}
							</div>
							@elseif(session()->has('error'))
							<div class="alert alert-danger">
								{!! session()->get('error') !!}
							</div>
							@endif
						<h2>Đăng nhập tài khoản</h2>
						<form action="{{URL::to('/login-customer')}}" method="POST">
							{{csrf_field()}}
							<input type="text" name="email_account" placeholder="Tài khoản" />
							<input type="password" name="password_account" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<span>
								<a href="{{url('/quen-mat-khau')}}">Quên mật khẩu</a>
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>

						</form>
						
						<style type="text/css">

							ul.list-login {
							    margin: 10px;
							    padding: 0;
							}
							ul.list-login li {
							    display: inline;
							    margin: 5px;
							}
							
						</style>

						{{-- <ul class="list-login">

							<li>
								<a href="{{url('login-customer-google')}}">
									<img width="10%" alt="Đăng nhập bằng tài khoản google"  src="{{asset('public/frontend/images/gg.png')}}">
								</a>
							</li>
							
							<li>
								<a href="{{url('login-facebook-customer')}}">
									<img width="10%" alt="Đăng nhập bằng tài khoản facebook"  src="{{asset('public/frontend/images/fb.png')}}">
								</a>
							</li>
						</ul> --}}
							
						
					</div><!--/login form-->
				</div>
				
			
			</div>
		</div>
	</section><!--/form-->






@endsection