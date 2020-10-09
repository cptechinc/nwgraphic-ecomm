window.addDashes = function addDashes(f) {
	var r = /(\D+)/g,
		npa = '',
		nxx = '',
		last4 = '';
	f.value = f.value.replace(r, '');
	npa = f.value.substr(0, 3);
	nxx = f.value.substr(3, 3);
	last4 = f.value.substr(6, 4);
	f.value = npa + '-' + nxx + '-' + last4;
}


$('#register-form').submit(function(e) {
	e.preventDefault();
	var form = '#' + $(this).attr('id');
	var message = '';
	var emailmatch = true;
	var form_errors = false;
	missing_inputs = check_for_missing_inputs(form);
	if (missing_inputs) {
		message = get_missing_input_names(form);
	}
	emailmatch = compare_fields('#email', '#email-conf');
	if (!emailmatch) {
		message += '<br>'+'<b>Emails do not match.</b>';
	}
	passwordmatch = compare_fields('#password', '#conf-password');
	if (!passwordmatch) {
		message += '<br>'+'<b>Passwords do not match.</b>';
	}

	var password_nospecial = validate_password_nospecial($('#password').val());
	if (!password_nospecial) {
		$('#password').parent().addClass('has-error');
		message += '<br>'+'<b>Password has special characters.</b>';
	}


	if (missing_inputs || !emailmatch || !password_nospecial) {
		swal({
			title: "Error!",
			text: '<b>Please check the following fields </b>: <br> ' + message,
			type: "error", html: true,
			confirmButtonText: "OK!",
			allowOutsideClick: true,
			confirmButtonColor: '#7F3F98'
		});
	} else {
		postform(form, function() {
			var request = $.getJSON(config.urls.json.login_record, function( json ) {
				if (json.response.validlogin == 'N') {
					swal({
						title: "Error!",
						text: json.response.ermes,
						type: "error", html: true,
						confirmButtonText: "OK!",
						allowOutsideClick: true,
					});
				} else {
					make_an_alert('#response', 'Your registration has been submitted, an email will be sent to you shortly!', 'Success!', 'success');
					$('#response').removeClass('hidden');
					$('#register-form').addClass('animated bounceOut');
				}
			});
		});
	}
});

function validate_password_nospecial(password) {
	var regex = /\W|_/g;
	return regex.test(password) == false;
}

function get_missing_input_names(form) {
	var msg = '';
	$(form + ' .required').each(function() {
		if ($(this).val() === '') {
			$(this).parent().addClass('has-error');
			var label = $(this).parent().children('label').text();
			msg += label + '<br>';
		}
	});
	return msg;
}

function compare_fields(field, fieldconf) {
	if ($(field).val() !== $(fieldconf).val()) {
		return false;
	} else{
		return true;
	}
}
