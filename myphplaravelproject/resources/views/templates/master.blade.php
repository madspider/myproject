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
	<div id="bannerTopContainer">
		<div id="smartTopBanner" style="">
			<a class="banner_header" href="#"
				style="background: url(images/banner/bannerTopImage.jpg) no-repeat center top;"></a>

		</div>
	</div>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Đồ Gỗ Phan Thành</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown"
						title="Our Collection of Templates &amp; Themes">Themes <b
							class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/template-categories/all"><i
									class="fa fa-globe fa-fw"></i> All Templates &amp; Themes</a></li>
							<li><a href="/template-categories/popular"><i
									class="fa fa-star fa-fw"></i> Most Popular</a></li>
							<li><a href="/buy-bootstrap-templates"><i
									class="fa fa-shopping-cart fa-fw"></i> Buy Bootstrap Templates</a>
							</li>
							<li class="divider"></li>
							<li class="dropdown-header">Template &amp; Theme Categories:</li>
							<li><a href="/template-categories/admin-dashboard">Admin and
									Dashboard</a></li>
							<li><a href="/template-categories/full-websites">Full Websites</a>
							</li>
							<li><a href="/template-categories/landing-pages">Landing Pages</a>
							</li>
							<li><a href="/template-categories/one-page">One Page Websites</a>
							</li>
							<li><a href="/template-categories/portfolios">Portfolios</a></li>
							<li><a href="/template-categories/blogs">Blogs</a></li>
							<li><a href="/template-categories/ecommerce">Ecommerce</a></li>
							<li><a href="/template-categories/unstyled">Unstyled Starter
									Templates</a></li>
							<li><a href="/template-categories/navigation-menus">Navigation
									and Navbars</a></li>
						</ul></li>
					<li><a href="http://startbootstrap.tumblr.com/"
						title="The Official Start Bootstrap Blog">Blog</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" title="Bootstrap Related Resources">Resources
							<b class="caret"></b>
					</a>
						<ul class="dropdown-menu">
							<li><a href="/bootstrap-resources"><i class="fa fa-list fa-fw"></i>
									Bootstrap Resources List</a></li>
							<li><a href="/showcase"><i class="fa fa-desktop fa-fw"></i> Start
									Bootstrap Showcase</a></li>
						</ul></li>
					<li><a href="/help"
						title="Help with Start Bootstrap Templates &amp; Themes">Help</a>
					</li>
					<li><a href="/contact" title="Contact the Start Bootstrap Team">Contact</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown"
						title="Premium Bootstrap Themes &amp; Templates"
						aria-expanded="false"><i class="fa fa-star text-yellow"></i>
							Premium <i class="mdi-social-person"></i> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="pages/upload"><i class="fa fa-fw fa-paint-brush"></i>Upload</a></li>
							<li><a href="${pageContext.request.contextPath}/adminuser">User<i
									class="fa fa-fw fa-shopping-cart"></i>User
							</a></li>
						</ul></li>

					<li><a href="#" data-toggle="modal" data-target="#searchModal"><i
							class="fa fa-fw fa-search"></i> <span
							class="hidden-lg hidden-md hidden-sm">Search Themes</span></a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<div id="sb-site" class="margin-top-80-px">
		<!-- breadcrumb Start -->
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="/index.html">Start Bootstrap</a></li>
				<li><a href="/template-categories/all">Templates</a></li>
				<li class="active">SB Admin</li>
			</ol>
		</div>
		@yield('content') @yield('content2')
		<!-- breadcrumb End -->
		<!-- Footer Start -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-6 footer-left">
						<ul class="list-inline">
							<li><a href="/">Home</a></li>
							<li><a href="/all-templates">Themes</a></li>
							<li><a href="http://startbootstrap.tumblr.com/">Blog</a></li>
							<li><a href="/bootstrap-resources">Resources</a></li>
							<li><a href="/help">Help</a></li>
							<li><a href="/contact">Contact</a></li>
						</ul>
						<p>
							<iframe id="gh-fork"
								src="http://ghbtns.com/github-btn.html?user=blackrockdigital&amp;repo=startbootstrap&amp;type=fork"
								allowtransparency="true" frameborder="0" scrolling="0"
								width="55px" height="20px"></iframe>
							<iframe id="gh-star"
								src="http://ghbtns.com/github-btn.html?user=blackrockdigital&amp;repo=startbootstrap&amp;type=watch&amp;count=true"
								allowtransparency="true" frameborder="0" scrolling="0"
								width="110px" height="20px"></iframe>
							<iframe id="twitter-widget-1" scrolling="no" frameborder="0"
								allowtransparency="true"
								class="twitter-follow-button twitter-follow-button-rendered"
								title="Twitter Follow Button"
								src="http://platform.twitter.com/widgets/follow_button.40d5e616f4e685dadc7fb77970f64490.en.html#dnt=false&amp;id=twitter-widget-1&amp;lang=en&amp;screen_name=SBootstrap&amp;show_count=false&amp;show_screen_name=true&amp;size=m&amp;time=1464252422576"
								style="position: static; visibility: visible; width: 130px; height: 20px;"
								data-screen-name="SBootstrap"></iframe>
							<iframe id="twitter-widget-3" scrolling="no" frameborder="0"
								allowtransparency="true"
								class="twitter-share-button twitter-share-button-rendered twitter-tweet-button"
								title="Twitter Tweet Button"
								src="http://platform.twitter.com/widgets/tweet_button.40d5e616f4e685dadc7fb77970f64490.en.html#dnt=false&amp;id=twitter-widget-3&amp;lang=en&amp;original_referer=http%3A%2F%2Fstartbootstrap.com%2Ftemplate-overviews%2Fsb-admin%2F&amp;size=m&amp;text=SB%20Admin%20-%20Free%20Bootstrap%20Admin%20Template%20-%20Start%20Bootstrap&amp;time=1464252422578&amp;type=share&amp;url=http%3A%2F%2Fstartbootstrap.com&amp;via=SBootstrap"
								style="position: static; visibility: visible; width: 60px; height: 20px;"
								data-url="http://startbootstrap.com"></iframe>
							<br>
						
						
						<div id="___follow_0"
							style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 158px; height: 20px; background: transparent;">
							<iframe frameborder="0" hspace="0" marginheight="0"
								marginwidth="0" scrolling="no"
								style="position: static; top: 0px; width: 158px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;"
								tabindex="0" vspace="0" width="100%" id="I0_1464252422376"
								name="I0_1464252422376"
								src="https://apis.google.com/u/0/_/widget/render/follow?usegapi=1&amp;annotation=bubble&amp;height=20&amp;rel=publisher&amp;origin=http%3A%2F%2Fstartbootstrap.com&amp;url=http%3A%2F%2Fplus.google.com%2F116841216196186745329&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.XpSpoSMKz7w.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCMVAk1lDNtfRHyHDJbBxsKbEk6mCA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1464252422376&amp;parent=http%3A%2F%2Fstartbootstrap.com&amp;pfname=&amp;rpctoken=29291092"
								data-gapiattached="true"></iframe>
						</div>
						<div id="___plusone_0"
							style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px; background: transparent;">
							<iframe frameborder="0" hspace="0" marginheight="0"
								marginwidth="0" scrolling="no"
								style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;"
								tabindex="0" vspace="0" width="100%" id="I1_1464252422382"
								name="I1_1464252422382"
								src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=http%3A%2F%2Fstartbootstrap.com&amp;url=http%3A%2F%2Fstartbootstrap.com%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.XpSpoSMKz7w.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCMVAk1lDNtfRHyHDJbBxsKbEk6mCA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I1_1464252422382&amp;parent=http%3A%2F%2Fstartbootstrap.com&amp;pfname=&amp;rpctoken=28427807"
								data-gapiattached="true" title="+1"></iframe>
						</div>
						<br>
						<iframe
							src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FStartBootstrap&amp;width=450&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false"
							scrolling="no" frameborder="0"
							style="border: none; overflow: hidden; width: 150px; height: 21px;"
							allowtransparency="true"></iframe>
						</p>
					</div>
					<div class="col-md-6 footer-right">
						<p>
							<a href="http://www.startbootstrap.com">Start Bootstrap</a> is a
							project maintained by <a href="http://davidmiller.io">David
								Miller</a> at <a href="http://blackrockdigital.io">Blackrock
								Digital</a>.
						</p>
						<p>
							Bootstrap CDN by <a
								href="http://tracking.maxcdn.com/c/99191/3982/378"><img
								src="http://sbootstrap.startbootstrapc.netdna-cdn.com/assets/img/maxcdn-logo.svg"
								style="height: 16px;" alt="MaxCDN Logo"></a>
						</p>
						<p>
							Hosted on <a href="https://pages.github.com/"><img
								src="http://sbootstrap.startbootstrapc.netdna-cdn.com/assets/img/gh-pages-logo.svg"
								style="height: 16px;" alt="GitHub Pages Logo"></a>
						</p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-lg-12 footer-below">
						<p>
							Themes and templates licensed under the <a
								href="https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE">MIT
								License</a>. <br>Based on <a href="http://getbootstrap.com/">Bootstrap</a>.
						</p>
					</div>
				</div>
			</div>
		</footer>
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
	<!--<div class="sb-slidebar sb-right sb-style-overlay bgcolor-complement-2">
		<ul class="nav nav-tabs nav-stacked  bgcolor-complement-0"
			id="stacked-right-menu">
			<li>
				<div class="text-center"
					style="margin-top: 10px; margin-bottom: 10px;">
					<img src="images/share/noname.jpg" class="img-circle" width="50%" />
				</div>
			</li>
			<li><a href="profile_edit.html">Profile</a></li>
			<!-- Admin Only Start 
			<li><a href="#" data-target="#itemR" data-toggle="collapse"
				data-parent="#stacked-menu">Master<b class="caret arrow"></b></a>
				<ul class="nav nav-stacked collapse" id="itemR">
					<li><a href="${pageContext.request.contextPath}/upload">Upload</a></li>
					<li><a href="${pageContext.request.contextPath}/adminuser">User</a></li>
				</ul></li>
			<!-- Admin Only End
			<li class="sb-close"><a>Close</a></li>
		</ul>
	</div> -->
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