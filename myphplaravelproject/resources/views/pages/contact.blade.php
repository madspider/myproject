@extends('templates.master') @section('content')
<div class="container">
	<div class="panel panel-color-complement-4">
		<div class="panel-heading">
			<h3 class="panel-title">Bản Đồ</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-12 ">
				<div class="content_col_detail">
					<p>
						<iframe width="100%" height="400" frameborder="0" scrolling="no"
							marginheight="0" marginwidth="0" src=""></iframe>
						<br> <br> <br> <br>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@stop @include('templates.javascript')
