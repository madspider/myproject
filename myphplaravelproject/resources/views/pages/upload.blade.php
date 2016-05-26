
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
<script src="dist/js/dropzone.js"></script>
<script src="dist/js/common.js"></script>
<script src="dist/js/directory.js"></script>
<script src="dist/js/jquery-confirm.js"></script>
<script src="dist/js/jquery.validationEngine-en.js"
	type="text/javascript" charset="utf-8"></script>
<script src="dist/js/jquery.validationEngine.js" type="text/javascript"
	charset="utf-8"></script>
<script src="dist/js/jquery.tablesorter.js" type="text/javascript"></script>
<script src="dist/js/jquery.tablesorter.min.js" type="text/javascript"></script>

@extends('templates.master') @section('content')
<div class="container">
	<div class="panel panel-color-secondary-1-4">
		<div class="panel-body">
			<form method="post" enctype="multipart/form-data" action="temporaryupload" class="dropzone"
				name="dropzoneForm">
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

</script>
<script type="text/javascript">
	var filenames = [];
	var $dropzone;
	$(document, window, undefined).ready(function() {
		$("#dropzoneForm").submit(uploadFilesSubmit);
	});
	//Save Upload Informations
	function doUploadFiles() {
		if (!$("#categoryId").validationEngine('validate')) {
			return;
		}
		if (!$("#productId").validationEngine('validate')) {
			return;
		}

		if ($("#lstName").val()) {
			$("#dropzoneForm").submit();
		} else {
			$.confirm({
				keyboardEnabled : true,
				confirmButton : false,
				content : 'Hãy chọn file để upload !',
				autoClose : 'cancel|6000',
			});
		}

	}
	function uploadFilesSubmit(event) {
		event.preventDefault();

		if (!$("#categoryId").validationEngine('validate')) {
			return;
		}
		if (!$("#productId").validationEngine('validate')) {
			return;
		}

		var $form = $(this);
		var dataArray = $form.serializeArray();
		var categoryId = $("#categoryId option:selected").val();
		var productId = $("#productId option:selected").val();

		dataArrayPush(dataArray, "categoryId", categoryId);
		dataArrayPush(dataArray, "lstName", $("#lstName").val());
		dataArrayPush(dataArray, "productId", productId);
		var dataString = $.param(dataArray);
		$.ajax({
			url : makeNewUrl("upload"),
			type : "post",
			data : dataString,
			async : false,
			success : function(result, textStatus, jqXHR) {
				if (result == null) {
					return;
				}
				if (result.sessionTimeout) {
					return;
				}
				if (result.message) {
					return;
				}
				if ((result.data == null && result.length == null)
						|| (result.data != null && result.data.length == 0)) {
					return;
				}
				if (result == "failed"
						|| result == "failed") {
					failUploadFunction();
					return;
				}
				
				$dropzone.removeAllFiles();
				
				$.confirm({
					title : 'Upload Completed!',
					content : 'Bạn có muốn chuyển tới trang sản phẩm không?',
					confirm : function() {
						var url = makeNewUrl("product") + "?categoryId="
								+ categoryId + "&productId=" + productId;
						window.location.href = url;
					},
					animation : 'rotate',
					closeAnimation : 'rotateXR',
					cancel : function() {
					}
				});
			},
			error : function(jqXHR, textStatus, errorThrown) {
				failUploadFunction();
			},
			done : function(e) {
				console.log("DONE");
			}
		});
	}

	function failUploadFunction(){
		$.confirm({
			keyboardEnabled : true,
			confirmButton : false,
			content : 'Upload bị lỗi : ' + errorThrown,
			autoClose : 'cancel|6000',
		});
	}
	
	function dataArrayPush(dataArray, name, value) {
		dataArray.push({
			name : name,
			value : value
		});
	}

	function deletefileAjax(filename) {
		$.ajax({
			url : "temporarydelete?filename=" + filename,
			type : "get",
			async : false,
		}).done(function(result) {
		}).fail(function() {
			$.ajax("failed");
		})
	}

	//File Upload response from the server

	Dropzone.options.dropzoneForm = {
		maxFiles : 5,
		maxFilesize: 500,
	    acceptedFiles: "image/*",
		url : makeNewUrl("temporaryupload"),
		dictDefaultMessage : 'Kéo thả hình vào để upload, hoặc click để lựa chọn file upload...!',
		init : function() {
			// maxfilesexceeded
			this.on("maxfilesexceeded", function(data) {
			});
			// drop
			this.on("drop", function(file) {
				var fileNum = file.dataTransfer.files.length;
				if (fileNum <= 0) {
					return;
				}
			});
			// success
			this
					.on(
							'success',
							function(file, resp) {
								// Create the remove button
								var removeButton;
								var initImage;
								var changeImage;
								initImage = DIR_BUTTON_SUCCESS_32X32;
								changeImage = DIR_BUTTON_REMOVE_32X32;
								removeButton = Dropzone
										.createElement("<div style=\"text-align: center;\"><input style=\"cursor: pointer;\" type=\"image\" \" src=" + initImage + " alt=\"Xóa\" class=\"img-rounded\"></div>");
								// Capture the Dropzone instance as closure.
								var _this = this;
								$dropzone = this;
								// Listen to the click event
								removeButton.addEventListener("click",
										function(e) {
											// Make sure the button click doesn't submit the form:
											e.preventDefault();
											e.stopPropagation();
											// Remove the file preview.
											_this.removeFile(file);
											// If you want to the delete the file on the server as well,
											// you can do the AJAX request here.
											var index = filenames
													.indexOf(file.name);
											//remove ajax
											deletefileAjax(file.name);
											if (index > -1) {
												filenames.splice(index, 1);
											}
											$("#lstName").val(filenames);

										});

								// change image
								removeButton.addEventListener("mouseover",
										function(e) {
											$(this).find("input").attr("src",
													changeImage);
										});
								removeButton.addEventListener("mouseout",
										function(e) {
											$(this).find("input").attr("src",
													initImage);
										});

								// Add the button to the file preview element.
								file.previewElement.appendChild(removeButton);

								filenames.push(file.name);
								$("#lstName").val(filenames);
							});

			this
					.on(
							'error',
							function(file, resp) {
								// Create the remove button
								var removeButton;
								var initImage;
								var changeImage;

								initImage = DIR_BUTTON_UNSUCCESS_32X32;
								changeImage = DIR_BUTTON_REMOVE_32X32;
								removeButton = Dropzone
										.createElement("<div style=\"text-align: center;\"><input style=\"cursor: pointer;\" type=\"image\" \" src=" + initImage + " alt=\"Xóa\" class=\"img-rounded\"></div>");
								// Capture the Dropzone instance as closure.
								var _this = this;

								// Listen to the click event
								removeButton.addEventListener("click",
										function(e) {
											// Make sure the button click doesn't submit the form:
											e.preventDefault();
											e.stopPropagation();
											// Remove the file preview.
											_this.removeFile(file);
											// If you want to the delete the file on the server as well,
											// you can do the AJAX request here.
										});

								// change image
								removeButton.addEventListener("mouseover",
										function(e) {
											$(this).find("input").attr("src",
													changeImage);
										});
								removeButton.addEventListener("mouseout",
										function(e) {
											$(this).find("input").attr("src",
													initImage);
										});

								// Add the button to the file preview element.
								file.previewElement.appendChild(removeButton);
							});
		}
	};

	//save alls
	/* Dropzone.autoDiscover = false;

	var myDropzone = new Dropzone("#dropzoneForm", {
		url : makeNewUrl("upload"),
		autoProcessQueue : false,
	});

	//Save Upload Informations
	function doUploadFiles() {
		myDropzone.processQueue();
	}
	 */
</script>
