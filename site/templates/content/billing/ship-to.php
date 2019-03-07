<legend>Ship-To</legend>
<?php if ($user->loggedin) : ?>
    <div class="form-group">
        <label class="control-label">Ship-To</label>
        <select class="form-control required" name="shipto-id" onChange="get_shipto_info(this.value)">
            <?php $shiptos = get_shiptos(session_id()); ?>
            <?php foreach ($shiptos as $shipto) : ?>
                <option value="<?php echo $shipto['shiptoid']; ?>">
					<?php echo $shipto['shiptoid'] .' - '. $shipto['saddress'] .' '. $shipto['scity'] .' '. $shipto['sst']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
<?php endif; ?>
<div class="form-group">
	<label class="control-label">Ship-To Contact</label>
    <input type="text" class="form-control required" name="shipto-contact" value="<?php echo $billing['sname']; ?>">
</div>
<div class="form-group">
  	<label class="control-label">Ship-To Name</label>
    <input type="text" class="form-control required" name="shipto-name" value="<?php echo $billing['sconame']; ?>">
</div>
<div class="form-group">
  	<label class="control-label">Address</label>
    <input type="text" class="form-control required"  name="shipto-address" value="<?php echo $billing['saddress']; ?>">
</div>
<div class="form-group">
  	<label class="control-label">Address 2</label>
    <input type="text" class="form-control" name="shipto-address2" value="<?php echo $billing['saddress2']; ?>">
</div>
<div class="form-group">
  <label class="control-label">Country</label>
  <select name="shipto-country" class="form-control required" onChange="showhidestates(this.value, 'ship')">
      <option value="n/a">Choose</option>
      <option value="USA">United States</option>
      <?php $countries = get_countries(); ?>
      <?php foreach ($countries as $country) : ?>
          <?php if ($billing['scountry'] == $country['name'] || $billing['scountry'] == $country['ccode']) : ?>
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
        <input type="text" class="form-control required" name="shipto-city" value="<?php echo $billing['scity']; ?>">
    </div>
    <div class="col-sm-3">
      	<label class="control-label">State</label>
        <select name="shipto-state" class="form-control required">
          <option value="">Choose </option>
        <option value="OU">Outside U.S / Canada </option>
          <optgroup label="USA" class="ship-USA">
              <?php $states = get_countrystates('USA', false); ?>
              <?php foreach ($states as $state) : ?>
                  <?php if ($billing['bst'] == $state['abbreviation']) : ?>
                      <option value="<?php echo $state['abbreviation']; ?>" selected><?php echo $state['name']; ?></option>
                  <?php else : ?>
                      <option value="<?php echo $state['abbreviation']; ?>"><?php echo $state['name']; ?></option>
                  <?php endif; ?>
              <?php endforeach; ?>
          </optgroup>
          <optgroup label="Canada" class="ship-CAN">
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
            <input type="text" class="form-control required" name="shipto-zip" value="<?php echo $billing['szip']; ?>">
      	</div>
    </div>
</div>
