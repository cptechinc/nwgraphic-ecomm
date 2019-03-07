<legend>Bill-To</legend>
<div class="form-group">
	<label class="control-label">Bill-To Contact</label>
    <input type="hidden" name="custid" id="custID" value="<?php echo $billing['custid']; ?>">
    <input class="form-control required" name="bill-contact" value="<?php echo $billing['bname']; ?>">
</div>
<div class="form-group">
	<label class="control-label">Bill-To Name</label>
    <input class="form-control required" name="bill-name" value="<?php echo $billing['bconame']; ?>">
</div>
<div class="form-group">
	<label class="control-label">Address</label>
    <input class="form-control required" name="bill-address" value="<?php echo $billing['baddress']; ?>">
</div>
<div class="form-group">
	<label class="control-label">Address 2</label>
    <input class="form-control" name="bill-address2" value="<?php echo $billing['baddress2']; ?>">
</div>
<div class="form-group">
	<label class="control-label">Country</label>
	<select name="bill-country" class="form-control required" onChange="showhidestates(this.value, 'bill')">
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
    	<label class="control-label">City</label>
        <input class="form-control" name="bill-city" value="<?php echo $billing['bcity']; ?>">
    </div>
    <div class="col-sm-3">
    	<label class="control-label">State</label>
		<select name="bill-state" class="form-control required">
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
    <div class="col-sm-3">
      <div class="form-group">
          <label class="control-label">Zip</label>
          <input class="form-control required" name="bill-zip" value="<?php echo $billing['bzip']; ?>">
      </div>
    </div>
</div>
