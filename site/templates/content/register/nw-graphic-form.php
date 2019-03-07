<?php error_reporting( error_reporting() & ~E_NOTICE ); ?>
<div class="row">
    <div class="col-xs-12">
        <div id="response" class="hidden">

        </div>
    </div>
</div>

<form id="register-form" action="<?php echo $config->pages->account; ?>redir/" method="post">
    <input type="hidden" name="page" value="<?php echo $config->pages->index; ?>">
    <input type="hidden" name="action" value="register-new-account">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label" for="email">Email address</label>
                <input type="email" class="form-control required" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label class="control-label" for="email-conf">Confirm Email</label>
                <input type="email" class="form-control required" id="email-conf" placeholder="Confirm email">
            </div>
            <p class="help-block"> Enter and Confirm your password  </p>
            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" class="form-control required" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Confirm Password</label>
                <input type="password" class="form-control required" id="conf-password" placeholder="Password">
            </div>
            <p class="help-block"> The following two questions will are for password recovery </p>
            <div class="form-group">
                <label class="control-label" for="city-input">What city were you born in?</label>
                <input type="text" class="form-control required" name="cityborn" id="city-input" placeholder="City e.g. Minneapolis">
            </div>
            <div class="form-group">
                <label class="control-label" for="maiden-name">Mother's Maiden Name?</label>
                <input type="text" class="form-control required" name="mmn" id="maiden-name" placeholder="Example: Johnson">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label" for="contact">Contact Name</label>
                <input type="text" class="form-control required" id="contact" name="contact" placeholder="Contact Name">
            </div>
            <div class="form-group">
                <label class="control-label" for="company">Company Name</label>
                <input type="text" class="form-control" id="company" name="company" placeholder="Company">
            </div>
            <p class="help-block">
                The following questions are for shipping and billing information
            </p>
            <div class="form-group">
                <label class="control-label">Address</label> <input class="form-control required" name="address">
            </div>
            <div class="form-group">
                <label class="control-label">Address 2</label> <input class="form-control" name="address2">
            </div>
            <div class="form-group">
                <label class="control-label">Country</label>
                <select name="country" class="form-control required" onChange="showhidestates(this.value, 'bill')">
                    <option value="n/a">Choose</option>
                    <option value="USA">United States</option>
                    <?php $countries = get_countries(); ?>
                    <?php foreach ($countries as $country) : ?>
                        <?php if ($billing['bcountry'] == $country['name'] || $billing['bcountry'] == $country['ccode']) : ?>
                            <option value="<?php echo $country['ccode']; ?>" selected><?php echo $country['name']; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $country['ccode']; ?>"><?php echo $country['name']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label class="control-label">City</label> <input class="form-control required" name="city" value="<?php echo $billing['bcity']; ?>">
                </div>
                <div class="col-sm-3 form-group">
                    <label class="control-label bill-state-label">State</label>
                    <select name="state" class="form-control required">
                        <option value="">Choose </option>
                        <option value="OU">Outside U.S / Canada </option>
                        <optgroup label="USA" class="bill-USA">
                        	<?php $states = get_countrystates('USA', false); ?>
                        	<?php foreach ($states as $state) : ?>
                        		<?php if ($billing['bst'] == $state['abbreviation']) : ?>
                        			<option value="<?php echo $state['abbreviation']; ?>" selected><?php echo $state['name']; ?></option>
                        		<?php else : ?>
                        			<option value="<?php echo $state['abbreviation']; ?>"><?php echo $state['name']; ?></option>
                        		<?php endif; ?>
                        	<?php endforeach; ?>
                        </optgroup>
                        <optgroup label="Canada" class="bill-CAN">
                        	<?php $provinces = get_countrystates('Canada', false); ?>
                        	<?php foreach ($provinces as $province) : ?>
                        		<?php if ($billing['bst'] == $province['abbreviation']) : ?>
                        			<option value="<?php echo $province['abbreviation']; ?>" selected><?php echo $province['name']; ?></option>
                        		<?php else : ?>
                        			<option value="<?php echo $province['abbreviation']; ?>"><?php echo $province['name']; ?></option>
                        		<?php endif; ?>
                        	<?php endforeach; ?>
                        </optgroup>
                    </select>
                </div>
                <div class="col-sm-3 form-group">
                  <div class="form-group">
                      <label class="control-label">Zip</label> <input class="form-control required" name="bill-zip" value="<?php echo $billing['bzip']; ?>">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="phone">Phone Number</label>
                        <input type="text" class="form-control required" id="phone" name="phone" onKeyup='addDashes(this)' placeholder="952-888-1888">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
