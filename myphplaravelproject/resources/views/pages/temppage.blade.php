<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form"%>
<%@ taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ include file="header.jsp"%>
<!-- Start slider images -->
<div class="container margin-bottom-20-px">
	<div id="jssor_1"
		style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden; visibility: hidden;">
		<!-- Loading Screen -->
		<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
			<div
				style="filter: alpha(opacity = 70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
			<div
				style="position: absolute; display: block; background: url('images/slider/loading.gif') no-repeat center center; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
		</div>
		<div data-u="slides"
			style="cursor: default; position: relative; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden;">

			<c:if test="${ not empty category }">
				<c:forEach items="${category.products}" var="product">
					<c:if test="${ not empty product }">
						<c:forEach items="${product.images}" var="image">
							<div style="display: none;">
								<img data-u="image"
									src="${image.directory }/${image.imageName }"
									onError="this.onerror=null;this.src='images/share/noname.jpg';" />
							</div>
						</c:forEach>
					</c:if>
				</c:forEach>
			</c:if>
		</div>
		<!-- Bullet Navigator -->
		<div data-u="navigator" class="jssorb03"
			style="bottom: 10px; right: 10px;">
			<!-- bullet navigator item prototype -->
			<div data-u="prototype" style="width: 21px; height: 21px;">
				<div data-u="numbertemplate"></div>
			</div>
		</div>
		<!-- Arrow Navigator -->
		<span data-u="arrowleft" class="jssora03l"
			style="top: 0px; left: 8px; width: 55px; height: 55px;"
			data-autocenter="2"></span> <span data-u="arrowright"
			class="jssora03r"
			style="top: 0px; right: 8px; width: 55px; height: 55px;"
			data-autocenter="2"></span> <a href="http://www.jssor.com"
			style="display: none">Slideshow Maker</a>
	</div>
</div>
<!-- End slider images -->

<div class="container">
	<div class="panel panel-color-secondary-1-4">
		<!-- <div class="panel-heading">
				<h3 class="panel-title">header</h3>
			</div> -->
		<div class="panel-body">
			<div class="col-md-offset-3 col-md-6">
				<div class="panel panel-color-secondary-1-0">

					<!-- TODO HERE -->

				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<%@ include file="footer.jsp"%>
<%@ include file="rightpane.jsp"%>
<%@ include file="javascript.jsp"%>
<%@ include file="imagesslider.jsp"%>

<script type="text/javascript">
	function imgError(image) {
		image.onerror = "";
		image.src = "images/share/noname.jpg";
		return true;
	}
</script>