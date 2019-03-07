<div class="row">
	<div class="col-sm-6" id="form-area">
    	<form id="lost-password-form" action="<?php echo $config->pages->account; ?>redir/" method="post">
        	<input type="hidden" name="page" value="<?php echo $config->pages->index; ?>">
            <input type="hidden" name="action" value="forgot-password">
            <p class="help-block">To recover your password fillout the form and we'll email you to recover your password.</p>
            <div class="form-group">
                <label class="control-label" for="email">Email address</label>
                <input type="email" class="form-control required" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label class="control-label" for="maiden-input">What is your mother's Maiden name?</label>
                <input type="text" class="form-control required" id="maiden-input" name="maiden" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="control-label" for="city-input">What city were you born in?</label>
                <input type="text" class="form-control required" name="city" id="city-input" placeholder="City e.g. Minneapolis">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="response" class="hidden">
        	<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				Thank you, you will be emailed shortly with details on how to retrieve your password.	
            </div>
        </div>
    </div>
</div>
<?php $config->scripts->append($config->urls->templates.'scripts/password/forgot-password.js'); ?>
