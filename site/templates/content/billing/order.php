<legend>Order</legend>
<div class="form-group">
	<label class="control-label">Phone</label>
    <input type="text" class="form-control <?php echo show_requirements('phone'); ?>" name="phone" value="<?php echo $billing['phone']; ?>">
</div>
<div class="form-group">
	<label class="control-label">Email</label>
    <input type="text" class="form-control <?php echo show_requirements('email'); ?>" name="email" value="<?php echo $billing['email']; ?>">
</div>
<div class="form-group">
	<label class="control-label">Purchase Order Number</label>
    <input type="text" class="form-control <?php echo show_requirements('po-num'); ?>" name="pon" value="<?php echo $billing['pono']; ?>">
</div>
<div class="form-group">
	<label class="control-label">Ship Method</label>
    <select name="shipvia" class="form-control <?php echo show_requirements('shipvia'); ?>">
    	<?php $shipvias = get_shipvias(session_id()); ?>
        <?php foreach ($shipvias as $shipvia) : ?>
        	<?php if ($billing['shipmeth'] == $shipvia['code']) : ?>
            		<option value="<?php echo $shipvia['code']; ?>" selected><?php echo $shipvia['via']; ?></option>
                <?php else : ?>
                	<option value="<?php echo $shipvia['code']; ?>"><?php echo $shipvia['via']; ?></option>
                <?php endif; ?>
        <?php endforeach; ?>
    </select>
</div>
<?php if ($billing['termtype'] == 'STD') : ?>
	 <div class="form-group">
        <label class="control-label">Payment Method</label>
        <select name="payment-method" class="form-control" onChange="toggle_payment_type(this.value)">
            <option value="bill">Bill to Account</option>
            <option value="cc">Credit Card</option>
        </select>
    </div>
   <?php include 'content/billing/credit-card-info.php'; ?>
<?php else : ?>
	 <div class="form-group hidden">
        <label class="control-label">Payment Method</label>
        <select name="payment-method" class="form-control" onChange="toggle_payment_type(this.value)">
            <option value="bill">Bill to Account</option>
            <option value="cc">Credit Card</option>
        </select>
    </div>
	<?php include 'content/billing/credit-card-info.php'; ?>
<?php endif; ?>

<div class="checkbox">
	<?php if ($billing['shipcom'] == 'Y') : ?>
  		<label class="control-label"><input type="checkbox" value="Y" name="ship-complete" checked>Ship Complete</label>
    <?php else : ?>
    	<label class="control-label"><input type="checkbox" value="Y" name="ship-complete">Ship Complete</label>
  	<?php endif; ?>
</div>
<div class="form-group">
	<label class="control-label">Special Instructions</label>
    <textarea class="form-control" name="note"><?php echo $billing['note']; ?></textarea>
</div>

