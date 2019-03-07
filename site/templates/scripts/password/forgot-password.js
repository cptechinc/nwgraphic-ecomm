$(function() {
	$('#lost-password-form').submit(function(e) {
        e.preventDefault();
		var form = $(this).attr('id');
		has_missing_inputs = check_for_missing_inputs(form);
		if (has_missing_inputs) {

		} else {
			postform('#lost-password-form', function() {
				wait(1000, function() {
					get_password_error_messages();
				});
			});
		}

    });
});

function get_password_error_messages() {
	$.getJSON(config.urls.json.login_record, function( json ) {
		if ($.trim(json.response.validlogin) == 'N') {
			var errmsg = json.response.ermes;
			if (errmsg === 'Invalid Password Info') {
				errmsg = 'One or more of your answers is invalid, please check and resubmit';
				$('<div id="password-errors"></div>').prependTo('#lost-password-form');
				make_an_alert('#password-errors', errmsg, '', 'danger');
			} else if (errmsg === 'SendEmail') {
				$('#lost-password-form').addClass('animated bounceOut');
				wait(1000, function() {
					$('#lost-password-form').addClass('hidden');
					$('#response').removeClass('hidden').addClass('animated bounceIn');
				})
			}
		} else {
			$('#lost-password-form').addClass('animated bounceOut');
			wait(1000, function() {
				$('#lost-password-form').addClass('hidden');
				$('#response').removeClass('hidden').addClass('animated bounceIn');
			});
		}
	});

}
