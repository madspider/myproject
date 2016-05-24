<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form"%>
<%@ taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>

<div class="modal fade" id="userEditModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
			</div>
			<div class="modal-body">
				<form:form commandName="mstUser" method="post">
					<fieldset class="form-horizontal" role="form">
						<div class="form-group">
							<label for="userId" class="col-lg-2 control-label">User
								ID</label>
							<div class="col-lg-3 ">
								<form:input type="text" class="form-control" disabled="true"
									path="userId" />
								<form:input type="hidden" class="form-control" path="userId" />
							</div>
							<label for="loginId" class="col-lg-2 control-label">Login
								ID</label>
							<div class="col-lg-3 ">
								<form:input type="text"
									class="form-control validate[required,maxSize[32]]"
									path="loginId" />
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-3 ">
								<form:input type="password"
									class="form-control validate[required,maxSize[20]]"
									path="password" />
							</div>
							<label for="lastName" class="col-lg-2 control-label">Last
								Name</label>
							<div class="col-lg-3 ">
								<form:input type="text"
									class="form-control validate[maxSize[32]]" path="lastName" />
							</div>
						</div>
						<div class="form-group">
							<label for="firstName" class="col-lg-2 control-label">First
								Name</label>
							<div class="col-lg-3 ">
								<form:input type="text"
									class="form-control validate[maxSize[32]]" path="firstName" />
							</div>
							<label for="email" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-3 ">
								<form:input type="email"
									class="form-control validate[custom[email],maxSize[128]]"
									path="email" />
							</div>
						</div>
					</fieldset>
				</form:form>
			</div>
			<div class="modal-footer">
				<a class="btn btn-warning"
					href="javascript:closeModalDialogConfirm($(userEditModal))">Close</a>
				<a class="btn btn-info"
					href="javascript:clearModalContentNotDisabled($(mstUser));">Clear</a>
				<a href="javascript:confirmDelete();" class="btn btn-danger"
					title="save">Delete</a> <a href="javascript:confirmSave();"
					class="btn btn-primary" title="save">Save</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function confirmSave() {
		if (!$("#mstUser").validationEngine('validate')) {
			return;
		}

		$.confirm({
			title : 'Xác Nhận!',
			content : 'Mày có chắc muốn lưu không ?',
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
			content : 'Mày có chắc chắn muốn xóa không ?',
			animation : 'rotate',
			closeAnimation : 'rotateXR',
			confirm : function() {
				del();
			},
		});
	}
	//select data
	function del() {
		$
				.ajax({
					url : "delete?id=" + $("#mstUser #userId").val(),
					type : "get",
					async : false,
					dataType : "json"
				})
				.done(
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
				})
	}
	function successDeleteFunction(result) {

		$.confirm({
			title : 'Đã xóa thành công!',
			columnClass : 'col-md-12',
			keyboardEnabled : true,
			confirmButton : false,
			content : function() {
				var $table = $("#tbluserlist").clone();
				$table.find("tbody tr")
						.each(
								function() {
									if ($(this).find("td.userId").html() != $(
											"#userId").val()) {
										$(this).remove();
									}
								});

				return this.setContent($table);
			},
			/*cancel : function() {
				$.alert('Mày có chắc chắn muốn đóng không!');
			} 
			 autoClose : 'cancel|6000', */
		});
		selectDataForPage();
		closeModalDialog($("#userEditModal"));
	}

	//select data
	function save() {
		$
				.ajax({
					url : "save",
					type : "post",
					data : $("#mstUser").serialize(),
					async : false,
					dataType : "json"
				})
				.done(
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
							if (result == "insert failed"
									|| result == "update failed") {
								failSaveFunction(result);
								return;
							}
							successSaveFunction(result);
						}).fail(function() {
				})
	}

	function failSaveFunction(result) {
		selectDataForPage();
		$.alert(result);

	}

	function successSaveFunction(result) {
		selectDataForPage();

		$.confirm({
			keyboardEnabled : true,
			confirmButton : false,
			content : 'Lưu Dữ Liệu Thành Công !',
			autoClose : 'cancel|6000',
		});

		closeModalDialog($("#userEditModal"));
		//mode update
		if ($("#mstUser #userId").val()) {
			$('#tbluserlist tbody tr').each(function() {
				if ($(this).find("td:nth-child(2)").text() == $("#mstUser #userId").val()) {
					$(this).addClass("highlighted-green");
				}
			});
		} else {
			//mode insert
			paginateAjax($("#totalPages").val());
			$('#tbluserlist tbody tr').last().addClass("highlighted-green");
		}
	}

	function closeModalDialogConfirm($formId) {

		$.confirm({
			title : 'Xác Nhận!',
			content : 'Nếu tắt thì dữ liệu mày thay đổi sẽ không được lưu?',
			confirm : function() {
				$formId.modal('hide');
			},
			animation : 'rotate',
			closeAnimation : 'rotateXR',
		/* cancel : function() {
			$.alert('Mày có chắc chắn muốn đóng không!');
		} */
		});
	}
</script>
