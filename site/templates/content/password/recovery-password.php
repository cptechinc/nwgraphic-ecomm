<div class="row">
	<div class="col-sm-6" id="form-area">
    	<div class="password-errors"> </div>
    	<form id="recovery-password-form" action="<?php echo $config->pages->account; ?>redir/" method="post">
        	<input type="hidden" name="page" value="<?php echo $config->pages->index; ?>">
            <input type="hidden" name="action" value="set-up-recovery">
            <p class="help-block">
            	This is your first time logging in. You must change your password and answer the two safety questions. Password can't exceed 10 characters
            </p>
            <div class="form-group">
                <label class="control-label" for="email">Email address</label>
                <input type="email" class="form-control required" id="email" name="email" value="<?php echo $user->email; ?>" placeholder="Email">
            </div>
            <div class="form-group">
                <label class="control-label" for="email">Current Password</label>
                <input type="password" class="form-control required" id="email" name="pass" placeholder="New Password">
            </div>
            <div class="form-group">
                <label class="control-label" for="email">New Password</label>
                <input type="password" class="form-control required" id="npass" name="npass" placeholder="New Password">
            </div>
            <div class="form-group">
                <label class="control-label" for="email">Confirm New Password</label>
                <input type="password" class="form-control required" id="cpass" name="cpass" placeholder="Confirm Password">
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
				Password change was successful. You will be sent an email confirming your request for password change.
            </div>
        </div>
    </div>
</div>
<?php $config->scripts->append($config->urls->templates.'scripts/password/recovery-password.js'); ?>