



<!DOCTYPE html>
<html class=''>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">

<title>Login</title>
<link href="dist/css/material-wfont.min.css" rel="stylesheet">
<link href="dist/css/screen/login.css" rel="stylesheet">
<link href="images/share/favicon.ico" rel="shortcut icon"
	type="image/x-icon" />
</head>
<body>
	<form id="loginData" action="login" method="post">
		<div style="text-align: center;">
			<h5></h5>
		</div>
		<div class="group">
			<div style="text-align: center;">
				<a href="#" target="_blank"><img src="images/share/logo.png"></a>
			</div>
		</div>
		<div class="group has-error">
			<input id="inputUserName" name="userName" type="text" value="" maxlength="16" autocomplete="off"/>
			<span class="highlight"></span> <span class="bar"></span>
			
			<label>Name</label>
		</div>
		<div class="group has-error">
			<input type="password" style="display:none">
			<input id="inputPassword" name="password" type="password" value="" maxlength="16" autocomplete="off"/>
			<span class="highlight"></span> <span class="bar"></span>
			
			<label>Password</label>
		</div>
		<button type="submit" class="button buttonBlue">
			login
			<div class="ripples buttonRipples">
				<span class="ripplesCircle"></span>
			</div>
		</button>
		<input type="hidden" value="1" />
	</form>
	<footer>
		&copy; DIEPNV Inc. All Rights Reserved.</a>
	</footer>


	<script src='dist/js/jquery-1.11.2.min.js'></script>
	<script>
		$(window, document, undefined).ready(
			function() {
				
				//initialize check (in case of refreshing...)
				$('input').each(function(){
					var $this = $(this);
					if ($this.val())
						$this.addClass('used');
					else
						$this.removeClass('used');
				});
				
				$('input').blur(function() {
					var $this = $(this);
					if ($this.val())
						$this.addClass('used');
					else
						$this.removeClass('used');
				});
				
				var $ripples = $('.ripples');

				$ripples.on('click.Ripples', function(e) {

					var $this = $(this);
					var $offset = $this.parent().offset();
					var $circle = $this.find('.ripplesCircle');

					var x = e.pageX - $offset.left;
					var y = e.pageY - $offset.top;

					$circle.css({
						top : y + 'px',
						left : x + 'px'
					});

					$this.addClass('is-active');
				});

				$ripples
						.on(
								'animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd',
								function(e) {
									$(this)
											.removeClass(
													'is-active');
								});

			});
	</script>