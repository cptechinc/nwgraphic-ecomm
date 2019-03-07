$(function() {
	$('#recovery-password-form').submit(function(e) {
        e.preventDefault();
		var form = $(this).attr('id');
		has_missing_inputs = check_for_missing_inputs(form);
		if (has_missing_inputs) {
			make_an_alert('.password-errors', 'There are fields with missing values', '', 'danger');
		} else {
			if ($('#cpass').val() != $('#npass').val()) {
				$('#cpass').parent().addClass('has-error');
				$('#npass').parent().addClass('has-error');
				make_an_alert('.password-errors', 'New and Confirm new passwords do not match.', '', 'danger');
			} else {
				postform('#recovery-password-form', function() {
					wait(1000, function() {
						get_password_error_messages();
					});
				});
			}
		}

    });
});

function get_password_error_messages() {
	$.getJSON(config.urls.json.login_record, function( json ) {
		if ($.trim(json.response.validlogin) == 'N') {
			var errmsg = json.response.login.ermes;
			if (errmsg === 'Invalid Password Info') {
				errmsg = 'One or more of your answers is invalid, please check and resubmit';
				$('<div id="login-errors"></div>').prependTo('#recovery-password-form');
				make_an_alert('#login-errors', errmsg, '', 'danger');
			} else if (errmsg === 'SendEmail') {
				$('#recovery-password-form').addClass('animated bounceOut');
				wait(1000, function() {
					$('#recovery-password-form').addClass('hidden');
					$('#response').removeClass('hidden').addClass('animated bounceIn');
				});

			} else if (errmsg === 'N') {
				errmsg = 'Your Email / Password was not recognized.';
				$('<div id="login-errors"></div>').prependTo('#recovery-password-form');
				make_an_alert('#login-errors', errmsg, '', 'danger');
			} else if (errmsg === 'Bad Password') {
				errmsg = 'Your Password was not recognized.';
				$('<div id="login-errors"></div>').prependTo('#recovery-password-form');
				make_an_alert('#login-errors', errmsg, '', 'danger');
			}
		} else {
			wait(1000, function() {
				$('#recovery-password-form').addClass('hidden');
				$('#response').removeClass('hidden').addClass('animated bounceIn');
			});
		}
	});
}
