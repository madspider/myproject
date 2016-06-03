<meta name="csrf-token" content="{{ csrf_token() }}">
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
	
@extends('templates.master') @section('breadcrumb')
<!-- breadcrumb Start -->
<div class="container">
	<ol class="breadcrumb">
		<li><a href="/index.html">Home</a></li>
		<li><a href="/template-categories/all">Categories</a></li>
		<li class="active">Upload</li>
	</ol>
</div>
@stop @section('footer') 
{!! Html::script('dist/js/dropzone.js') !!}
{!! Html::script('assets/js/dropzone-config.js'); !!} @stop
@section('content')

<div class="container">
	<div class="panel panel-color-secondary-1-4">
		<div class="panel-body">

			<form method="post" enctype="multipart/form-data" class="dropzone"
				name="dropzoneForm" id="dropzoneForm">
				<div class="fallback">
					<input name="file" type="file" multiple />
				</div>
			</form>

			<div class="form-horizontal">
				<div class="form-group">
					<div class="col-md-2 ">
						<a href="javascript:doUploadFiles();"
							class="btn btn-material-blue btn-fab btn-fab-mini outline mdi-action-system-update-tv"
							title="Bắt đầu Upload"></a>
					</div>
					<label for="categoryId" class="col-md-2 control-label">Loại</label>
					<div class="col-md-2">
						<select class="form-control validate[required]" id="categoryId">
							<!-- <c:forEach items="${categories}" var="category">
								<option value="${category.categoryId }"
									${categoryId != null and categoryId == category.categoryId ? 'selected="selected"' : '' }>${category.categoryName }
								<option>
							</c:forEach> -->
						</select>
					</div>

					<label for="productName" class="col-md-2 control-label">Sản phẩm</label>
					<!-- <div class="col-md-2">
						<input type="text"
							class="form-control validate[required,maxSize[32]]"
							id="productName" />
					</div> -->
					<div class="col-md-2">
						<select class="form-control validate[required]" id="productId">
							<!-- <c:forEach items="${products}" var="product">
								<option value="${product.productId }"
									${productId != null and productId == product.productId  ? 'selected="selected"' : '' }>${product.productName }
								<option>
							</c:forEach> -->
						</select>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<input type="hidden" id="files" /> <input type="hidden" id="lstName" />
		</div>
	</div>
</div>
@stop

<script type="text/javascript">
var url = "<?php echo url('/temporaryupload'); ?>";

function sendFileToServer(){
	var uploadURL ="<?php echo url('/temporaryupload'); ?>";
	$.ajax({
		url: uploadURL,
		type: "POST",
		contentType:false,
		processData: false,
		cache: false,
		data: null,
		success: function(data){
			$('body').append(data);
		}
	});
}

$.ajaxSetup({
	headers : {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});
</script>
