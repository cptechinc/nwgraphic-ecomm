<legend>Ship-To</legend>
<?php if ($user->loggedin) : ?>
    <div class="form-group">
        <label class="control-label">Ship-To</label>
        <select class="form-control required" name="shipto-id" id="shiptoid" onChange="get_shipto_info(this.value)">
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
	<label class="control-label">Ship-To Contact <span class="text-danger">*</span></label>
    <input type="text" class="form-control required" name="shipto-contact" id="shiptocontact" value="<?php echo $billing['sname']; ?>">
</div>
<div class="form-group">
  	<label class="control-label">Ship-To Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control required" name="shipto-name" id="shiptoname" value="<?php echo $billing['sconame']; ?>">
</div>
<div class="form-group">
  	<label class="control-label">Address <span class="text-danger">*</span></label>
    <input type="text" class="form-control required"  name="shipto-address" id="shiptoaddress" value="<?php echo $billing['saddress']; ?>">
</div>
<div class="form-group">
  	<label class="control-label">Address 2</label>
    <input type="text" class="form-control" name="shipto-address2" id="shiptoaddress2" value="<?php echo $billing['saddress2']; ?>">
</div>
<div class="form-group">
  <label class="control-label">Country <span class="text-danger">*</span></label>
  <select name="shipto-country" class="form-control required" id="shiptocountry" onChange="showhidestates(this.value, 'ship')">
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
      	<label class="control-label">City <span class="text-danger">*</span></label>
        <input type="text" class="form-control required" name="shipto-city" id="shiptocity" value="<?php echo $billing['scity']; ?>">
    </div>
    <div class="col-sm-3">
      	<label class="control-label">State <span class="text-danger">*</span></label>
        <select name="shipto-state" class="form-control required" id="shiptostate">
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
      		<label class="control-label">Zip <span class="text-danger">*</span></label>
            <input type="text" class="form-control required" id="shiptozip" name="shipto-zip" value="<?php echo $billing['szip']; ?>">
      	</div>
    </div>
</div>
