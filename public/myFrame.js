/* ╔═════════════════════════════════════════════════════════════════════════════════════════════════════╗
/* ║       _____                                      _____                   _                          ║ */
/* ║      / ___ \       _                            (____ \                 | |                         ║ */
/* ║     | |   | | ____| |_  ___  ____  _   _  ___    _   \ \ ____ _   _ ____| | ___  ____   ____  ____  ║ */
/* ║     | |   | |/ ___)  _)/ _ \|  _ \| | | |/___)  | |   | / _  ) | | / _  ) |/ _ \|  _ \ / _  )/ ___) ║ */
/* ║     | |___| ( (___| |_| |_| | | | | |_| |___ |  | |__/ ( (/ / \ V ( (/ /| | |_| | | | ( (/ /| |     ║ */
/* ║      \_____/ \____)\___)___/| ||_/ \____(___/   |_____/ \____) \_/ \____)_|\___/| ||_/ \____)_|     ║ */
/* ║                             |_|                                                 |_|                 ║ */
/* ║                                                                                                     ║ */
/* ║   Last update: 05/08/2025 21:22:27                                                                  ║ */
/* ║   User update: Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║ */
/* ║   Project:     Sou Nail Desing                                                                      ║ */
/* ║                                                                                                     ║ */
/* ║   Author:      Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║ */
/* ║   Created at:  05/08/2025 21:22:00                                                                  ║ */
/* ║   License:     MIT                                                                                  ║ */
/* ║   Copyright:   2025 Octopus Developer                                                               ║ */
/* ╚═════════════════════════════════════════════════════════════════════════════════════════════════════╝ */

// ************************************************************************
// Variables
// ***********************************************************************/
//
var phoneNumberData = [
	{countryName: 'Australia', countryNickname: 'Aus', countryFlag: 'comming soon', countryPhoneDDI: '+61', countryPhoneRealLenght: '10', countryPhoneMinLenght: '12', countryPhoneMaxLenght: '12', countryPhoneMask: "9999-999-999"},
	{countryName: 'Brazil', countryNickname: 'Bra', countryFlag: 'comming soon', countryPhoneDDI: '+55', countryPhoneRealLenght: '11', countryPhoneMinLenght: '15', countryPhoneMaxLenght: '15', countryPhoneMask: "(99) 99999-9999"}
]; // end of phoneNumberData.

// ************************************************************************
// Functions
// ***********************************************************************/
// For notification.
var notification =
{
	'instance':function() // Create a new instance for notification.
	{
		Messenger.options = {
			extraClasses: 'messenger-fixed messenger-on-top  messenger-on-right',
			theme: 'flat',
			messageDefaults: {
				showCloseButton: true
			}
		}
	}, // end of intance.
	'notification':function(notificationDataMessage, notificationDataType, notificationDataTime) // Notification message.
	{
		// console.log(notificationData); // log unorganized.
		// console.log(JSON.stringify(notificationData)); // log organized.
		Messenger().post({
			message: notificationDataMessage,
			type: notificationDataType,
			hideAfter: notificationDataTime,
			showCloseButton: true
		}); // end of post.
	}, // end of notification.
	'showNotification':function()
	{
		notification.instance(); // Get the instance.
		var notificationData; // Inicialize the variable.
		$.ajax({
			type: "POST",
			url: "/Admin/Common/getNotification", // Get the data from php.
			data: notificationData,
			dataType: "JSON",
			cache: false,
			success: function(notificationData) {
				// console.log(notificationData); // log unorganized.
				// console.log(JSON.stringify(notificationData)); // log organized.
				notification.notification(notificationData.message, notificationData.type, notificationData.time);
			}
		});
	}
} // end of notification.

// For dataTable.
var dataTable =
{
	'showDataTable':function(targetTag, pageSize, pageLength, collumsType, columnsPrint, sortColummID, sortColummType) // Create the data-table.
	{
		// Check if the paramteter is ALL pass by text.
		if(pageLength === "ALL") {
			pageLength = -1
		} // if(pageLength = "ALL")

		dataTableObject = $(targetTag).dataTable({
			"columns": collumsType,
			"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
			"aaSorting": [[ sortColummID, sortColummType ]],
			"pageLength": pageLength,
			dom: 'lfrtipB',
			buttons: [
				{ extend: 'copy', className: 'btn btn-primary btn-list-datatable', exportOptions: { columns: [ columnsPrint ] } },
				{ extend: 'csv', className: 'btn btn-primary btn-list-datatable', exportOptions: { columns: [ columnsPrint ] } },
				{ extend: 'excel', className: 'btn btn-primary btn-list-datatable', exportOptions: { columns: [ columnsPrint ] } },
				{ extend: 'pdfHtml5', pageSize: pageSize, alignment: "center", className: 'btn btn-primary btn-list-datatable', exportOptions: { columns: [  columnsPrint ] },
					customize: function(doc) {
						doc.pageMargins = [20, 20, 20, 30];
						doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');

						// Get the date.
						var now = new Date();
						var jsDate = (now.getDate() < 10 ? '0' : '') + now.getDate() + '/' + ((now.getMonth() + 1) < 10 ? '0' : '') + (now.getMonth() + 1) + '/' + now.getFullYear() + ' at ' + (now.getHours() < 10 ? '0' : '') + now.getHours() + ':' + (now.getMinutes() < 10 ? '0' : '') + now.getMinutes() + ':' + (now.getSeconds() < 10 ? '0' : '') + now.getSeconds();
						// var jsDate = now.getDate() + '/' + (now.getMonth() + 1) + '/' + now.getFullYear() + ' at ' + now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds();
						doc['footer'] = function(page, pages) {
							return {
								columns: [
									'Created at: ' + jsDate,
									{
										alignment: 'right',
										text: [
											{ text: page.toString()}, ' of ', { text: pages.toString()}
										]
									},
								],
								margin: [10, 10]
							}
						};
					}
				},
				{ extend: 'print', className: 'btn btn-primary btn-list-datatable', exportOptions: { columns: [ columnsPrint ] } }
			],
			scrollX: true,
			"ordering": true
		})

		return dataTableObject;
	}, // end of showDataTable.
	'showDataTableButtonSelectAll':function(dataTableObject, targetTag, inputTag) // Button Select All.
	{
		$('body').on('click', targetTag, function()
		{
			allPages = dataTableObject.fnGetNodes();
			$(inputTag, allPages).prop('checked', false);
			dataTableObject.$(inputTag, {"filter":"applied"}).prop('checked',true);
		}) // end of $('body').on('click', targetTag, function()
	}, // end of 'showDataTableButtonSelectAll':function(dataTableObject, targetTag, inputTag) // Button Select All.
	'showDataTableButtonUnselectAll':function(dataTableObject, targetTag, inputTag) // Button Unselect All.
	{
		$('body').on('click', targetTag, function()
		{
			allPages = dataTableObject.fnGetNodes();
			$(inputTag, allPages).prop('checked', true);
			dataTableObject.$(inputTag, {"filter":"applied"}).prop('checked', false);
		}) // end of $('body').on('click', targetTag, function()
	}, // end of 'showDataTableButtonUnselectAll':function(dataTableObject, targetTag, inputTag) // Button Unselect All.
	'showDataTableButtonInvertAll':function(dataTableObject, targetTag, inputTag) // Button Invert All.
	{
		$('body').on('click', targetTag, function()
		{
			result = dataTableObject.$(inputTag, {"filter":"applied"})
			count = result.length;
			for (i = 0; i < count; i++)
			{
				var checkboxObject = $(result[i]);
				if($(checkboxObject).is(":checked"))
				{
					$(checkboxObject).prop('checked', false);
				} else {
					$(checkboxObject).prop('checked', true);
				} // end of if($(checkboxObject).is(":checked"))
			} // end of for (i = 0; i < count; i++)
		}) // end of $('body').on('click', targetTag, function()
	} // end of 'showDataTableButtonInvertAll':function(dataTableObject, targetTag, inputTag) // Button Invert All.
} // end of dataTable.

// For bootBoxAlert.
var bootBoxAlert =
{
	'confirmSubmitAlert':function(targetTag, formName, title, message, overLayAllFrame, overLayAllPage)
	{
		$(targetTag).click(function(event)
		{
			bootbox.confirm({
				title: title,
				message: message,
				centerVertical: true,
				backdrop: true,
				buttons: {
					cancel: {
						label: '<i class="fa fa-times"></i> Cancel'
					}, // end of cancel:
					confirm: {
						label: '<i class="fa fa-check"></i> Confirm',
						className: 'btn btn-primary'
					} // end of confirm:
				}, // end of buttons:
				callback: function(result) {
					if(result) {
						// Overlay to all page.
						if(overLayAllPage == true) {
							$('#overlayAllPage').show();
						} // end of if(overLayAllPage == true)

						// Overlay just for frame.
						if(overLayAllFrame == true) {
							$('#overlayAllFrame').show();
						} // end of if(overLayAllFrame == true)

						// Submit.
						$(formName).submit();
					}
				} // end of callback: function(result)
			}); // end of bootbox.confirm({
		}); // end of $(targetTag).click(function(event)
	}, // end of 'confirmSubmitAlert':function(targetTag, formName, title, message, overLayAllFrame, overLayAllPage)
	'confirmHrefAlert':function(targetTag, title, message, overLayAllFrame, overLayAllPage)
	{
		$(targetTag).click(function(event)
		{
			var href = $(this).attr("href");
			event.preventDefault();
			bootbox.confirm({
				title: title,
				message: message,
				centerVertical: true,
				backdrop: true,
				buttons: {
					cancel: {
						label: '<i class="fa fa-times"></i> Cancel'
					}, // end of cancel:
					confirm: {
						label: '<i class="fa fa-check"></i> Confirm',
						className: 'btn btn-primary'
					} // end of confirm:
				}, // end of buttons:
				callback: function(result) {
					if(result) {
						// Overlay to all page.
						if(overLayAllPage == true) {
							$('#overlayAllPage').show();
						} // end of if(overLayAllPage == true)

						// Overlay just for frame.
						if(overLayAllFrame == true) {
							$('#overlayAllFrame').show();
						} // end of if(overLayAllFrame == true)

						// Submit.
						location.href = href;
					}
				} // end of callback: function(result)
			}); // end of bootbox.confirm({
		}); // end of $(targetTag).click(function(event)
	}, // end of 'confirmHrefAlert':function(targetTag, title, message, overLayAllFrame, overLayAllPage)
	'confirmDataTableSwitchToggle':function(tableID, targetTag, title, message, link, redirect, overLayAllFrame, overLayAllPage)
	{
		$(tableID).on('change', targetTag, function(event)
		{
			// Get all data
			objectID = $(this).val();
			checkBoxID = '#' + $(this).attr('id');

			// Modal
			bootbox.confirm({
				title: title,
				message: message,
				centerVertical: true,
				backdrop: true,
				buttons: {
					cancel: {
						label: '<i class="fa fa-times"></i> Cancel'
					}, // end of cancel:
					confirm: {
						label: '<i class="fa fa-check"></i> Confirm',
						className: 'btn btn-primary'
					} // end of confirm:
				}, // end of buttons:
				callback: function(result) {
					if(result) {
						// Overlay to all page.
						if(overLayAllPage == true) {
							$('#overlayAllPage').show();
						} // end of if(overLayAllPage == true)

						// Overlay just for frame.
						if(overLayAllFrame == true) {
							$('#overlayAllFrame').show();
						} // end of if(overLayAllFrame == true)

						$.ajax({
							type: "POST",
							url: link, // Get the data from php.
							dataType: "JSON",
							data: {objectID: objectID},
							cache: false,
							success: function(returnData)
							{
								console.log(returnData);
								location.href = redirect;
							}
						});
						// Submit.
					} else {
						$(checkBoxID).prop('checked', !$(checkBoxID)[0].checked);
					} // end of if(result) {
				} // end of callback: function(result)
			}); // end of bootbox.confirm({
		});
	} // end of 'confirmDataTableSwitchToggle':function()
} // end of var bootBoxAlert.

// Format phone number.
var phoneNumberGlobal =
{
	'formatPhoneNumberLoad':function(selectTarget, inputTarget, inputHiddenPhoneNumber)
	{
		// Get value input hiden.
		phoneNumberFullArray = $(inputHiddenPhoneNumber).val().split("p");
		phoneNumberDDI = phoneNumberFullArray[0];
		phoneNumber = phoneNumberFullArray[1];

		// Verify if the variable is empty.
		if(phoneNumberDDI === '')
		{
			phoneNumberDDI = '+61';
		} // end of if(phoneNumberDDI === undefined)

		// Iterate over each element in the array
		for(var i=0; i < phoneNumberData.length; i++)
		{
			// Look for the entry with a matching `code` value
			if(phoneNumberData[i].countryPhoneDDI == phoneNumberDDI)
			{
				// Create a elements inside select.
				$(selectTarget).append($('<option>', {value: phoneNumberData[i].countryPhoneDDI, text: phoneNumberData[i].countryPhoneDDI, selected: true}));

				// All attribute.
				$(inputTarget).val(phoneNumber);
				$(inputTarget).mask(phoneNumberData[i].countryPhoneMask);
				$(inputTarget).attr("placeholder", phoneNumberData[i].countryPhoneMask.replace(/9/g, "0"));
				$(inputTarget).attr("minlength", phoneNumberData[i].countryPhoneMinLenght);
				$(inputTarget).attr("data-minlenght", phoneNumberData[i].countryPhoneRealLenght);
				$(inputTarget).attr("maxlength", phoneNumberData[i].countryPhoneMaxLenght);
			} else {
				// Create a elements inside select.
				$(selectTarget).append($('<option>', {value: phoneNumberData[i].countryPhoneDDI, text: phoneNumberData[i].countryPhoneDDI}));
			} // end of if(phoneNumberData[i].countryPhoneDDI == phoneNumberDDI)
			// end of if(phoneNumberData[i].code == phoneNumberDDI)
		} // end of for(var i=0; i < phoneNumberData.length; i++)
	}, // end of 'formatPhoneNumberLoad':function()
	'formatPhoneNumberChange':function(selectTarget, inputTarget)
	{
		$(selectTarget).change(function()
		{
			// Get value input hiden.
			selectTargetValue = $(selectTarget).val();

			// Iterate over each element in the array
			for(var i=0; i < phoneNumberData.length; i++)
			{
				// Look for the entry with a matching `code` value
				if(phoneNumberData[i].countryPhoneDDI == selectTargetValue)
				{
					// All attribute.
					$(inputTarget).val('');
					$(inputTarget).mask(phoneNumberData[i].countryPhoneMask);
					$(inputTarget).attr("placeholder", phoneNumberData[i].countryPhoneMask.replace(/9/g, "0"));
					$(inputTarget).attr("minlength", phoneNumberData[i].countryPhoneMinLenght);
					$(inputTarget).attr("data-minlenght", phoneNumberData[i].countryPhoneRealLenght);
					$(inputTarget).attr("maxlength", phoneNumberData[i].countryPhoneMaxLenght);
				} // end of if(phoneNumberData[i].countryPhoneDDI == phoneNumberDDI)
			} // end of for(var i=0; i < phoneNumberData.length; i++)
		}); // end of $(selectTarget).change(function() {
	} // end of 'formatPhoneNumberChange':function()
} // end of var phoneNumberGlobal.

// Function for mask.
var mask =
{
	// Mask for date of Brazil.
	'dateBrazil':function(targetTag)
	{
		$(targetTag).mask("99/99/9999");
	} // end of dateBrazil.
} // end of Function for mask.

// Functions for tools.
var tools = {
	// Set a focus for inputs.
	'setFocusInput':function(targetTag)
	{
		var targetTagVal = $(targetTag).val();
		$(targetTag).focus().val('').val(targetTagVal);
	}, // end of 'setFocusInput':function(targetTag).
	'setFocusDataTableList':function(targetTag)
	{
		$(targetTag).focus();
	}, // end of 'setFocusDataTableList':function(targetTag).
	'copyToClipboard':function(targetTag, textTag)
	{
		$(targetTag).click(function(event)
		{
			copyText = $(textTag).html();
			textArea = document.createElement("textarea");
			textArea.value = copyText;
			document.body.appendChild(textArea);
			textArea.select();
			document.execCommand("Copy");
			textArea.remove();
		}); // end of $(targetTag).click(function(event)
	}, // end of 'copyToClipboard':function(targetTag, textTag)
	'fixedHeaderFooter':function()
	{
		var sideBarWidth;
		var sideNavBar = document.getElementsByClassName("side-navbar")[0];
		if(window.innerWidth >= 1194)
		{
			if(sideNavBar.classList.contains("shrink") == true)
			{
				sideBarWidth = 70;
			} else {
				sideBarWidth = 200;
			} // end of if(sideNavBar.classList.contains("shrink") == true)
		} else {
			if(sideNavBar.classList.contains("show-sm") == true)
			{
				sideBarWidth = 70;
			} else {
				sideBarWidth = 0;
			} // end of if(sideNavBar.classList.contains("show-sm") == true)
		} // end of if(window.innerWidth >= 1194)

		var num =  window.innerWidth - sideBarWidth+"px";
		document.getElementsByClassName("page")[0].style.marginTop = '70px';
		document.getElementsByClassName("header")[0].style.position = 'fixed';
		document.getElementsByClassName("header")[0].style.marginTop = '-70px';
		document.getElementsByClassName("header")[0].style.width = num;
		document.getElementsByClassName("header")[0].style.marginLeft = sideNavBar.offsetWidth;
		document.getElementsByClassName("main-footer")[0].style.position = 'fixed';
		document.getElementsByClassName("main-footer")[0].style.marginTop = '-70px';
		document.getElementsByClassName("main-footer")[0].style.width = num;
		document.getElementsByClassName("main-footer")[0].style.marginLeft = sideNavBar.offsetWidth;
	} // end of 'fixedHeaderFooter':function()
} // end of var tools

// Function for format.
var format =
{
	'calendarPassed':function(targetTag) // Interactive caldendar.
	{
		// Start datapicker.
		$(targetTag).datepicker({
			format: 'dd/mm/yyyy',
			showOtherMonths: true,
			selectOtherMonths: true,
			autoclose: true,
			changeMonth: true,
			changeYear: true,
			todayBtn: "linked",
			todayHighlight : true,
			showButtonPanel: true,
			orientation: "bottom left",
			endDate: new Date()
		}); // end of datepicker.
	}, // end of calendar no passed.
	'calendarAll':function(targetTag) // Interactive caldendar.
	{
		// Start datapicker.
		$(targetTag).datepicker({
			format: 'dd/mm/yyyy',
			showOtherMonths: true,
			selectOtherMonths: true,
			autoclose: true,
			changeMonth: true,
			changeYear: true,
			todayBtn: "linked",
			todayHighlight : true,
			showButtonPanel: true,
			orientation: "bottom left"
		}); // end of datepicker.
	}, // end of calendar All.
	'calendarFuture':function(targetTag) // Interactive caldendar.
	{
		// Start datapicker.
		$(targetTag).datepicker({
			format: 'dd/mm/yyyy',
			showOtherMonths: true,
			selectOtherMonths: true,
			autoclose: true,
			changeMonth: true,
			changeYear: true,
			todayBtn: "linked",
			todayHighlight : true,
			showButtonPanel: true,
			orientation: "bottom left",
			startDate: new Date()
		}); // end of datepicker.
	} // end of calendar future.
} // end of Function for format.

// Function for ratings.
var ratings =
{
	// Mouse over the start ratings.
	'ratingsHover':function(targetTag)
	{
		$(targetTag).hover(function()
		{
			$(targetTag).removeClass('rating-btn-hover');
			var theRate = $(this).attr('id');
			for(var i = (theRate - 1); i >= 0; i--)
			{
				$('.btnStar-'+i).addClass('rating-btn-hover');
			};
		}); // end of $(targetTag).hover(function()
	}, // end of ratingsHover.
	'ratingsHoverClean':function(targetTag)
	{
		$(targetTag).hover(function(){}, function()
		{
			var theRate = $(targetTag + " > div").length;
			for(var i = theRate; i >= 0; i--)
			{
				$('.btnStar-'+i).removeClass('rating-btn-hover');
				$('.btnStar-'+i).removeClass('rating-btn-active');
			}; // end of for(var i = theRate; i >= 0; i--)
		}); // end of $(targetTag).hover(function(){}, function()
	}, // end of ratingsHoverClean.
	// Mouse over the start ratings.
	'ratingsClickHtml':function(targetTag, ratingStarID, ratingUrlAjax)
	{
		var ratingStarID = $(ratingStarID).val();
		$(targetTag).click(function()
		{
			var ratingGrade = $(this).attr('id');

			// Start Ajax.
			$.ajax({
				type: "POST",
				url: ratingUrlAjax, // Get the data from php.
				data: { saveRating : 'TRUE', id : ratingStarID, ratingGrade : ratingGrade },
				dataType: "JSON",
				cache: false,
				success: function(ratingStarResponse)
				{
					$(".ratingEditTime").html(ratingStarResponse['ratingDataTime']);
					$(".ratingEditTotal").html(ratingStarResponse['ratingDataTotal']);
					$(".ratingEditResult").html(ratingStarResponse['ratingDataResult']);
					$(".ratingEditMessage").html("Thanks for your rated.");
					// console.log(ratingStarResponse); // log unorganized.
					// console.log(JSON.stringify(ratingStarResponse)); // log organized.
				} // end of success: function(ratingStarResponse)
			}); // end of $.ajax({
		}); // end of $(targetTag).click(function()
	}, // end of ratingsClickHtml.
	'ratingsClickValue':function(targetTag, ratingStarID, ratingUrlAjax)
	{
		var ratingStarID = $(ratingStarID).val();
		$(targetTag).click(function() {
			var ratingGrade = $(this).attr('id');

			// Start Ajax.
			$.ajax({
				type: "POST",
				url: ratingUrlAjax, // Get the data from php.
				data: { saveRating : 'TRUE', id : ratingStarID, ratingGrade : ratingGrade },
				dataType: "JSON",
				cache: false,
				success: function(ratingStarResponse)
				{
					$(".ratingEditTime").val(ratingStarResponse['ratingDataTime']);
					$(".ratingEditTotal").val(ratingStarResponse['ratingDataTotal']);
					$(".ratingEditResult").val(ratingStarResponse['ratingDataResult']);
					$(".ratingEditMessage").html("Thanks for your rated.");
					// console.log(ratingStarResponse); // log unorganized.
					// console.log(JSON.stringify(ratingStarResponse)); // log organized.
				}
			});
		});
	} // end of ratingsClickValue.
} // end of Function for ratings.
