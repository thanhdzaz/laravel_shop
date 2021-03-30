
<!DOCTYPE html>
<head>
<title>Trang Quản Trị</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="public/backend/admin/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="public/backend/admin/css/style.css" rel='stylesheet' type='text/css' />
<link href="public/backend/admin/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="public/backend/admin/css/font.css" type="text/css"/>
<link href="public/backend/admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="public/backend/admin/js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng nhập</h2>
		<form action={{URL::to('/admin-dashboard')}} method="post">
			<?php
				$message = Session::get('message');
				if ($message) {
					echo '<p style="color: red; font-size:25;">',$message,'</p>';
					Session::put('message',null);
					$message = null;

				}
			?>
			{{csrf_field()}}
			<input type="username" class="ggg" name="a_email" placeholder="Tài khoản" required="">
			<input type="password" class="ggg" name="a_pass" placeholder="Mật khẩu" required="">
			<span><input type="checkbox" />Lưu</span>
			<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
		</form>

</div>
</div>
<script src="public/backend/admin/js/bootstrap.js"></script>
<script src="public/backend/admin/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="public/backend/admin/js/scripts.js"></script>
<script src="public/backend/admin/js/jquery.slimscroll.js"></script>
<script src="public/backend/admin/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="public/backend/admin/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="public/backend/admin/js/jquery.scrollTo.js"></script>
</body>
</html>
