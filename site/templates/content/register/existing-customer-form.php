<div id="response-top"></div>
<div id="response"></div>



<form id="existing-customer-form" action="<?php echo $config->pages->account.'redir/'; ?>" method="post">
	<input type="hidden" name="action" value="register-existing-customer">
    <input type="hidden" name="user-ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
	<input type="hidden" name="shipid" value="1">
	<div class="row">
		<div class="col-sm-6">
        	<legend>For Assistance call <a href="<?php echo $config->phone800; ?>"><?php echo $config->phone800; ?></a> Ext. 250</legend>
            <div class="form-group">
            	<label for="contact" class="control-label">Contact Name</label> <input type="text" class="form-control required" id="contact" name="contact">
            </div>
            <div class="form-group">
            	<label for="email" class="control-label">Email Address</label> <input type="email" class="form-control required" id="email" name="email">
            </div>
			<p class="help-block"> Don't use special characters, use only numbers and letters</p>
            <div class="form-group">
            	<label for="password" class="control-label">Choose a Password</label> <input type="text" class="form-control required" id="password" name="password">
            </div>
            <div class="form-group"><label for="confirm-password" class="control-label">Confirm Password</label> <input type="text" class="form-control required" id="confirm-password"> </div>

            <legend>Security Questions for your account</legend>
            <div class="form-group">
            	<label for="mmn" class="control-label">Mother's Maiden Name</label> <input type="text" class="form-control required" id="mmn" name="mmn">
            </div>
            <div class="form-group">
            	<label for="born-in" class="control-label">City you were born in</label> <input type="text" class="form-control required" id="born-in" name="born-in">
            </div>
        </div>
        <div class="col-sm-6">
        	<legend>Existing Customer Questions</legend>
            <div class="form-group">
            	<label for="acct-number" class="control-label">Account Number</label> <input type="text" class="form-control required" id="acct-number" name="acct-number">
            </div>
            <div class="form-group">
            	<label for="invoice1" class="control-label">Past Order Invoice #</label> <input type="text" class="form-control required" id="invoice1" name="invoice1">
            </div>
            <div class="form-group">
            	<label for="invoice2" class="control-label">Past Order Invoice 2 #</label> <input type="text" class="form-control required" id="invoice2" name="invoice2">
            </div>
        </div>
	</div>
    <div class="row form-group">
    	<div class="col-xs-12">
            <div class="g-recaptcha" data-sitekey="<?php echo $config->recaptcha['sitekey']; ?>"></div>
            <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $config->recaptcha['lang']; ?>"></script>
        </div>
    </div>
    <div class="row">
    	<div class="col-xs-12">
        	<button type="submit" class="btn btn-success">Register Account</button>
        </div>
    </div>
</form>

<script>
	$('#existing-customer-form').submit(function(e) {
		e.preventDefault();
		var form = "#" + $(this).attr('id');
		var incomplete = false;
		incomplete = has_incomplete_fields(form);
		if (!incomplete) {
			$.post('/store/ajax/json/recaptcha/', $(form).serialize() ).done(function(json) {
				$.each(json, function(index, response) {
					if (response.success == "true") {
						postform(form, function() {
							$.ajax({
								type: "GET",
								url: "/store/ajax/json/get-billing-custid/",
								dataType: "json",
								success: function(json) {
									var validlogin = '';
									var errormsg = '';
									$.each(json, function(index, login) {
										validlogin = login.validlogin;
										errormsg = login.ermes;
									});
									if (validlogin == 'R') {
										make_an_alert('#response', errormsg, '', 'danger');
									} else {
									}
								},
								error: function() {
									alert("The billing header JSON File could not be processed correctly.");
								}
							});
						});
					}
				});
			});
		} else {
			document.getElementById('response-top').focus();
		}
	});



</script>
