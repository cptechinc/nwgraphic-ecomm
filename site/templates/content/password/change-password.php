<div class="row">
	<div class="col-sm-6" id="form-area">
    	<form id="change-password-form" action="<?php echo $config->pages->account; ?>redir/" method="post">
        	<input type="hidden" name="page" value="redir/catch.php">
            <input type="hidden" name="action" value="change-password">
            <p class="help-block">To change your password you must confirm your current login</p>
            <div class="form-group">
                <label class="control-label" for="email">Email address</label>
                <input type="email" class="form-control required" id="email" name="email" placeholder="Email" value="<?php echo $user->email; ?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="current-password">Current Password</label>
                <input type="password" class="form-control required" id="current-password" name="current-password" placeholder="Password">
            </div>
            <p class="help-block">New password can not exceed 20 characters</p>
			<p class="help-block"> Don't use special characters, use only numbers and letters</p>
            <div class="form-group">
                <label class="control-label" for="city-input">New Password</label>
                <input type="password" class="form-control required" name="new-password" id="new-password" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="control-label" for="city-input">Confirm Password</label>
                <input type="password" class="form-control required" name="conf" id="confirm" placeholder="Confirm password">
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
<?php $config->scripts->append($config->urls->templates.'scripts/password/change-password.js'); ?>
