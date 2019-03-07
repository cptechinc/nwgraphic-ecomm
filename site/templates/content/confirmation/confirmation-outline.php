<ul class="nav nav-tabs nav_tabs">
    <li class="active"><a href="#billing-shipping" data-toggle="tab" id="billing-shipping-btn">Billing / Shipping</a></li>
    <li><a href="#cart" data-toggle="tab">View Cart</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade in active" id="billing-shipping">
        <section class="product-info"><br>
        	<?php include $config->paths->content.'billing/billing-logic.php'; ?>
            <div class="row"> <div class="col-xs-12"> <?php include $config->paths->content.'billing/billing-steps.php'; ?> </div> </div>
            <div class="row"> <div class="col-xs-12"> <a href="<?php echo $config->pages->billing; ?>" class="btn btn-warning btn-block">Edit Billing / Shipping</a></div> </div>
            <div class="clearfix"></div><br>
            <div class="row">
                <div class="col-sm-6">
                    <?php include $config->paths->content.'confirmation/bill-to.php'; ?>
                    <?php include $config->paths->content.'confirmation/ship-to.php'; ?>
                </div>
                <div class="col-sm-6">
                    <?php include $config->paths->content.'confirmation/order.php'; ?>
                </div>
            </div>
        </section>		  
    </div>
    <div class="tab-pane fade" id="cart">
        <section><br>
        	<?php include $config->paths->content.'cart/main/show-cart-only.php'; ?>
        </section>
    </div>
    <br>
</div>
<div class="row"> <div class="col-xs-12"> <a href="<?php echo $config->pages->billing; ?>" class="btn btn-warning btn-block">Edit Billing / Shipping</a><br></div> </div>
<div class="row"> <div class="col-xs-12"> <a href="<?php echo $config->pages->billing; ?>redir/?action=confirm-order" class="btn btn-success btn-block">Confirm and Post Order</a></div> </div>