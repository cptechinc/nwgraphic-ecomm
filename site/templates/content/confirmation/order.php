<legend>Order</legend>
<div class="form-group">
	<label class="control-label">Phone</label> <p class="form-control-static"><?php echo $billing['phone']; ?></p>
</div>
<div class="form-group">
	<label class="control-label">Email</label> <p class="form-control-static"><?php echo $billing['email']; ?></p>
</div>
<div class="form-group">
	<label class="control-label">Purchase Order Number</label> <p class="form-control-static"><?php echo $billing['pono']; ?></p>
</div>
<div class="form-group">
	<label class="control-label">Ship Method</label>
	<?php $shipvias = get_shipvias(session_id()); ?>
    <?php foreach ($shipvias as $shipvia) : ?>
        <?php if ($billing['shipmeth'] == $shipvia['code']) : ?>
        	<p class="form-control-static"><?php echo $shipvia['via']; ?></p>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<div class="form-group">
	<label>Payment Method</label>
    <?php if ($billing['termtype'] == 'STD' && $billing['paymenttype'] == 'bill') : ?>
    	<p class="form-control-static">Bill To Account</p>
    <?php elseif ($billing['paymenttype'] != '' || $billing['paymenttype'] != 'bill') : ?>
    	<p class="form-control-static">Credit Card</p>
    <?php endif; ?>
</div>
<?php if ($billing['paymenttype'] != 'bill') : ?>
    <div class="row credit">
        <div class="col-sm-7">
             <div class="form-group" id="creditcard-num">
                <label for="card-number" class="control-label">Card Information</label>
				<?php $card_display = 'x'.substr($billing['cc'], -4); ?>
                <p>
                    <img src="<?php echo $config->urls->files .'images/payment/visa.png'; ?>" id="visa-image" class="card">&nbsp;
                    <img src="<?php echo $config->urls->files .'images/payment/discover.png'; ?>" id="discover-image" class="card">&nbsp;
                    <img src="<?php echo $config->urls->files .'images/payment/mastercard.png'; ?>" id="mastercard-image" class="card">&nbsp;
                    <img src="<?php echo $config->urls->files .'images/payment/amex.png'; ?>" id="amex-image" class="card">&nbsp;
                    <span class="text-right"><span id="card-name"></span><?php echo $card_display; ?></span>
                </p>
                <input type="tel" class="form-control hidden" name="card-number" id="ccno" autocomplete="cc-number" value="<?php echo $billing['cc']; ?>">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label>Expiration Date</label>
                <p class="form-control-static"><?php echo $billing['expirdate']; ?></p>
            </div>
        </div>
    </div>
    <div class="row credit hidden">
        <div class="col-xs-7">
            <div class="form-group" id="exp-date">
                <label for="cardExpiry" class="control-label" ><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                <input type="tel" class="form-control" name="card-exp" placeholder="MM / YY" autocomplete="cc-exp" value="<?php echo $billing['expirdate']; ?>">
            </div>
        </div>
        <div class="col-xs-5 pull-right">
            <div class="form-group">
                <label for="cardCVC">CV CODE</label>
                <input type="tel" class="form-control" name="card-cvc" placeholder="CVC" autocomplete="cc-csc" value="<?php echo $billing['vc']; ?>">
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="form-group">
	<label>Ship Complete</label>
    <div class="checkbox">
        <?php if ($billing['shipcom'] == 'Y') : ?>
            <span class="glyphicon glyphicon-check"></span> Ship Complete
        <?php else : ?>
            <span class="glyphicon glyphicon-unchecked"></span> Ship Complete
        <?php endif; ?>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Special Instructions</label>
    <?php if (strlen($billing['note'] > 0)) : ?>
    	<p class="form-control-static"><?php echo $billing['note']; ?></p>
    <?php else : ?>
    	<p class="form-control-static">No Special Instructions were given</p>
    <?php endif; ?>
</div>

