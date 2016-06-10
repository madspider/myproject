var filenames = [];
var $dropzone;
$(document).ready(function() {
	$("#dropzoneForm").submit(uploadFilesSubmit);
});

function getproducts() {
	$.ajax({
		url : "getproducts?id=" + $("#category_id option:selected").val(),
		type : "get",
		async : false,
		dataType : "json"
	}).success(
			function(result) {
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
				if (result == "failed") {
					$.ajax(result);
					return;
				}
			}).fail(function() {
	}).complete(
			function(data) {
				var $products = JSON.parse(data.responseText);
				// categories
				var $option = null;
				var $targetproducts = $("select[name='product_id']");
				$targetproducts.empty();
				if ($products != null && $products.length > 0) {
					for (var i = 0; i < $products.length; i++) {
						$option = $("<option></option>").attr("value",
								$products[i].product_id).text(
								$products[i].product_name);
						/*
						 * if ($product.product_id == $products[i].product_id) {
						 * $option.attr('selected', 'selected'); }
						 */
						$targetproducts.append($option);
					}
				} else {
					$.confirm({
						title : 'Warning!',
						keyboardEnabled : true,
						confirmButton : false,
						content : "Chưa có sản phẩm nào cho loại này",
						autoClose : 'cancel|6000',
					});
				}
			});
}

// Save Upload Informations
function doUploadFiles() {
	if (!$("#category_id").validationEngine('validate')) {
		return;
	}
	if (!$("#product_id").validationEngine('validate')) {
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

	if (!$("#category_id").validationEngine('validate')) {
		return;
	}
	if (!$("#product_id").validationEngine('validate')) {
		return;
	}

	var $form = $(this);
	var dataArray = $form.serializeArray();
	var categoryId = $("#category_id option:selected").val();
	var productId = $("#product_id option:selected").val();

	dataArrayPush(dataArray, "category_id", categoryId);
	dataArrayPush(dataArray, "lstName", $("#lstName").val());
	dataArrayPush(dataArray, "product_id", productId);
	var dataString = $.param(dataArray);
	$.ajax({
		url : "upload",
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
			if (result == "failed" || result == "failed") {
				failUploadFunction();
				return;
			}

			$dropzone.removeAllFiles();
			successedUpload(categoryId, productId);
		},
		error : function(jqXHR, textStatus, errorThrown) {
			failUploadFunction(errorThrown);
			$('body').append(jqXHR.responseText);
		},
		done : function(e) {
			console.log("DONE");
		}
	});
}

function successedUpload(categoryId, productId) {
	$("#lstName").val('');
	filenames = [];
	$.confirm({
		title : 'Upload Completed!',
		content : 'Bạn có muốn chuyển tới trang sản phẩm không?',
		confirm : function() {
			var url = makeNewUrl("product") + "?category_id=" + categoryId
					+ "&product_id=" + productId;
			window.location.href = url;
		},
		animation : 'rotate',
		closeAnimation : 'rotateXR',
		cancel : function() {
		}
	});
}

function failUploadFunction(errorThrown) {
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
		$.confirm({
			title : 'Message!',
			keyboardEnabled : true,
			confirmButton : false,
			content : "Failed",
			autoClose : 'cancel|6000',
		});
	})
}

// File Upload response from the server
Dropzone.options.dropzoneForm = {
	headers : {
		'X-CSRF-Token' : $('meta[name="_token"]').attr('content')
	},
	maxFiles : 5,
	maxFilesize : 8,
	parallelUploads : 100,
	acceptedFiles : "image/*",
	url : "temporaryupload",
	dictDefaultMessage : 'Kéo thả hình vào để upload, hoặc click để lựa chọn file upload...!',
	dictFileTooBig : 'Image is bigger than 8MB',
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
									.createElement("<div style=\"text-align: center;\"><input style=\"cursor: pointer;\" type=\"image\" \" src="
											+ initImage
											+ " alt=\"Xóa\" class=\"img-rounded\"></div>");
							// Capture the Dropzone instance as closure.
							var _this = this;
							$dropzone = this;
							// Listen to the click event
							removeButton.addEventListener("click", function(e) {
								// Make sure the button click doesn't submit the
								// form:
								e.preventDefault();
								e.stopPropagation();
								// Remove the file preview.
								_this.removeFile(file);
								// If you want to the delete the file on the
								// server as well,
								// you can do the AJAX request here.
								var index = filenames.indexOf(file.name);
								// remove ajax
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
							removeButton.addEventListener("mouseout", function(
									e) {
								$(this).find("input").attr("src", initImage);
							});

							// Add the button to the file preview element.
							file.previewElement.appendChild(removeButton);

							var index = filenames.indexOf(file.name);
							if (index > -1) {
							} else {
								filenames.push(file.name);
								$("#lstName").val(filenames);
							}
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
									.createElement("<div style=\"text-align: center;\"><input style=\"cursor: pointer;\" type=\"image\" \" src="
											+ initImage
											+ " alt=\"Xóa\" class=\"img-rounded\"></div>");
							// Capture the Dropzone instance as closure.
							var _this = this;

							// Listen to the click event
							removeButton.addEventListener("click", function(e) {
								// Make sure the button click doesn't submit the
								// form:
								e.preventDefault();
								e.stopPropagation();
								// Remove the file preview.
								_this.removeFile(file);
								// If you want to the delete the file on the
								// server as well,
								// you can do the AJAX request here.
							});

							// change image
							removeButton.addEventListener("mouseover",
									function(e) {
										$(this).find("input").attr("src",
												changeImage);
									});
							removeButton.addEventListener("mouseout", function(
									e) {
								$(this).find("input").attr("src", initImage);
							});

							// Add the button to the file preview element.
							file.previewElement.appendChild(removeButton);
						});
	}
};

// save alls
/*
 * Dropzone.autoDiscover = false;
 * 
 * var myDropzone = new Dropzone("#dropzoneForm", { url : makeNewUrl("upload"),
 * autoProcessQueue : false, });
 * 
 * //Save Upload Informations function doUploadFiles() {
 * myDropzone.processQueue(); }
 */
