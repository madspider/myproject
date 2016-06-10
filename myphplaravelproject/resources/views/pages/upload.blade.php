<meta name="_token" content="{{ csrf_token() }}">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"
	type="text/
	javascript"></script>

@extends('templates.master') @section('breadcrumb')
<!-- breadcrumb Start -->
<div class="container">
	<ol class="breadcrumb">
		<li><a href="/">Home</a></li>
		<li><a href="/category">Loại</a></li>
		<li><a href="/productlist">Sản Phẩm</a></li>
		<li class="active">Upload</li>
	</ol>
</div>
@stop @section('footer') {!! Html::script('dist/js/dropzone.js') !!} {!!
Html::script('assets/js/dropzone-config.js'); !!}@stop
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
						<select class="form-control validate[required]" id="category_id"
							name="category_id" onchange="javascript:getproducts();"> @foreach ($categories as $category)
							<option value="{{$category->category_id}}">{{$category->category_name}}</option>
							@endforeach
						</select>
					</div>

					<label for="productName" class="col-md-2 control-label">Sản phẩm</label>
					<!-- <div class="col-md-2">
						<input type="text"
							class="form-control validate[required,maxSize[32]]"
							id="productName" />
					</div> -->
					<div class="col-md-2">
						<select class="form-control validate[required]" id="product_id"
							name="product_id"> @foreach ($products as $product)
							<option value="{{$product->product_id}}">{{$product->product_name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<input type="hidden" id="files" /> <input type="hidden" id="lstName" />
		</div>
	</div>
</div>
@stop @include('templates.javascript')
