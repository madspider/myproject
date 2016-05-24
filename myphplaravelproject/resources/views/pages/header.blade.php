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
<link rel="stylesheet" href="dist/css/validationEngine.jquery.css" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	
	<div class="navbar navbar-default navbar-fixed-top bgcolor-primary-3 sb-slide">
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
	<div id="sb-site" class = "margin-top-80-px">
		<!-- breadcrumb Start -->
		<div class="container">
			<ul class="nav nav-pills margin-bottom-20-px font-size-16-px">
				<!-- Home -->
				<li role="presentation"><a href="${pageContext.request.contextPath}/hello"><i
						class="mdi-action-home"></i>&nbsp Trang Chủ</a></li>

				<!-- Sản phẩn thời trang -->
				<li role="presentation" class="dropdown"><a
					class="dropdown-toggle" data-toggle="dropdown" href="#"
					role="button" aria-haspopup="true" aria-expanded="false"> Thời
						Trang <span class="caret"></span>
				</a>
					<ul class="dropdown-menu">
						<li><a href="#">Áo</a></li>
						<li><a href="#">Quần</a></li>
						<li><a href="#">Giầy</a></li>
						<li><a href="#">Dép</a></li>
						<!-- <li role="separator" class="divider"></li> -->
					</ul></li>

				<!-- Sản phẩn nhà bếp -->
				<li role="presentation" class="dropdown"><a
					class="dropdown-toggle" data-toggle="dropdown" href="#"
					role="button" aria-haspopup="true" aria-expanded="false"> Nhà
						Bếp <span class="caret"></span>
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

		<!-- breadcrumb End -->