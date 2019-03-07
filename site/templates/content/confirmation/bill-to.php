<legend>Bill-To</legend>
<div class="form-group">
	<label class="control-label">Bill-To Contact</label>
    <p class="form-control-static"><?php echo $billing['bname']; ?></p>
</div>
<div class="form-group">
	<label class="control-label">Bill-To Name</label>
    <p class="form-control-static"><?php echo $billing['bconame']; ?></p>
</div>
<div class="form-group">
	<label class="control-label">Address</label> <p class="form-control-static"><?php echo $billing['baddress']; ?></p>
</div>
<?php if (strlen($billing['baddress2']) > 0) : ?>
    <div class="form-group">
        <label class="control-label">Address 2</label> <p class="form-control-static"><?php echo $billing['baddress2']; ?></p>
    </div>
<?php endif; ?>
<div class="row form-group">
	<div class="col-xs-6">
    	<label class="control-label">City</label> <p class="form-control-static"><?php echo $billing['bcity']; ?></p>
    </div>
    <div class="col-xs-3">
    	<label class="control-label">State</label> <p class="form-control-static"><?php echo $billing['bst'];?></p>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
          <label class="control-label">Zip</label> <p class="form-control-static"><?php echo $billing['bzip']; ?></p>
      </div>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Country</label> <p class="form-control-static"><?php echo $billing['bcountry']; ?></p>
</div>