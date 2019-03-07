 <?php $card_display = 'x'.substr($billing['cc'], -4); ?>

<?php if (strlen($billing['cc']) > 0) : ?>
<div class="row credit hidden">
	<div class="col-sm-5">
    	<div class="checkbox">
        	<label> 
            	<input type="checkbox" name="use-provided-card" id="use-provided-card" value="Y" checked>  
                Use <?php echo $card_display; ?> (<?php echo $billing['expirdate']; ?>) card.  
            </label>
            <input type="hidden" name="provided-card" id="use-provided-card-value" value="<?php echo $billing['cc']; ?>"> 
            <input type="hidden" name="provided-card-type"> 
            <img src="<?php echo $config->urls->files .'images/payment/'.$billing['paymenttype'].'.png'; ?>" id="p-visa-image" class="card2">
        </div>
    </div>
    <div class="col-sm-7">
        <div class="form-group">
            <label class="provided-card-image">&nbsp; </label>
            <p> &nbsp;	
            </p>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-xs-12">
    	<h3 class="text-center">--- OR ---</h3>
    </div>
</div>
<?php endif; ?>

<div class="row credit hidden">
    <div class="col-sm-5">
        <div class="form-group" id="creditcard-num">
            <label for="card-number" class="control-label">CARD NUMBER </label>
            <div class="input-group">
                <input type="tel" class="form-control" name="cardnumber" autocomplete="cc-number" id="ccno" placeholder="Valid Card Number" autocomplete="cc-number" value="">
                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
            </div>
            <input type="hidden" name="card-type" id="card-type" value="">
        </div>
    </div>
    <div class="col-sm-7">
        <div class="form-group">
            <label class="payment-errors">&nbsp; </label>
            <p> <img src="<?php echo $config->urls->files .'images/payment/visa.png'; ?>" id="visa-image" class="card">&nbsp;
            	<img src="<?php echo $config->urls->files .'images/payment/discover.png'; ?>" id="discover-image" class="card">&nbsp;
            	<img src="<?php echo $config->urls->files .'images/payment/mastercard.png'; ?>" id="mastercard-image" class="card">&nbsp;
            	<img src="<?php echo $config->urls->files .'images/payment/amex.png'; ?>" id="amex-image" class="card">&nbsp; 	</p>
        </div>
    </div>
</div>
<div class="row credit hidden">
    <div class="col-sm-5 col-xs-7">
        <div class="form-group" id="exp-date">
            <label for="cardExpiry" class="control-label" ><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE MM / YYYY</label>
            <input type="tel" class="form-control" name="expdate" placeholder="MM / YYYY" autocomplete="cc-exp">
        </div>
    </div>
    <div class="col-sm-3 col-xs-5 pull-right">
        <div class="form-group">
            <label for="cardCVC">CV CODE</label>
            <input type="tel" class="form-control text-right" name="cvc" placeholder="CVC" autocomplete="cc-csc">
        </div>
    </div>
</div>