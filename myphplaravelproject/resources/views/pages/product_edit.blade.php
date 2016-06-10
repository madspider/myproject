<div class="template_image col-xs-6 col-md-3 image_product_detail">
	<div class="col-md-2 checkbox checkbox-primary">
		<label> <input type="checkbox" value="" id="0" onchange=""
			class="onechecked" name="image_avatar" id="image_avatar"><span
			class="ripple"></span>
		</label>
	</div>

	<div class="thumbnail">
		<img data-src="holder.js/100%x200" alt="100%x200" src=""
			data-holder-rendered="true">
	</div>

	<input type="hidden" id="hdn_image_id">
</div>

<div class="fade bs-example-modal-lg modal fade" id="productEditModal"
	tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Chi Tiết Sản Phẩm</h4>
			</div>
			<div class="modal-body">
				{{ Form::open(array('url' => 'save' ,'name' => 'frmProductDetail',
				'id'=>'frmProductDetail')) }}
				<fieldset class="form-horizontal page-header" role="form">
					<div class="col-md-6">
						<div class="form-group">
							<label for="product_id" class="col-lg-4 control-label">Mã Sản
								Phẩm</label>
							<div class="col-xs-6 col-md-6 ">
								<input type="text" class="form-control" disabled="true"
									name="product_id" id="product_id" /> <input type="hidden"
									class="form-control" name="product_id" id="product_id" /> <input
									type="hidden" class="form-control" name="image_id"
									id="image_id" />
							</div>
						</div>

						<div class="form-group">
							<label for="productName" class="col-lg-4 control-label">Tên Sản
								Phẩm</label>
							<div class="col-xs-6 col-md-6 ">
								<input type="text"
									class="form-control validate[required,maxSize[128]]"
									name="product_name" id="product_name" />
							</div>
						</div>

						<div class="form-group">
							<label for="description" class="col-lg-4 control-label">Loại SP</label>
							<div class="col-xs-6 col-md-6  ">
								<select id="category_id" class="form-control" name="category_id">
									@foreach ($categories as $category)
									<option value="{{$category->category_id}}">{{$category->category_name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="description" class="col-lg-4 control-label">Mô Tả</label>
							<div class="col-xs-6 col-md-6  ">
								<input type="text" class="form-control validate[maxSize[256]]"
									name="description" id="description" />
							</div>
						</div>

						<div class="form-group">
							<label for="current_price" class="col-lg-4 control-label">Giá Sản
								Phẩm</label>
							<div class="col-xs-6 col-md-6  ">
								<input type="text" class="form-control validate[maxSize[10]]"
									name="current_price" id="current_price" />
							</div>
							₫
						</div>
						<div class="form-group">
							<label for="old_price" class="col-lg-4 control-label">Giá Cũ</label>
							<div class="col-xs-6 col-md-6  ">
								<input type="text" class="form-control validate[maxSize[10]]"
									name="old_price" id="old_price" />
							</div>
							₫
						</div>
						<div class="form-group">
							<label for="amount" class="col-lg-4 control-label">Số lượng</label>
							<div class="col-xs-6 col-md-6  ">
								<input type="text" class="form-control validate[maxSize[10]]"
									name="amount" id="amount" />
							</div>
						</div>
					</div>
					<div class="col-md-5 avatar_image_product">
						<div class="thumbnail">
							<img data-src="holder.js/100%x200" alt="100%x200" src=""
								data-holder-rendered="true" class="height_230_px">
						</div>
					</div>
				</fieldset>
				<fieldset class="image_product"></fieldset>

				{{ Form::close() }}
			</div>
			<div class="modal-footer">
				<a class="btn btn-warning"
					href="javascript:closeModalDialogConfirm($(productEditModal))">Close</a>
				<a class="btn btn-info"
					href="javascript:clearModalContentNotDisabled($(frmProductDetail));">Clear</a>
				<a href="javascript:confirmDelete();" class="btn btn-danger"
					title="save">Delete</a> <a href="javascript:confirmSave();"
					class="btn btn-primary" title="save">Save</a>
			</div>
		</div>
	</div>
</div>
