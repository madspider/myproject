<html class=''>
<head>
<meta charset='UTF-8'>
<meta name="robots" content="noindex">
<title>Categories</title>
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dist/css/jquery-ui.min.css" rel="stylesheet">
<link href="dist/css/ripples.min.css" rel="stylesheet">
<link href="dist/css/material-wfont.min.css" rel="stylesheet">
<link href="dist/css/snackbar.min.css" rel="stylesheet">
<link href="dist/css/slidebars/slidebars.min.css" rel="stylesheet">
<link href="dist/css/base.css" rel="stylesheet">
<link href="dist/css/color-pattern.css" rel="stylesheet">
<link href="dist/css/dropzone.css" rel="stylesheet">
<link href="dist/css/basic.css" rel="stylesheet">
<link href="dist/css/jquery-confirm.css" rel="stylesheet">
<link href="dist/css/jquery-confirm.css" rel="stylesheet">
<link rel="stylesheet" href="dist/css/validationEngine.jquery.css"
	type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	<div
		class="navbar navbar-default navbar-fixed-top bgcolor-primary-3 sb-slide">
		<!-- <div class="navbar-header">
            <p class="navbar-text navbar-left sb-toggle-left">
					<i class="mdi-navigation-menu" style="font-size:18px;"></i>
            </p>
            <a class="navbar-brand" href="javascript:void(0)">Menu</a>
		</div> -->
		<p class="navbar-text navbar-right sb-toggle-right"
			style="padding-right: 30px;">
			Settings <i class="mdi-social-person"></i> <b class="caret"></b>
		</p>
	</div>
	<div id="sb-site" class="margin-top-80-px">
		<!-- breadcrumb Start -->
		<div class="container">
			<ul class="nav nav-pills margin-bottom-20-px font-size-16-px">
				<!-- Home -->
				<li role="presentation"><a
					href="${pageContext.request.contextPath}/hello"><i
						class="mdi-action-home"></i>&nbsp Trang Chủ</a></li>

				<!-- Sản phẩn thời trang -->
				<li role="presentation" class="dropdown"><a class="dropdown-toggle"
					data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
					aria-expanded="false"> Thời Trang <span class="caret"></span>
				</a>
					<ul class="dropdown-menu">
						<li><a href="#">Áo</a></li>
						<li><a href="#">Quần</a></li>
						<li><a href="#">Giầy</a></li>
						<li><a href="#">Dép</a></li>
						<!-- <li role="separator" class="divider"></li> -->
					</ul></li>

				<!-- Sản phẩn nhà bếp -->
				<li role="presentation" class="dropdown"><a class="dropdown-toggle"
					data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
					aria-expanded="false"> Nhà Bếp <span class="caret"></span>
				</a>
					<ul class="dropdown-menu">
						<li><a href="#">Tủ Bếp</a></li>
						<li><a href="#">Thiết Bị Bếp</a></li>
						<li><a href="#">Dụng Cụ Bếp</a></li>
						<li><a href="#">Phụ Kiện Bếp</a></li>
					</ul></li>

				<!-- menu help -->
				<li role="presentation"><a href="#">Liên Hệ</a></li>
			</ul>
		</div>
		@yield('content')
		@yield('content2')
		<!-- breadcrumb End -->
		<!-- Footer Start -->
		<footer> </footer>
		<!-- Footer End -->
	</div>
	<!-- Left Panel Start -->
	<div class="sb-slidebar sb-left sb-style-push bgcolor-secondary-2-0">
		<ul class="nav nav-tabs nav-stacked bgcolor-secondary-2-1"
			id="stacked-menu">
			<li><a href="#" data-target="#item1" data-toggle="collapse"
				data-parent="#stacked-menu">QUẦN ÁO<b class="caret arrow"></b></a>
				<ul class="nav nav-stacked collapse in" id="item1">
					<li><a href="#"> Áo Nam</a></li>
					<li><a href="#"> Áo Nữ</a></li>
					<li><a href="#"> Quần Nam</a></li>
					<li><a href="#"> Quần Nữ</a></li>
				</ul></li>
			<li class="sb-close"><a>Close</a></li>
		</ul>
	</div>
	<!-- Left Panel End -->
	
	<!-- Right Panel Start -->
	<div class="sb-slidebar sb-right sb-style-overlay bgcolor-complement-2">
		<ul class="nav nav-tabs nav-stacked  bgcolor-complement-0"
			id="stacked-right-menu">
			<li>
				<div class="text-center"
					style="margin-top: 10px; margin-bottom: 10px;">
					<img src="images/share/noname.jpg" class="img-circle" width="50%" />
				</div>
			</li>
			<li><a href="profile_edit.html">Profile</a></li>
			<!-- Admin Only Start -->
			<li><a href="#" data-target="#itemR" data-toggle="collapse"
				data-parent="#stacked-menu">Master<b class="caret arrow"></b></a>
				<ul class="nav nav-stacked collapse" id="itemR">
					<li><a href="${pageContext.request.contextPath}/upload">Upload</a></li>
					<li><a href="${pageContext.request.contextPath}/adminuser">User</a></li>
				</ul></li>
			<!-- Admin Only End -->
			<li class="sb-close"><a>Close</a></li>
		</ul>
	</div>
	<!-- Right Panel End -->

	<!-- JS Start -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"
		type="text/
	javascript"></script>
	<script src="dist/js/jquery-1.11.2.min.js"></script>
	<script src="dist/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="dist/js/datepicker-ja.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/js/ripples.min.js"></script>
	<script src="dist/js/material.min.js"></script>
	<script src="dist/js/snackbar.min.js"></script>
	<script src="dist/js/jquery.nouislider.min.js"></script>
	<script src="dist/js/slidebars/slidebars.min.js"></script>
	<script src="dist/js/jssor.slider.min.js" type="text/javascript"></script>
	<script src="dist/js/dropzone.js"></script>
	<script src="dist/js/common.js"></script>
	<script src="dist/js/directory.js"></script>
	<script src="dist/js/jquery-confirm.js"></script>
	<script src="dist/js/jquery.validationEngine-en.js"
		type="text/javascript" charset="utf-8"></script>
	<script src="dist/js/jquery.validationEngine.js" type="text/javascript"
		charset="utf-8"></script>
	<script src="dist/js/jquery.tablesorter.js" type="text/javascript"></script>
	<script src="dist/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script>
	$.material.init();
</script>
	<script>
	(function($) {
		$(document).ready(function() {
			$.slidebars();
		})
	})(jQuery);
</script>
	<script>
	$(function() {
		$.datepicker.setDefaults($.datepicker.regional['ja']);
		$('.datepic').datepicker({
			dateFormat : 'yy-mm-dd'
		});
	});
</script>