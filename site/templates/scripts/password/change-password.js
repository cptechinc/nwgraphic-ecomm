$(function() {
	$('#change-password-form').submit(function(e) {
        e.preventDefault();
		var form = $(this).attr('id');
		has_missing_inputs = check_for_missing_inputs(form);
		if (has_missing_inputs) {

		} else {
			if ($('#new-password').val() == $('#confirm').val()) {
				postform('#change-password-form', function() {
					wait(1000, function() {
						get_password_error_messages();
					});
				});

				$('#new-password').parent().removeClass('has-error');
				$('#confirm').parent().removeClass('has-error');
			} else {
				$('#new-password').parent().addClass('has-error');
				$('#confirm').parent().addClass('has-error');
				console.log($('#new-password').val());
				console.log($('#confirm').val());

				err_msg = 'The new passwords do not match';
				$('<div id="password-errors"></div>').prependTo('#change-password-form');
				make_an_alert('#password-errors', err_msg, '', 'danger');
			}


		}

    });
});

function get_password_error_messages() {

	$.getJSON(config.urls.json.login_record, function( json ) {
		if ($.trim(json.response.validlogin) == 'N') {
			var errmsg = json.response.ermes;
			if (errmsg === 'Invalid Password Info') {
				errmsg = 'One or more of your answers is invalid, please check and resubmit';
				$('<div id="login-errors"></div>').prependTo('#change-password-form');
				make_an_alert('#login-errors', errmsg, '', 'danger');
			} else if (errmsg === 'SendEmail') {
				$('#change-password-form').addClass('animated bounceOut');
				wait(1000, function() {
					$('#change-password-form').addClass('hidden');
					$('#response').removeClass('hidden').addClass('animated bounceIn');
				});

			} else if (errmsg === 'N') {
				errmsg = 'Your Email / Password was not recognized.';
				$('<div id="login-errors"></div>').prependTo('#change-password-form');
				make_an_alert('#login-errors', errmsg, '', 'danger');
			} else if (errmsg === 'Bad Password') {
				errmsg = 'Your Password was not recognized.';
				$('<div id="login-errors"></div>').prependTo('#change-password-form');
				make_an_alert('#login-errors', errmsg, '', 'danger');
			}
		} else {
			wait(1000, function() {
				$('#change-password-form').addClass('hidden');
				$('#response').removeClass('hidden').addClass('animated bounceIn');
			});
		}

	});

}
