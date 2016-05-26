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
				<c:if test="${ not empty product }">

					<div class="form-group">
						<form:form commandName="product" method="post">
							<fieldset class="form-horizontal page-header" role="form">
								<div class="col-md-6">
									<div class="form-group">
										<label for="productId" class="col-lg-4 control-label">Mã
											Sản Phẩm</label>
										<div class="col-xs-6 col-md-6">
											<form:input type="text" class="form-control" disabled="true"
												path="productId" />
										</div>
									</div>
									<div class="form-group">
										<label for="productName" class="col-lg-4 control-label">Tên
											SP</label>
										<div class="col-xs-6 col-md-6">
											<form:input type="text" class="form-control"
												path="productName" />
										</div>
									</div>

									<div class="form-group">
										<label for="description" class="col-lg-4 control-label">Mô
											Tả</label>
										<div class="col-xs-6 col-md-6">
											<%-- <form:input type="text" class="form-control" disabled="true"
											path="description" /> --%>
											<form:textarea class="form-control" rows="4" cols="20"
												path="description" />
										</div>
									</div>
									<div class="form-group">
										<label for="currentPrice" class="col-lg-4 control-label">Giá
											bán thực tế</label>
										<div class="col-xs-6 col-md-6">
											<form:input type="text" class="form-control"
												path="currentPrice" />
										</div>
										₫
									</div>

									<div class="form-group">
										<label for="oldPrice" class="col-lg-4 control-label">Giá
											Cũ(nếu có)</label>
										<div class="col-xs-6 col-md-6">
											<form:input type="text" class="form-control" path="oldPrice" />
										</div>
										₫
									</div>

									<div class="form-group">
										<label for="amount" class="col-lg-4 control-label">Số
											lượng SP</label>
										<div class="col-xs-6 col-md-6">
											<form:input type="text" class="form-control" path="amount" />
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<c:forEach items="${product.images}" var="image" end="0">
										<div class="col-xs-10 col-md-10">
											<div class="thumbnail mainimage">
												<img data-src="holder.js/100%x200" alt="100%x200"
													src="${image.directory }/${image.imageName }"
													data-holder-rendered="true">
											</div>
										</div>
									</c:forEach>
								</div>
							</fieldset>
							<div class="panel-heading">
								<h3 class="panel-title">Hình Ảnh Khác</h3>
							</div>
							<!-- image -->
							<fieldset>
								<c:forEach items="${product.images}" var="image">
									<div class="col-xs-6 col-md-3">
										<div class="thumbnail">
											<img data-src="holder.js/100%x200" alt="100%x200"
												src="${image.directory }/${image.imageName }"
												data-holder-rendered="true">
										</div>
									</div>
								</c:forEach>
							</fieldset>
						</form:form>
					</div>


				</c:if>
			</div>
		</div>
	</div>
</div>

<%@ include file="footer.jsp"%>
<%@ include file="rightpane.jsp"%>
<%@ include file="javascript.jsp"%>
<!-- Modal zone -->
<script type="text/javascript">
	
</script>
