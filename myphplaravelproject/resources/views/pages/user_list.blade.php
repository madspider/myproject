<%@ page language="java" contentType="text/html; charset=UTF-8"
pageEncoding="UTF-8"%> <%@ taglib prefix="form"
uri="http://www.springframework.org/tags/form"%> <%@ taglib prefix="fmt"
uri="http://java.sun.com/jsp/jstl/fmt"%> <%@ taglib prefix="c"
uri="http://java.sun.com/jsp/jstl/core"%> <%@ include
file="header.jsp"%>


<div class="container">
	<div class="panel panel-color-complement-4">
		<div class="panel-heading">
			<h3 class="panel-title">Trang Quản Lý Người Dùng</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-offset-9 col-md-3 text-right">
				<a href="javascript:openUserAddModal();"
					class="btn btn-primary mdi-social-person-add" title="Add"></a>
			</div>
			<form id="usercondition" method="post">
				<div class="col-md-12">
					<div class="col-md-3">
						<div class="checkbox checkbox-primary">
							<label> <input type="checkbox" name="optionsRadios" id="rdFilter"
								onchange="javascript:filterControl();" value="option1">Filter
							</label>
						</div>
					</div>

					<div
						class="float-right col-xs-2 margin-top-10px padding-right-none">
						<label class="margin-top-7px col-xs-2 control-label"
							for="numberOfDisplayRecords">View</label>
						<div class="col-xs-6 padding-none float-right">
							<!-- <form:select path="numberOfDisplayRecords" class="form-control">
								<c:forTokens items="${usercondition.listNumberOfDisplayPages}"
									delims="," var="page">
									<option value="${page}">${page}</option>
								</c:forTokens>
							</form:select> -->
						</div>
					</div>
				</div>
				<table
					class="tablesorter table table-striped table-bordered table-hover"
					id="tbluserlist">
					<thead>
						<tr>
							<th>No.</th>
							<th>User ID</th>
							<th>LoginID</th>
							<th>Password</th>
							<th>Login Date</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>

				<ul class="pagination">
				</ul>

				<input type="hidden" id="numberOfDisplayPages" /> <input
					type="hidden" id="currentDisplayPage" /> <input type="hidden"
					id="numberOfDisplayRecords" /> <input type="hidden"
					id="startIndxPage" /> <input type="hidden" id="totalPages" />
			</form>

		</div>
	</div>
</div>

<!-- Modal zone -->
<!-- <%@ include file="user_edit.jsp"%> -->
<script type="text/javascript">
	var dataProps = {
		1 : "userId",
		2 : "loginId",
		3 : "password",
		4 : "loginDate",
		5 : "lastName",
		6 : "firstName",
		7 : "email"
	};
	var $table = $("#tbluserlist");
	var $ulPagination = $("ul.pagination");

	$(document, window, undefined).ready(

			function() {

				//initialize
				selectDataForPage();
				//Select the first page if number of display records was changed
				$("#numberOfDisplayRecords").change(function() {
					paginateAjax(1);
				});

				//trigger double click event on each rows 
				$('#tbluserlist tbody').on(
						'dblclick',
						'tr',
						function() {
							$(this).removeClass("highlighted").removeClass(
									"highlighted-green");
							$(this).closest("tr").siblings().removeClass(
									"highlighted");
							$(this).closest("tr").siblings().removeClass(
									"highlighted-green");
							$(this).addClass("highlighted");
							openUserEditModal($(this).closest("tr"));
						});
				setupSoter();

				$("body").tooltip({
					selector : "[data-toggle='tooltip']",
					container : "body",
					placement : "right"
				});

			});

	// Open modal popup in mode new
	function openUserAddModal() {
		clearModalContent($('#userEditModal'));
		showModalDialog($('#userEditModal'));
	}

	// Open mode edit user properties
	function openUserEditModal($tr) {
		clearModalContent($('#userEditModal'));
		setDataForModal($('#userEditModal'), $tr);
		showModalDialog($('#userEditModal'));
	}

	// 
	function paginateAjax(currentDisplayPage) {
		setDataCondition(currentDisplayPage);
		selectDataForPage();
	}

	// set value for td
	function createTableRow(isIndx, indx, data, tbody) {
		var $trUserlist = $("<tr></tr>");
		// set value for each cell in rows
		if (isIndx) {
			$trUserlist.append($("<td></td>").html(indx + 1));
		}
		for ( var obj in dataProps) {
			$trUserlist.append($("<td></td>").attr("class", dataProps[obj])
					.html(data[dataProps[obj]]));
		}

		tbody.append($trUserlist);
	}

	//draw table with data
	function redrawTable(isIndx, data, $table) {
		var $tblBody = $table.find("tbody");
		var indx = (parseInt($("#currentDisplayPage").val()) - 1)
				* parseInt($("#numberOfDisplayRecords").val());
		//create row
		$tblBody.empty();
		for (var i = 0; i < data.length; i++) {
			createTableRow(isIndx, indx + i, data[i], $tblBody);
		}
	}

	//function set data for form
	function setDataCondition(currentDisplayPage) {
		$("#currentDisplayPage").val(currentDisplayPage);
		var maxInx = parseInt($("#startIndxPage").val())
				+ parseInt($("#numberOfDisplayPages").val());
		if (currentDisplayPage < $("#startIndxPage").val()) {
			if (currentDisplayPage == 1) {
				$("#startIndxPage").val(1);
			} else {
				$("#startIndxPage").val(
						parseInt(currentDisplayPage)
								- parseInt($("#numberOfDisplayPages").val())
								+ 1);
			}
		}
		if (currentDisplayPage >= maxInx) {
			if (currentDisplayPage == $("#totalPages").val()) {

				var startIdx = currentDisplayPage
						% $("#numberOfDisplayPages").val() == 0 ? currentDisplayPage
						- $("#numberOfDisplayPages").val() + 1
						: Math.floor(currentDisplayPage
								/ $("#numberOfDisplayPages").val())
								* $("#numberOfDisplayPages").val() + 1;

				$("#startIndxPage").val(startIdx);
			} else {
				$("#startIndxPage").val(currentDisplayPage);
			}
		}
	}

	//select data from server side by ajax
	function selectDataForPage() {

		if (typeof $("input[name='user.loginDate']").val() != "undefined") {
			$("input[name='user.loginDate']").val(
					formatDate($("input[name='user.loginDate']").val()));
		}

		if (!$("#usercondition").validationEngine('validate')) {
			return;
		}
		$
				.ajax({
					url : "selectdataforpage",
					type : "post",
					data : $("#usercondition").serialize(),
					async : false,
					dataType : "json"
				})
				.done(
						function(result) {
							if (result == null) {
								$.ajax("error");
								return;
							}
							if (result.sessionTimeout) {
								$.ajax("sessionTimeout");
								return;
							}
							if (result.message) {
								$.ajax(result.message);
								return;
							}
							if ((result.data == null && result.length == null)
									|| (result.data != null && result.data.length == 0)) {
								$.ajax("Không có dữ liệu");
							}
							successFunction(result);
						}).fail(function() {
					$.ajax("failed");
				})
	}

	function resetDataFromServer(result) {
		$("#totalPages").val(result.totalPages);
	}

	function successFunction(result) {
		resetDataFromServer(result);
		redrawTable(true, result.userList, $table);
		redrawPaginationZone(result);
		$table.trigger("update");
		setTooltip();
	}

	//add tooltip 
	function setTooltip() {

		/* $("*[rel=tooltip]").tooltip({
				placement : 'right',
				trigger : 'hover'
			}); */

		$table.find("td").each(function() {
			$t = $(this);

			if (this.offsetWidth < this.scrollWidth) {
				$t.attr('data-original-title', $t.text());
				$t.attr('data-toggle', 'tooltip');
			} else {
				$t.removeAttr('data-original-title');
				$t.removeAttr('data-toggle');
			}
		});
	}

	//redraw pagination zone
	function redrawPaginationZone(result) {
		//create element li content a
		var $linew = $("<li><a></a></li>");

		createli($linew, result.numberOfDisplayPages, result.startIndxPage,
				result.currentDisplayPage, result.totalPages);

		decoPaginationZone(result.currentDisplayPage,
				result.numberOfDisplayPages, result.totalPages,
				result.startIndxPage);
	}

	//
	function createli($liSrc, num, idx, crr, total) {

		$ulPagination.empty();
		var $li;
		//append << at first
		$li = $liSrc.clone();
		var behref = "javascript:paginateAjax(1);";
		$li.attr("class", "begin").find("a").attr("href", behref).text("<<");
		$ulPagination.append($li);
		//append < at first
		$li = $liSrc.clone();
		var prhref = "javascript:paginateAjax(" + (crr - 1) + ");";
		$li.attr("class", "prev").find("a").attr("href", prhref).text("<");
		$ulPagination.append($li);
		for (var i = idx; i < num + idx && i <= total; i++) {
			$li = $liSrc.clone();
			var href = "javascript:paginateAjax(" + i + ");";
			$li.find("a").attr("href", href).text(i);
			$ulPagination.append($li);
		}
		//append > at last
		$li = $liSrc.clone();
		var nehref = "javascript:paginateAjax(" + (crr + 1) + ");";
		$li.attr("class", "next").find("a").attr("href", nehref).text(">");
		$ulPagination.append($li);
		//append >> at last
		$li = $liSrc.clone();
		var enhref = "javascript:paginateAjax(" + total + ");";
		$li.attr("class", "end").find("a").attr("href", enhref).text(">>");
		$ulPagination.append($li);
	}

	// decorate pagination
	function decoPaginationZone(cur, numberOfDisplayPages, totalPages,
			startIndxPage) {
		//set selected li
		$ulPagination.find("li").each(function() {
			if ($(this).find("a").text() == cur) {
				$(this).attr("class", "active");
			}
		});
		//set disable for first 
		if (cur <= numberOfDisplayPages) {
			$ulPagination.find("li.begin").addClass("disabled");

		} else {
			$ulPagination.find("li.begin").removeClass("disabled");

		}
		if (cur == 1) {
			$ulPagination.find("li.prev").addClass("disabled");
		} else {
			$ulPagination.find("li.prev").removeClass("disabled");
		}
		//last 
		if ((startIndxPage >= totalPages - numberOfDisplayPages && totalPages >= numberOfDisplayPages)
				|| totalPages <= numberOfDisplayPages) {
			$ulPagination.find("li.end").addClass("disabled");
		} else {
			$ulPagination.find("li.end").removeClass("disabled");
		}
		if (cur >= totalPages) {
			$ulPagination.find("li.next").addClass("disabled");
		} else {
			$ulPagination.find("li.next").removeClass("disabled");
		}

		//remove link href from disable
		$ulPagination.find("li.disabled").each(function() {
			$(this).find("a").removeAttr("href");
		});
	}

	//setup sort for each columns
	function setupSoter() {

		$.tablesorter
				.addWidget({
					id : "numbering",
					format : function(table) {
						$("tr:visible", table.tBodies[0])
								.each(
										function(i) {
											$(this)
													.find('td')
													.eq(0)
													.text(
															parseInt($(
																	"#numberOfDisplayRecords")
																	.val())
																	* (parseInt($(
																			"#currentDisplayPage")
																			.val()) - 1)
																	+ parseInt(i)
																	+ 1);
										});
					}
				});

		$table.tablesorter({
			dateFormat : 'yyyy/mm/dd',
			sortList : [ [ 1, 0 ] ],
			emptyTo : 'none',
			headers : {
				// assign the first column (we start counting zero) 
				0 : {
					sorter : false
				},
				1 : {
					sorter : 'number',
				},
				2 : {
					sorter : 'text'
				},
				3 : {
					sorter : 'text'
				},
				4 : {
					sorter : 'text'
				},
				5 : {
					sorter : 'text'
				},
				6 : {
					sorter : 'text'
				},
				7 : {
					sorter : 'text'
				}
			},
			// apply custom widget
			widgets : [ 'numbering' ]
		});
	}

	function filterControl() {

		var $thead = $("#tbluserlist thead");
		selectDataForPage();
		if ($("#rdFilter").is(':checked')) {
			var $tr = $('<tr class = "filter"></tr>');
			var $td = $('<td></td>');
			$tr.append($td);
			for (var i = 1; i < $thead.find("th").size(); i++) {
				var $width = $thead.find("th").eq(i).width();
				var $input = $('<input type="text" />').attr("onchange",
						"javascript:selectDataForPage();").width($width);
				$td = $('<td></td>').append($input).width($width);
				$tr.append($td);
			}
			var href = "javascript:clearallfilters();";
			$tr.find("td:nth-child(1)").append($('<a/>').attr("href", href).html("clear"));
			
			//add name
			$tr.find("td:nth-child(2) input").attr("name", "user.userId").attr(
					"class",
					"form-control validate[custom[number],maxSize[32]]");
			$tr.find("td:nth-child(3) input").attr("name", "user.loginId")
					.attr("class", "form-control");
			$tr.find("td:nth-child(4) input").hide();
			$tr.find("td:nth-child(5) input").attr("name", "user.loginDate")
					.attr("class", "form-control validate[custom[date]]");
			$tr.find("td:nth-child(6) input").attr("name", "user.lastName")
					.attr("class", "form-control");
			$tr.find("td:nth-child(7) input").attr("name", "user.firstName")
					.attr("class", "form-control");
			$tr.find("td:nth-child(8) input").attr("name", "user.email").attr(
					"class", "form-control");

			$thead.append($tr);
		} else {
			$thead.find("tr.filter").remove();
		}

	}
	
	function clearallfilters(){
		$("tr.filter").find("td:not(:first) input").each(function(){
			$(this).val("");
		});
		selectDataForPage();
	}
</script>
