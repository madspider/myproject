<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form"%>
<%@ taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ include file="header.jsp"%>


<div class="container">
	<div class="panel panel-color-complement-4">
		<div class="panel-heading">
			<h3 class="panel-title">Sản Phẩm</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<c:if test="${ not empty category }">
					<c:forEach items="${category.products}" var="product">
						<c:if test="${ not empty product }">
							<c:forEach items="${product.images}" var="image">
								<div class="col-xs-6 col-md-3">
									<div class="thumbnail">
										<img data-src="holder.js/100%x200" alt="100%x200"
											src="${image.directory }/${image.imageName }"
											data-holder-rendered="true">
										<div class="caption">
											<h3 class="productDetail">Tủ áo 1m6 - 3 cánh pano</h3>
											<p class="productOldPrice">12.900.000 ₫</p>
											<p class="productCurrentPrice">11.500.000 ₫</p>
											<p class="productCheckOut">
												<a href="#" class="btn btn-primary" role="button">Mua
													Hàng</a>
											</p>
										</div>
									</div>
								</div>
							</c:forEach>
						</c:if>
					</c:forEach>
				</c:if>
			</div>
		</div>
	</div>
</div>
ngovandiep
<%@ include file="footer.jsp"%>
<%@ include file="rightpane.jsp"%>
<%@ include file="javascript.jsp"%>
<!-- Modal zone -->
<script type="text/javascript">
	
</script>
