@extends('templates.master') @section('content')
<div class="container">
	<div class="panel panel-color-complement-4">
		<div class="panel-heading">
			<h3 class="panel-title">Trang Quản Lý Người Dùng</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-offset-9 col-md-3 text-right">
				<a href="" class="btn btn-primary mdi-social-person-add" title="Add"></a>
			</div>
			<table class="table table-striped table-bordered table-hover">
				<tbody>
					<tr>
						<th>No.</th>
						<th>LoginID</th>
						<th></th>
						<th>Name</th>
						<th>Job</th>
						<th>Email</th>
						<th>Last Visited</th>
						<th>Action</th>
					</tr>
					@foreach ($mstusers as $user)
					<tr>
						<td>1</td>
						<td>A3238Xkh <span class="label label-warning">Admin</span></td>
						<td class="text-center"><img src="images/share/noname.jpg"
							class="img-circle" width="40" id="prev_img"></td>
						<td>{{$user->user_id}}</td>
						<td></td>
						<td>xxxx@gmail.com</td>
						<td>2015/04/21 11:25:42</td>
						<td><a href="#"
							class="btn btn-material-cyan-600 btn-fab btn-fab-mini mdi-editor-border-color"
							title="Edit"></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
