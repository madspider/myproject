/**
 * common.js file content all functions are used in all pages of project
 */

var DateFormat = "yy/mm/dd";
var NumberOfDecimal = 2;
function makeNewUrl(pageName) {
	var currentPage = document.location.href.match(/[^\/]+$/)[0];
	return window.location.href.replace(currentPage, pageName);
}

/*
 * this function is used for validate the date format of a string param: date ->
 * the string contains the date want to validate param: format -> the string
 * contains the format of date
 */
function isValidateDateWithFormat(date, format) {
	try {
		$.datepicker.parseDate(format, date);
		return true;
	} catch (ex) {
		return false;
	}
}

/*
 * this function is used to validate date string with the default format:
 * yy-mm-dd
 */
function isValidateDate(date) {
	return isValidateDateWithFormat(date, DateFormat);
}

// this function is call after dom ready. this method is used to change the css
// class for purpose show error meessage
$(document).ready(function() {
	$('.form-group').each(function(index, element) {
		if ($(this).find('span[class="help-block"]').length) {
			$(this).addClass('has-error');
		}
	});
});

// set the error message to the span tag, if the span doesn't exist, add new
// one, if the errorMsg is empty, remove the span
function setErrorText(errorMsg, spanName, parentDiv) {
	var spanId = spanName + '\.errors';
	// if the errorMsg is empty, the error span will be remove and the has-error
	// class in parent div is remove
	if (errorMsg == '') {
		$('#' + parentDiv).find('span[class="help-block"]').remove();
		$('#' + parentDiv).removeClass('has-error');

	} else {
		if ($('#' + parentDiv).find('span[class="help-block"]').length) {
			$('#' + parentDiv).find('span[class="help-block"]').text(errMsg);

		} else {
			var innerText = '<span id="' + spanId + '" class="help-block">'
					+ errMsg + '</span>';
			$('#' + parentDiv).find('.errorClass').append(innerText);
			$('#' + parentDiv).addClass('has-error');
		}
	}
}

function createDeleteConfirmationModal(divId, title, message,
		cancelButtonTitle, acceptButtonTitle, funcName) {
	var content = '<div id="'
			+ divId
			+ '" class="modal fade" tabindex="-1"> <div class="modal-dialog"> <div class="modal-content">';
	content += ' <div class="modal-header" style="padding-top:5px; padding-bottom:3px;"> <button type="button" class="close" style="margin-top:0px;" data-dismiss="modal" aria-hidden="true">&times;</button>';
	content += ' <h4 class="modal-title">' + title + '</h4> </div>';
	content += ' <div class="modal-body"> <p>' + message
			+ '</p>  </div> <div class="modal-footer">';
	content += ' <button type="button" id="btnModalDelete" class="btn btn-material-red" onclick="'
			+ funcName + '();">' + acceptButtonTitle + '</button>';
	content += ' <button type="button" id="btnModalClose" class="btn btn-primary btn-default" data-dismiss="modal">'
			+ cancelButtonTitle + '</button>';
	content += '  </div></div></div></div>';

	$(document.body).append(content);
}

/* Warning message show */
function createDeleteWarningModal(divId, title, message, confirmButtonTitle,
		funcName) {
	var content = '<div id="'
			+ divId
			+ '" class="modal fade" tabindex="-1"> <div class="modal-dialog"> <div class="modal-content">';
	content += ' <div class="modal-header" style="padding-top:5px; padding-bottom:3px;"> <button type="button" class="close" style="margin-top:0px;" data-dismiss="modal" aria-hidden="true">&times;</button>';
	content += ' <h4 class="modal-title">' + title + '</h4> </div>';
	content += ' <div class="modal-body"> <p>' + message
			+ '</p>  </div> <div class="modal-footer">';
	content += ' <button type="button" id="btnModalClose" class="btn btn-primary btn-default" data-dismiss="modal" onclick="'
			+ funcName + '();">' + confirmButtonTitle + '</button>';
	content += '  </div></div></div></div>';

	$(document.body).append(content);
}

function showFlash(parentDivId, message, seconds) {
	var content = '<div id="divFlashMsg" class="form-group has-error">';
	content += ' <span class="help-block" align="center" style="font-weight: bold; font-size:17px;">'
			+ message + '</span>'
	content += '</div>';
	$('#' + parentDivId).append(content);
	$('#divFlashMsg').show();
}

function showWarning(parentDivId, message, seconds) {
	var content = '<div id="divFlashMsg" class="form-group has-error">';
	content += ' <span class="help-block" align="center" style="font-weight: bold; font-size:17px;">'
			+ message + '</span>'
	content += '</div>';

	$('#' + parentDivId).append(content);
	$('#divFlashMsg').show();
}

function showWarning(parentDivId, message, seconds, leftPos) {
	var content = '<div id="divFlashMsg" class="has-error">';
	content += ' <span class="help-block" style="position:relative; font-weight: bold; font-size:17px; left:'
			+ leftPos + 'px">' + message + '</span>'
	content += '</div>';

	$('#' + parentDivId).append(content);
	$('#divFlashMsg').show();

}

function showSuccessFlash(parentDivId, message, seconds) {
	var content = '<div id="divFlashMsg" class="form-group has-success">';
	content += ' <span class="help-block" align="center" style="font-weight: bold; font-size:17px; text-align:center;">'
			+ message + '</span>'
	content += '</div>';

	$('#' + parentDivId).append(content);
	$('#divFlashMsg').show();
}

function showSuccessFlash(parentDivId, message, seconds, leftPos) {
	var content = '<div id="divFlashMsg" class="form-group has-success">';
	content += ' <span class="help-block" style="position:relative; font-weight:bold; font-size:17px; left:'
			+ leftPos + 'px">' + message + '</span>'
	content += '</div>';

	$('#' + parentDivId).append(content);
	$('#divFlashMsg').show();

	// Kadai 178 START --- 一定時間経過後、ステータスが更新され消去される。
	// setTimeout(function() {
	// $("#divFlashMsg").remove();
	// }, seconds);
	// Kadai 178 END
}

function validateInputDigit(obj) {
	var newValue = obj.replace(/[^0-9]/g, '');
	if (obj != newValue) {
		return false;
	}
	return true;
}

/**
 * Used to attach events to an element or object in a browser independent way
 * 
 * @param element
 * @param event
 * @param callbackFunction
 */
function attachEvent(element, event, callbackFunction) {
	if (element.addEventListener) {
		element.addEventListener(event, callbackFunction, false);
	} else if (element.attachEvent) {
		element.attachEvent('on' + event, callbackFunction);
	}
}

/**
 * Returns true if the HTML5 File API is supported by the browser
 * 
 * @returns {*}
 */
function supportsFileAPI() {
	return window.File && window.FileReader && window.FileList && window.Blob;
}

var PDF_FILE_SIZE = 1;

/**
 * Method to be called upon changing the contents of a input element before
 * uploading a file
 * 
 * @param event
 */
function preUploadPdf(event) {
	// The file API supports the ability to reference multiple files in one
	// <input> tag
	var file = event.target.files[0];
	if (file != null) {
		// Only process image files.
		if (!file.type.match('application/pdf')) {
			showError("The upload file is not pdf format");
			return;
		}

		var reader = new FileReader();

		attachEvent(reader, "load", (function(fileToCheck) {
			return function(evt) {
				showPdf(evt.target.result);
			}
		})(file));

		var MBSize = file.size / 1024 / 1024;
		if (MBSize > PDF_FILE_SIZE) {
			showError("The file size is so big");
			return;
		}
		reader.readAsDataURL(file);
	}
}

function formatDecimal(value) {
	return parseFloat(Math.round(value * 100) / 100).toFixed(NumberOfDecimal);
}

/**
 * set form data to session storage
 * 
 * @param formId
 * @param sessionKey
 */
function setJsonSessionStorage(formId, sessionKey) {
	var formData = form2js(formId, '.', true, null);
	var value = JSON.stringify(formData, null, '\t');
	sessionStorage.setItem(sessionKey, value);
}

/**
 * set data to session storage
 * 
 * @param sessionKey
 * @param sessionValue
 */
function setSessionStorage(sessionKey, sessionValue) {
	sessionStorage.setItem(sessionKey, sessionValue);
}

/**
 * set data from session storage
 * 
 * @param sessionKey
 */
function getSessionStorage(sessionKey) {
	return sessionStorage.getItem(sessionKey);
}

/**
 * remove session storage by session key
 * 
 * @param sessionKey
 */
function removeSessionStorage(sessionKey) {
	sessionStorage.removeItem(sessionKey);
}

/**
 * remove all session storage
 */
function removeAllSessionStorage() {
	sessionStorage.clear();
}

/**
 * format date yyyy/MM/dd function
 */
function formatDate(date) {

	var originalDate = date;
	// initialize value
	var d, month, day, year;

	var today = new Date();

	// format add slashes yyyy/MM/dd
	if (!isValidateDate(date)) {
		// remove all slashes
		str = date.replace(/\\/g, '')

		if (str.length > 0 && str.length <= 2) {
			month = '' + (today.getMonth() + 1);
			day = '' + (str);
			year = (today.getFullYear());
			date = [ year, month, day ].join('/');
		} else if (str.length > 2 && str.length <= 4) {
			month = '' + (str.substring(0, 2));
			day = '' + (str.substring(2, 4));
			year = (today.getFullYear());
			date = [ year, month, day ].join('/');
		} else if (str.length > 4 && str.length <= 8) {
			month = '' + (str.substring(4, 6));
			day = '' + (str.substring(6, 8));
			year = (str.substring(0, 4));
			date = [ year, month, day ].join('/');
		} else {
			if (!isNaN(date))
				return date;
		}
	}

	d = new Date(date);
	month = '' + (d.getMonth() + 1);
	day = '' + (d.getDate());
	year = (d.getFullYear());

	if (month.length < 2)
		month = '0' + month;
	if (day.length < 2)
		day = '0' + day;

	// check if return error
	if ((year || month || day) == 'NaN')
		return originalDate;

	return [ year, month, day ].join('-');
}

function clearModalContent($formId) {
	$formId.find("input").val("");
	$formId.find("img").attr("src", "");
	$formId.find("fieldset.image_product").empty();
}

function clearModalContentNotDisabled($formId) {
	$formId.find("input:visible").not(":disabled").val("");
}

function setDataForModal($modalForm, $tableRow) {
	$modalForm.find("input").each(function() {
		$(this).val($tableRow.find("." + $(this).attr("id")).html());
	});
}

function showModalDialog($formId) {
	$formId.modal({
		keyboard : false,
		toggle : "modal",
		backdrop : 'static'
	}); // initialized with no keyboard
	$formId.modal('show');
}

function closeModalDialog($formId) {
	$formId.modal('hide');
}
