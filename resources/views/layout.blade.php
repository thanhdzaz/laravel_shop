
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
							<a href="{{URL::to('/trang-chu')}}"><img src="public/frontend/logo.png" alt="" /></a>
						</div>
					
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php $a = Session::get('user_name');
								if (!$a) {
									$a = "Guest";
								}
								
								?>
							<li><a href="{{URL::to('/user-account/'.$a)}}"><i class="fa fa-user"></i> <span name="user_email"> @if (Session::get('user_email')==null)
								Guess
								
							@endif
							@if (Session::get('user_email'))
								
							{{Session::get('user_email')}}
							@endif
							</span>
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
								<span class="sr-only">Toggle navigation</span>
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
							<input type="text" style="width: 300px" placeholder="Tìm kiếm"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>A</span>cer</h1>
									<h2>Nitro 5</h2>
									<p>- Acer Nitro 5 AN515 là một sản phẩm dành cho game thủ với thiết kế hầm hố, nhiều góc cạnh với tông màu đỏ đen truyền thống. Máy tính cũng vô cùng mạnh mẽ với chip Kaby Lake thế hệ 7 của Intel và card NVIDIA rời.</p>
									<button type="button" class="btn btn-default get">Nút này để bấm</button>
								</div>
								<div class="col-sm-6">
									<img style="height: 300px; width: auto;" src="/shop/public/frontend/img/lap1.png" class="girl img-responsive" alt="" />
									{{-- <img src="/shop/public/frontend/img/pricing.png"  class="pricing" alt="" /> --}}
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>A</span>sus</h1>
									<h2>FX505DT</h2>
									<p>Kết hợp bộ xử lý AMD Ryzen mới nhất và đồ họa NVIDIA GeForce GTX trên màn hình NanoEdge lên tới 120Hz, Asus TUF FX505DT sẽ mang tới cho bạn một trải nghiệm chơi game đỉnh cao. Bên cạnh đó, máy tính cũng đáp ứng tiêu chuẩn độ bền MIL-STD-810G cấp quân đội.</p>
									<button type="button" class="btn btn-default get">Nút này để bấm</button>
								</div>
								<div class="col-sm-6">
									<img style="height: 300px; width: auto;" src="/shop/public/frontend/img/lap2.png" class="girl img-responsive" alt="" />
									{{-- <img src="/shop/public/frontend/img/pricing.png"  class="pricing" alt="" /> --}}
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>H</span>P</h1>
									<h2>HP Pavilion Gaming 15</h2>
									<p>Trang bị sức mạnh đáng mơ ước từ bộ vi xử lý Ryzen 5 4000 series mới nhất và card rời GTX 1650, HP Pavilion Gaming 15 ec1054AX cho bạn tận hưởng trải nghiệm game thú vị ở bất cứ đâu nhờ thiết kế gọn nhẹ di động.</p>
									<button type="button" class="btn btn-default get">Nút này để bấm</button>
								</div>
								<div class="col-sm-6">
									<img style="height: 300px; width: auto;" src="/shop/public/frontend/img/lap3.png" class="girl img-responsive" alt="" />
									{{-- <img src="/shop/public/frontend/img/pricing.png" class="pricing" alt="" /> --}}
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục hàng hóa</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Laptop
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="http://">Asus</a></li>
											<li><a href="http://"></a>HP</li>
											<li><a href="http://"></a>Acer</li>
										
											
											
										</ul>
									</div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Di động
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Samsung</a></li>
											<li><a href="#">Oppo</a></li>
											<li><a href="#">Vivo</a></li>
											<li><a href="#">Asus</a></li>
											<li><a href="#">Nokia</a></li>
										</ul>
									</div>
								</div>
							</div>


							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Linh kiện
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Ram</a></li>
											<li><a href="#">SSD</a></li>
											<li><a href="#">HDD</a></li>
											<li><a href="#"></a></li>
											<li><a href="#"></a></li>
											<li><a href="#"></a></li>
											<li><a href="#"></a></li>
											<li><a href="#"></a></li>
											<li><a href="#"></a></li>
											<li><a href="#"></a></li>
										</ul>
									</div>
								</div>
							</div>
							
							
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Hãng</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(1)</span>Asus</a></li>
									<li><a href="#"> <span class="pull-right">(1)</span>HP</a></li>
									<li><a href="#"> <span class="pull-right">(1)</span>Acer</a></li>
									<li><a href="#"> <span class="pull-right">(0)</span>Vivo</a></li>
									<li><a href="#"> <span class="pull-right">(0)</span>Samsung</a></li>
									<li><a href="#"> <span class="pull-right">(0)</span>Nokia</a></li>
									<li><a href="#"> <span class="pull-right">(0)</span>Oppo</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						
						
					
					</div>
				</div>
				

		

				
					
					@yield('content')
					@yield('user-login')
					





					
				</div>
			</div>
		</div>
	</section>
	

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
					
					
					
				
				<iframe	style="align-self: center; float: right;"
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14905.432844490055!2d103.8796023!3d20.93812515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31326af04dd410ef%3A0x2c854b56186c621!2zMjDCsDU2JzIzLjgiTiAxMDPCsDUyJzU1LjgiRQ!5e0!3m2!1svi!2s!4v1600600647647!5m2!1svi!2s" 
				width="420" height="210" frameborder="0" style="border:3px;" allowfullscreen="" aria-hidden="false" tabindex="0">
				</iframe>
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
	
	<!-- Load Facebook SDK for JavaScript -->
	<div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  xfbml            : true,
		  version          : 'v8.0'
		});
	  };

	  (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Your Chat Plugin code -->
	<div class="fb-customerchat"
	  attribution=setup_tool
	  page_id="105346271325851"
theme_color="#e68585"
logged_in_greeting="Chào bạn !! Đây là một phiên test."
logged_out_greeting="Chào bạn !! Đây là một phiên test.">
	</div>
	
  
    <script src="/shop/public/frontend/js/jquery.js"></script>
	<script src="/shop/public/frontend/js/bootstrap.min.js"></script>
	<script src="/shop/public/frontend/js/jquery.scrollUp.min.js"></script>
	<script src="/shop/public/frontend/js/price-range.js"></script>
    <script src="/shop/public/frontend/js/jquery.prettyPhoto.js"></script>
    <script src="/shop/public/frontend/js/main.js"></script>
</body>
</html>