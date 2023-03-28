<?php error_reporting( error_reporting() & ~E_NOTICE ); ?>
<?php if ($user->loggedin === false) : ?>
	<div class="alert alert-info" role="alert">
		An account will be created for you when you complete this order.
	</div>
<?php endif; ?>
<form id="<?= $user->isLoggedin() ? '' : 'billing'; ?>-form" action="<?php echo $config->pages->billing."redir/"; ?>" method="post">
	<input type="hidden" name="action" value="submit-billing-form">
	<input type="hidden" name="page" id="page" value="<?php echo $config->pages->confirmation; ?>">
	<?php include $config->paths->content.'billing/billing-logic.php'; ?>

	<div class="row">
    	<div class="col-xs-12">
             <?php include $config->paths->content.'billing/billing-steps.php'; ?>
        </div>
    </div>
    <?php include $config->paths->content.'billing/billing-errors.php'; ?>
	<legend>
		All Required Fields are Marked with <span class="text-danger">*</span>
	</legend>
    <div class="row">
        <div class="col-sm-6">
            <?php include $config->paths->content.'billing/bill-to.php'; ?>
            <!-- <div class="row">
            	<div class="col-xs-12">
                	<div class="form-group">
                    	<button type="button" onClick="ship_equals_billing_addr();" class="btn btn-primary btn-block">Make Ship-To Address same as Bill-To Address</button>
                    </div>
                </div>
            </div> -->
            <?php include $config->paths->content.'billing/ship-to.php'; ?>
        </div>
        <div class="col-sm-6">
        	<?php include $config->paths->content.'billing/order.php'; ?>
        </div>
    </div>
    <div class="row">
    	<div class="col-xs-6"></div>
        <div class="col-xs-6"><button type="submit" class="btn btn-success btn-block">Continue</button></div>
    </div>
    <div class="text-center">
    	<!-- (c) 2005, 2017. Authorize.Net is a registered trademark of CyberSource Corporation -->
	<div class="AuthorizeNetSeal">
		<script type="text/javascript" language="javascript">var ANS_customer_id="c3d9919f-550f-443c-be7c-9ed96331b082";</script>
		<script type="text/javascript" language="javascript" src="//verify.authorize.net/anetseal/seal.js" ></script>
		<a href="http://www.authorize.net/" id="AuthorizeNetText" target="_blank">Payment Processing</a>
	</div>
    </div>
</form>
