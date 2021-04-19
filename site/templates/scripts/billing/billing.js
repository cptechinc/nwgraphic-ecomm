
$('input[name=cardnumber]').payment('formatCardNumber');

$('input[name=cvc]').payment('formatCardCVC');
$('input[name=expdate]').payment('formatCardExpiry');

$('#cardnumber').validateCreditCard(function(result) {
	if (result.card_type !== null && $("#cardnumber").val().length > 0) {
		if ($("#cardnumber").val().length >= 3 && result.length_valid === false) {
			$("#creditcard-num").removeClass("has-success").addClass("has-error");
			$("#ccstatus").removeClass("has-success").addClass("has-error");
			$('.payment-errors').text('Credit Card Number must be 16 digits long');
			$('.card').removeClass('hidden');
		}  else if ($("#cardnumber").val().length >= 10 && result.luhn_valid === false) {
			$("#creditcard-num").removeClass("has-success").addClass("has-error");
			$('.payment-errors').text('Please check your Credit Card Number');
			$('.card').removeClass('hidden');
		} else if ($("#cardnumber").val().length === 0) {
			$("#creditcard-num").removeClass("has-success").addClass("has-error");
			$('.payment-errors').text('Please check your Credit Card Number');
			$('.card').removeClass('hidden');
		} else {
			$("#creditcard-num").removeClass("has-error").addClass("has-success");
			$('.payment-errors').text('Card recognized as ' + result.card_type.display);
			$('.card').addClass('hidden');
			$('#card-name').text(result.card_type.display + ' ending in ');
			$('#'+result.card_type.image+'-image').removeClass('hidden');
			$('#card-type').val(result.card_type.code);
		}
	} else if (result.card_type === null && $("#cardnumber").val().length > 0 ) {
		$("#creditcard-num").removeClass("has-success").addClass("has-error");
		$('.payment-errors').text('Card Type Not recognized, please try again');
		$('.card').removeClass('hidden');
	}

}, { accept: ['mastercard', 'visa' , 'discover', 'amex'] } );



$('input[name=expdate]').change(function() {
	var date_array = $('input[name=expdate]').val().split('/');
	var month = date_array[0].trim();
	var year = date_array[1].trim();
	console.log(month + " - " + year);
	var valid = $.payment.validateCardExpiry(month, year);
	if (!valid) {
		$('#exp-date').removeClass('has-success').addClass('has-error');
	} else {
		$('#exp-date').removeClass("has-error").addClass("has-success");
	}
});

$('input[name=cvc]').change(function() {
	var card = $.payment.cardType($("#cardnumber").val());
	console.log(card);
	$.payment.validateCardCVC($('input[name=card-cvc]').val(), card);
});

/* =============================================================
	Validation Functions
============================================================= */
	var validator = $('#billing-form').validate({
		errorClass: "has-error",
		validClass: "has-success",
		errorPlacement: function(error, element) {
			error.insertAfter(element).addClass('invalid-feedback text-danger');
		},
		rules: {
			billcontact: {required: true},
			billname: {required: true},
			billaddress: {required: true},
			billcountry: {required: true},
			billcity: {required: true},
			billstate: {required: true},
			billzip: {required: true},
			shiptoid: {required: true},
			shiptcontact: {required: true},
			shiptoname: {required: true},
			shiptoaddress: {required: true},
			shiptocountry: {required: true},
			shiptocity: {required: true},
			shiptostate: {required: true},
			shiptozip: {required: true},
			phone: {required: true},
			email: {required: true},
			shipvia: {required: true},
			cardnumber: {
				required: function() {
					return $('#paymethod').val() == 'cc' && $('#use-provided-card').prop('checked') === false;
				}
			},
			expdate: {
				required: function() {
					return $('#paymethod').val() == 'cc' && $('#use-provided-card').prop('checked') === false;
				}
			},
			cvc: {
				required: function() {
					return $('#paymethod').val() == 'cc' && $('#use-provided-card').prop('checked') === false;
				}
			}
		},
		messages: {
		},
		submitHandler: function(form) {
			var jform = $(form);
			postform('#'+form.attr('id'), function() {
				wait(3000, function() {
					has_error = get_header_form_errors(function() {
						window.location.href = $('#page').val();
					});
				});
			});
		}
	});
//
// $('#billing-form').submit(function(e) {
// 	e.preventDefault();
// 	var formid = $('#billing-form').attr('id');
// 	var msg = '';
// 	var has_error = false;
// 	$('.required').each(function() {
// 		if ($(this).val() == '') {
// 			$(this).parent().addClass('has-error');
// 			var label = $(this).parent().children('label').text();
// 			msg += label + '<br>';
// 			has_error = true;
// 		} else {
// 			$(this).parent().removeClass('has-error');
// 		}
// 	});
// 	if (has_error) {
// 		msg = '<b>Please Check the following fields: </b> <br>' + msg;
// 		make_an_alert("#error", msg, '', 'danger');
// 		 window.location = '#progress';
// 	} else {
// 		console.log('formid = ' + formid);
// 		postform('#'+formid, function() {
// 			wait(3000, function() {
// 				has_error = get_header_form_errors(function() {
// 					window.location.href = $('#page').val();
// 				});
// 			});
// 		});
// 	}
//
// });

$('#register-form').submit(function(e) {
	e.preventDefault();
	var formid = $('#register-form').attr('id');
	var msg = '';
	var has_error = false;
	$('.required').each(function() {
		if ($(this).val() === '') {
			$(this).parent().addClass('has-error');
			var label = $(this).parent().children('label').text();
			msg += label + '<br>';
			has_error = true;
		} else {
			$(this).parent().removeClass('has-error');
		}
	});
	if (has_error) {
		msg = '<b>Please Check the following fields: </b> <br>' + msg;
		make_an_alert("#error", msg, '', 'danger');
		 window.location = '#progress';
	} else {
		postform('#' + formid, function() {
			wait(500, function() {
				has_error = get_header_form_errors(function() {
					window.location = '#progress';
					get_new_customerid();
				});
			});

		});
	}

});

function get_new_customerid() {
	console.log(config.urls.json.getbillingcustid);
	$.ajax({
		type: "GET",
		url: config.urls.json.getbillingcustid,
		dataType: "json",
		success: function(json) {
			var custid = json.custid;

			var msg = 'Congrats, your account has been made! Your customer id is ' + custid + '. You will receive an email with a temporary password shortly.';
			make_an_alert('#error', msg, '', 'success');
			swal("Your account has been made!", msg, "success");
		},
		error: function() {
			alert("The billing header JSON File could not be processed correctly.");
		}
	});
}

function get_header_form_errors(callback) {
	console.log(config.urls.json.getbillingcustid);
	$.ajax({
		type: "GET",
		url: config.urls.json.getbillingcustid,
		dataType: "json",
		success: function(json) {
			var err_msg = json.ermes;

			if (err_msg.length > 0 ) {
				make_an_alert('#error', err_msg, '', 'danger');
				window.location = '#progress';
				swal("Error!", err_msg, "error");
			} else {
				callback();
			}
		},
		error: function() {
			alert("The billing header JSON File could not be processed correctly.");
		}
	});
}


function ship_equals_billing_addr() {
	$('input[name=shipto-contact').val($('input[name=bill-contact').val());
	$('input[name=shipto-name').val($('input[name=bill-name').val());
	$('input[name=shipto-address').val($('input[name=bill-address').val());
	$('input[name=shipto-address2').val($('input[name=bill-address2').val());
	$('input[name=shipto-city').val($('input[name=bill-city').val());
	$('select[name=shipto-state').val($('select[name=bill-state').val());
	$('input[name=shipto-zip').val($('input[name=bill-zip').val());
	$('select[name=shipto-country').val($('select[name=bill-country').val());
}

function toggle_payment_type(paytype) {
	$('#payment-type').val(paytype);
	if (paytype == 'cc') {
		$('.credit').removeClass('hidden');
	} else {
		$('.credit').addClass('hidden');
	}
}
