


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Shop</title>
    <link href="/shop/public/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/shop/public/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="/shop/public/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="/shop/public/frontend/css/price-range.css" rel="stylesheet">
    <link href="/shop/public/frontend/css/animate.css" rel="stylesheet">
	<link href="/shop/public/frontend/css/main.css" rel="stylesheet">
	<link href="/shop/public/frontend/css/responsive.css" rel="stylesheet">
	<link href="/shop/public/frontend/css/normalize" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/shop/public/frontend/js/html5shiv.js"></script>
    <script src="/shop/public/frontend/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/shop/public/frontend/img/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/shop/public/frontend/img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/shop/public/frontend/img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/shop/public/frontend/img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/shop/public/frontend/img/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84966548626</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> camvanthnhaz@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://fb.me/thanh.dz.az"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/trang-chu')}}"><img src="../public/frontend/logo.png" alt="" /></a>
						</div>
					
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php $a = Session::get('user_name');
								if (!$a) {
									$a = 2;
								}
								
								?>
							<li><a href="{{URL::to('/user-account/'.$a)}}"><i class="fa fa-user"></i> <span name="user_email"> @if (Session::get('user_email')==null)
								Guess
								
							@endif
							@if (Session::get('user_email'))
								
							{{Session::get('user_email')}}
							@endif
                                
                            </a></li>
							<li><a href="{{URL::to('/cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{Session::get('so_luong')}})</a></li>
                                    <?php
                                    if (Session::get('user_name')==null) {?>
                                        <li><a href="{{URL::to('/user-login')}}"><i class="glyphicon glyphicon-log-in"></i> Đăng nhập</a></li>
                                <?php	}else {?>
                                        <li><a href="{{URL::to('/user-logout')}}"><i class="glyphicon glyphicon-log-out"></i> Đăng xuất</a></li>
                                <?php	}	?>
                                    
                                    
                                </ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Shopping<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{URL::to('/home')}}">Sản phẩm</a></li>
										<li><a href="{{URL::to('/cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{Session::get('so_luong')}})</a></li>
										
                                    </ul>
                                </li> 
								<li><a href="{{URL::to('/contact')}}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" size="20" placeholder="Tìm kiếm"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
    </header><!--/header-->
    

	
    @yield('user-login')
	@yield('cart_view')
	@yield('content')


    <footer id="footer"><!--Footer-->
	
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								
								<li><a href="#">Liên hệ chúng tôi</a></li>
								<li><a href="#">Trạng thái đơn hàng</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
		
		<div  class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="/shop/public/frontend/js/jquery.js"></script>
	<script src="/shop/public/frontend/js/bootstrap.min.js"></script>
	<script src="/shop/public/frontend/js/jquery.scrollUp.min.js"></script>
	<script src="/shop/public/frontend/js/price-range.js"></script>
    <script src="/shop/public/frontend/js/jquery.prettyPhoto.js"></script>
    <script src="/shop/public/frontend/js/main.js"></script>
</body>
</html>
