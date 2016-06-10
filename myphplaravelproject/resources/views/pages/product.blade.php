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
@stop @section('content')

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Sản Phẩm</h3>
		</div>
		<div class="panel-body">

			@foreach ($categories as $category)
			<div class="separate_categories">
				<span class="glyphicons glyphicons-glass"></span>
				<h3 class="">{{$category->category_name}}</h3>
			</div>
			<div class="row">
				<div class="form-group">
					<form name="product" name="id" method="post">
						<!-- image -->
						<fieldset>@include('pages.product_content',array('category' =>
							$category ))</fieldset>
					</form>
				</div>

			</div>
			@endforeach
		</div>
	</div>
</div>
@stop @include('templates.javascript') @section('footer') {!!
Html::script('assets/js/display_product.js'); !!}@stop
