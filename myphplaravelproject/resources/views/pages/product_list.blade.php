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
		<li class="active">Sản Phẩm</li>
	</ol>
</div>
@stop @section('footer') {!! Html::script('dist/js/dropzone.js') !!} {!!
Html::script('assets/js/product.js'); !!}@stop @section('content')
<div class="container">
	<div class="panel panel-color-complement-4">
		<div class="panel-heading">
			<h3 class="panel-title">Trang Quản Lý Sản Phẩm</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-offset-1 col-md-10">
				<div class="panel panel-color-secondary-1-0 divTabPanelBody">
					<div class="panel-heading">
						<h3 class="panel-title">Điều kiện tìm kiếm</h3>
					</div>
					<div class="panel-body"
						style="padding-top: 0px; padding-bottom: 0px;" id="bodyDiv">
						<fieldset>
							<div class="short-form-group display">
								<label for="id" class="col-md-2 control-label ">Loại</label>
								<div class="col-md-4  ">
									<select id="categoryId" class="form-control" name="categoryId"
										onchange="javascript:selectDataForPage(1);">
										<option></option> @foreach ($categories_con as $category_con)
										<option value="{{$category_con->category_id}}">{{$category_con->category_name}}</option>
										@endforeach
									</select>
								</div>
								<label for="name" class="col-md-2 control-label ">Sản Phẩm</label>
								<div class="col-md-4  ">
									<select id="productId" class="form-control" name="productId"
										onchange="javascript:selectDataForPage(1);">
										<option></option> @foreach ($products_con as $product_con)
										<option value="{{$product_con->product_id}}">{{$product_con->product_name}}</option>
										@endforeach
									</select>
								</div>
							</div>


							<!-- <div>
									<div class="col-md-10 col-md-offset-5">
										<button type="submit" class="btn btn-primary"
											style="margin: 0px;" onclick="searchFirstTime();">検索</button>
									</div>
								</div> -->
						</fieldset>
					</div>
				</div>
			</div>

			<div class="col-md-offset-9 col-md-3 text-right">
				<a href="javascript:openProductAddModal();"
					class="btn btn-primary mdi-social-person-add" title="Add"></a>
			</div>
			<div class="float-right col-xs-2 margin-top-10px padding-right-none">
				<label class="margin-top-7px col-xs-2 control-label"
					for="numberOfDisplayRecords">View</label>
				<div class="col-xs-6 padding-none float-right">
					<select id="numberOfDisplayRecords" class="form-control">
						@foreach($views as $view)
						<option value="{{$view}}">{{$view}}</option> @endforeach
					</select>
				</div>
			</div>
			<form name="frmProduct" id="frmProduct" method="post">
				<div class="col-md-12 product">@include('pages.product_table_content')</div>
			</form>
		</div>
	</div>
</div>
@stop @include('pages.product_edit') @include('templates.javascript')
