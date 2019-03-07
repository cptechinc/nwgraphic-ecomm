<?php error_reporting( error_reporting() & ~E_NOTICE ); ?>
<?php include $config->paths->content.'billing/billing-logic.php'; @TODO ?> 
<form method="post" action="../redir/" id="register-form">
    <input type="hidden" name="action" value="register-for-account">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1"> <div id="error"></div> </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <legend>Customer Billing Information</legend>
            <?php include $config->paths->content.'billing/bill-to.php';  ?>
        </div>
        <div class="col-sm-6">
            <legend>Customer Shipping Information</legend>
            <div class="form-group">
                <button type="button" class="btn btn-primary btn-block" onClick="ship_equals_billing_addr()">Make Shipping Address Same as Billing Address</button>
            </div>
            <?php include $config->paths->content.'billing/ship-to.php';?>
            
            <legend>Primary Contact Information</legend>
            <div class="form-group">
                <label class="control-label">Phone</label>
                <input type="text" class="form-control required" name="phone" value="<?php echo $billing['phone']; ?>">
            </div>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input type="text" class="form-control required" name="email" value="<?php echo $billing['email']; ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>
    
