<legend>Ship-To</legend>
<div class="form-group">
  	<label class="control-label">Ship-To Contact</label> <p class="form-control-static"><?php echo $billing['sname']; ?></p>
</div>
<div class="form-group">
  	<label class="control-label">Ship-To Name</label> <p class="form-control-static"><?php echo $billing['sconame']; ?></p>
</div>
<div class="form-group">
  <label class="control-label">Address</label> <p class="form-control-static"><?php echo $billing['saddress']; ?></p>
</div> 
<?php if (strlen($billing['saddress2']) > 0) : ?>
    <div class="form-group">
    	<label class="control-label">Address 2</label> <p class="form-control-static"><?php echo $billing['saddress2']; ?></p>
    </div> 
<?php endif; ?>
<div class="row form-group">
    <div class="col-xs-6">
    	<label class="control-label">City</label> <p class="form-control-static"><?php echo $billing['scity']; ?></p>
    </div>
    <div class="col-xs-3">
      	<label class="control-label">State</label><p class="form-control-static"><?php echo $billing['sst']; ?></p>
    </div>
    <div class="col-xs-3">
   		<div class="form-group">
      		<label class="control-label">Zip</label> <p class="form-control-static"><?php echo $billing['szip']; ?></p>
      	</div>
    </div>	
</div>
<div class="form-group">
	<label class="control-label">Country</label><p class="form-control-static"><?php echo $billing['scountry']; ?></p>
</div>