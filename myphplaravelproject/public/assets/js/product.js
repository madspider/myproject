$.ajaxSetup({
	headers : {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});

$(document, window, undefined).ready(

		function() {

			// initialize
			var $page = window.location.hash.substring(1);
			selectDataForPage($page);
			// Select the first page if number of display records was changed
			/*
			 * $("#numberOfDisplayRecords").change(function() { paginateAjax(1);
			 * });
			 */

			// trigger double click event on each rows
			$('#frmProduct').on(
					'dblclick',
					'#tblproductlist>tbody>tr',
					function() {
						$(this).removeClass("highlighted").removeClass(
								"highlighted-green");
						$(this).closest("tr").siblings().removeClass(
								"highlighted");
						$(this).closest("tr").siblings().removeClass(
								"highlighted-green");
						$(this).addClass("highlighted");
						openProductEditModal($(this).closest("tr"));
					});
			/*
			 * setupSoter();
			 * 
			 * $("body").tooltip({ selector : "[data-toggle='tooltip']",
			 * container : "body", placement : "right" });
			 */

			$(document).on('click', '.pagination a', function(e) {
				selectDataForPage($(this).attr('href').split('page=')[1]);
				e.preventDefault();
			});

			$("#numberOfDisplayRecords").change(function() {
				selectDataForPage(1);
			});

			$("div").on(
					'click',
					'div.image_product_detail',
					function() {
						// in the handler, 'this' refers to the box clicked on
						var $box = $(this).find('input:checkbox.onechecked');
						var $img = $box.closest('div').next().find('img').attr(
								'src');
						var $imgid = $(this).find(
								"input:hidden[id='hdn_image_id']").val();
						var $targetavatar = $('div#productEditModal').find(
								'div.avatar_image_product img').attr('src',
								$img);

						$('div#productEditModal').find(
								"input:hidden[id='image_id']").val($imgid);

						$box.prop("checked", true);

						if ($box.is(":checked")) {
							// the name of the box is retrieved using the
							// .attr() method
							// as it is assumed and expected to be immutable
							var group = "input:checkbox[name='"
									+ $box.attr("name") + "']";
							// the checked state of the group/box on the other
							// hand will change
							// and the current value is retrieved using .prop()
							// method
							$(group).prop("checked", false);
							$box.prop("checked", true);
						} else {
							$box.prop("checked", false);
						}
					});

		});

// select data from server side by ajax
function selectDataForPage($page) {
	$.ajax(
			{
				url : "selectdataforpage?page=" + $page + "&num="
						+ $("#numberOfDisplayRecords").val() + "&caid="
						+ $("select#categoryId option:selected").val(),
				dataType : "json",
			}).done(function(data) {
		$('#frmProduct div.product').html(data);
		location.hash = $page;
	}).fail(function() {
		$.ajax('Posts could not be loaded.');

	}).error(function(jqXHR, textStatus, errorThrown) {
		// $('body').append(jqXHR.responseText);
	});
}

// Open modal popup in mode new
function openProductAddModal() {
	clearModalContent($('#productEditModal'));
	showModalDialog($('#productEditModal'));
}

// Open mode edit user properties
function openProductEditModal($tr) {

	var $productId = $tr.find(".product_id").text();
	clearModalContent($('#productEditModal'));
	// setDataForModal($('#productEditModal'), $tr);
	showModalDialog($('#productEditModal'));
	getdetailproduct($productId);
}

// select data
function getdetailproduct($id) {
	$.ajax({
		url : "getimageproduct?id=" + $id,
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
	}).complete(function(data) {
		var $products = JSON.parse(data.responseText);
		setdataformodalproductdetail($products);
		drawimageproduct($products);
		// successDeleteFunction(data);
	});
}

function setdataformodalproductdetail($products) {
	var $target = $('div#productEditModal');
	if ($products.length > 0) {
		var $product = $products[0];
		$target.find("input[name='product_id']").val($product.product_id);
		$target.find("input[name='product_name']").val($product.product_name);
		$target.find("input[name='description']").val($product.description);
		$target.find("input[name='current_price']").val($product.current_price);
		$target.find("input[name='old_price']").val($product.old_price);
		$target.find("input[name='amount']").val($product.amount);
		$target.find("input[name='image_id']").val($product.image_id);

		// categories
		var $option = null;
		var $categories = $products[0].categories;
		var $targetcategories = $target.find("select[name='category_id']");
		$targetcategories.empty();
		for (var i = 0; i < $categories.length; i++) {
			$option = $("<option></option>").attr("value",
					$categories[i].category_id).text(
					$categories[i].category_name);
			if ($product.category_id == $categories[i].category_id) {
				$option.attr('selected', 'selected');
			}
			$targetcategories.append($option);
		}
	}
}

function drawimageproduct($product) {

	var $targetavatar = $('div#productEditModal').find(
			'div.avatar_image_product');
	var $target = $('fieldset.image_product');
	var $templateimage = $('.template_image');
	var $imagediv = null;
	if ($product.length > 0) {
		var $images = $product[0].images;
		$target.empty();
		if ($images.length > 0) {
			for (var i = 0; i < $images.length; i++) {
				$imagediv = $templateimage.clone();
				$imagediv.removeClass('template_image');
				$imagediv.find('img').attr('src',
						$images[i].directory + '/' + $images[i].image_name);
				$imagediv.find('input#hdn_image_id').val($images[i].image_id);

				if ($product[0].image_id) {
					if ($product[0].image_id == $images[i].image_id) {
						$imagediv.find("input:checkbox[name='image_avatar']")
								.prop("checked", true);
						$targetavatar.find('img').attr(
								'src',
								$images[i].directory + '/'
										+ $images[i].image_name);
						$targetavatar.find('img').tooltip(
								{
									content : "<img src='"
											+ $images[i].directory + '/'
											+ $images[i].image_name + "' />"
								});
					}
				} else {
					$targetavatar.find('img').attr('src', DIR_DEFAULT);
					$targetavatar.find('img').tooltip({
						content : "<img src='" + DIR_DEFAULT + "' />"
					});

				}
				$target.append($imagediv);
			}
		} else {
			var $href = "upload?cid=" + $product[0].category_id + "&pid="
					+ $product[0].product_id;
			var $a = $('<a></a>')
					.attr('href', $href)
					.text(
							"<a>Sản Phẩm Này Chưa Có Hình Nào. Nhấn vào đây để thêm hình ảnh</a>");
			$target.append($a);
		}

	}

}

function confirmSave() {
	if (!$("#frmProductDetail").validationEngine('validate')) {
		return;
	}

	$.confirm({
		title : 'Xác Nhận!',
		content : 'Bạn có chắc muốn lưu không ?',
		animation : 'rotate',
		closeAnimation : 'rotateXR',
		confirm : function() {
			save();
		},
	});
}

function confirmDelete() {
	$.confirm({
		title : 'Xác Nhận!',
		content : 'Bạn có chắc chắn muốn xóa sản phẩm này ?',
		animation : 'rotate',
		closeAnimation : 'rotateXR',
		confirm : function() {
			del();
		},
	});
}

// select data
function del() {
	$.ajax({
		url : "delete?id=" + $("#frmProductDetail #product_id").val(),
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
				if (result == "delete failed") {
					$.ajax(result);
					return;
				}
				successDeleteFunction(result);
			}).fail(function() {
	}).complete(function(data) {
		successDeleteFunction(data);
	});
}
function successDeleteFunction(result) {

	$.confirm({
		title : 'Đã xóa thành công!',
		keyboardEnabled : true,
		confirmButton : false,
		content : "Xóa Thành Công Sản Phẩm",
		autoClose : 'cancel|6000',
	});
	var $page = window.location.hash.substring(1);
	selectDataForPage($page);
	closeModalDialog($("#productEditModal"));
}

// select data
function save() {

	$("#frmProductDetail>input[name='_token']").val(
			$('meta[name="_token"]').attr('content'));

	$.ajax({
		url : "save",
		type : "post",
		data : $("#frmProductDetail").serialize(),
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
				failSaveFunction(result);
				return;
			}

			successSaveFunction(result);
		},
		error : function(jqXHR, textStatus, errorThrown) {
			failSaveFunction(errorThrown);
			// $('body').append(jqXHR.responseText);
		},
		done : function(e) {
			console.log("DONE");
		}

	});
}

function failSaveFunction(result) {
	var $page = window.location.hash.substring(1);
	selectDataForPage($page);
	$.alert(result);

}

function successSaveFunction(result) {
	var $page = window.location.hash.substring(1);
	selectDataForPage($page);

	$.confirm({
		keyboardEnabled : true,
		confirmButton : false,
		content : 'Lưu Dữ Liệu Thành Công !',
		autoClose : 'cancel|6000',
	});

	closeModalDialog($("#productEditModal"));
	// mode update
	if ($("#frmProductDetail #product_id").val()) {
		$('#tblproductlist tbody tr').each(
				function() {
					if ($(this).find("td:nth-child(1)").text() == $(
							"#frmProductDetail #product_id").val()) {
						$(this).addClass("highlighted-green");
					}
				});
	} else {
		// mode insert
		$('#tblproductlist tbody tr').last().addClass("highlighted-green");
	}
}

function closeModalDialogConfirm($formId) {

	$.confirm({
		title : 'Xác Nhận!',
		content : 'Nếu tắt thì dữ liệu thay đổi sẽ không được lưu?',
		confirm : function() {
			closeModalDialog($formId);
		},
		animation : 'rotate',
		closeAnimation : 'rotateXR',
	});
}
