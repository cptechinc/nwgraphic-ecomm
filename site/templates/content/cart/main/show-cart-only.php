<?php $product_link = $config->pages->products."redir/?action=itempage&id="; ?>
<div class="row form-group">
    <div class="col-xs-12">
        <a tabindex="0" class="btn btn-lg btn-primary" role="button" data-toggle="popover" title="Quick Order" data-placement="bottom" data-html="true" data-content='<?php include 'content/cart/quick-entry.php'; ?>'>Quick Order</a>
        <button type="button" class="btn btn-primary btn-lg " data-toggle="modal" data-target="#item-lookup"><span class="glyphicon glyphicon-search"></span> Search</button> 
    </div>
</div>
<br>

<div class="row visible-lg-block visible-md-block">
	<div class="col-xs-12 form-group">
		<div class="row">
        	<div class="cart-item-header">
            	<div class="col-md-2"><b>Item ID</b></div>
                <div class="col-md-4"><b>Description</b></div>
                <div class="col-xs-6 col-sm-4 col-md-2"><b>Price</b></div>
                <div class="col-xs-6 col-sm-4 col-md-1"><b>Quantity</b></div>
                <div class="col-xs-6 col-sm-4 col-md-1"><b>Ext. Price</b></div>
                <div class="col-xs-12 col-sm-12 col-md-2"></div>
            </div>
        </div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
    	<div class="list-group"> 
        	<?php $cart_items = get_cart(session_id()); ?>
            <?php foreach ($cart_items as $item) : ?>
				<?php if ($item['errormes'] == "Y") : ?>
                	<?php include $config->paths->content.'cart/main/cart-item/invalid-item.php'; ?>
                <?php else : ?>
                	<?php include $config->paths->content.'cart/main/cart-item/valid-item.php'; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-xs-12">
    	<div class="table-responsive">
        	<table class="table table-hover table-condensed">
            	<?php $totals = get_cart_totals(session_id()); ?>
                <?php foreach ($totals as $total) : ?>
                	<?php if ($total['amount'] == 99999.99) { $tot = 'TBD';	} else { $tot = '$ ' . $total['amount']; } ?>
                    <tr>
                        <td class="text-right"><h5><?php echo $total['desc1']; ?></h5></td>
                        <td class="text-right"><h5><strong><?php echo $tot; ?></strong></h5></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>