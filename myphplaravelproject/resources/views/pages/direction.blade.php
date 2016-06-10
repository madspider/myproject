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
							marginheight="0" marginwidth="0"
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.8230038651454!2d106.79238921532573!3d10.901052359860483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d8c280a16821%3A0x7df3f51a7372fec2!2zNTUwLzMvMzAgUXXhu5FjIGzhu5kgMUssIELDrG5oIFRo4bqvbmcsIERpIEFuLCBCw6xuaCBExrDGoW5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1465557005386"></iframe>
						<br> <br> <br> <br>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@stop @include('templates.javascript')
