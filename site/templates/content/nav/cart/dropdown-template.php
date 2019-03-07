<ul class="dropdown-menu dropdown-cart" id="dropdown-cart" role="menu">
	<?php $cart_count = get_cart_count(session_id()); ?>
    <?php if ($cart_count > 0 ) : ?>
    	<?php $total_cost = 0; ?>
        <?php $cart = get_cart(session_id()); ?>
        <?php foreach ($cart as $item) : ?>
        	<li>
            	<div class="item">
                	<div><?php echo $item['itemid']; ?> - <?php echo $item['desc1']; ?> </div>
                    <div class="text-right"><?php echo $item['qty']; ?> x $ <?php echo $item['price'] . ' / ' . $item['uomdesc']; ?></div>
                </div>  
            </li>
        <?php endforeach; ?>
    <?php else : ?>
    	<li>
        	<div class="item">There are no items in the cart.</div>
        </li>
    <?php endif; ?>
    <li class="divider" id="cart-divider"></li>
  <li><a class="text-center" href="<?php echo $config->pages->cart; ?>">View Cart</a></li>
</ul>