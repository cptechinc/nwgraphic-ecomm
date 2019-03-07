<div class="list-group-item cart-item row">
    <div class="col-md-2 col-sm-6 ">
        <div class="form-group">
            <h4><a class="media-heading" href="<?php echo $product_link.urlencode($item['itemid']); ?>"><?php echo $item['itemid']; ?></a></h4>
            <p class="visible-sm-block visible-xs-block"><?php echo $item['desc1'] . ' ' . $item['desc2']; ?></p>
            <p class="visible-sm-block visible-xs-block"><b>Price: </b>$ <?php echo $item['price']; ?></p>
        </div>
    </div>
    <div class="col-md-4 hidden-sm hidden-xs">
    	<div class="form-group">
            <p><?php echo $item['desc1'] . ' ' . $item['desc2']; ?></p>
        </div>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm hidden-xs ">
        <div class="form-group">
            <?php if ($item['price'] != "0.00") : ?>
                <p class="form-control-static">$ <?php echo $item['price']; ?></p>
            <?php else : ?>
                <p class="form-control-static">Call For Price</p>
            <?php endif; ?> 
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-1">
        <div class="form-group">
            <p class="form-control-static"><b class="visible-sm-inline visible-xs-inline">Qty: </b>  <?php echo $item['qty']; ?></p>
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-1 form-group">
        <div>
            <?php if ($item['price'] != "0.00") : ?>
                <p class="form-control-static"><b class="visible-sm-inline visible-xs-inline">Ext. Price: </b>$ <?php echo $item['amount']; ?></p>
            <?php else : ?>
               <p class="form-control-static"><b class="visible-sm-inline visible-xs-inline">Ext. Price: </b> Call For Price</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-2">
        <div class="form-group">
            <p class="form-control-static">	
                 <a tabindex="0" href="#" class="btn btn-block btn-warning" role="button" data-toggle="popover" data-content='<?php include $config->paths->content."cart/main/cart-item/cart-item-popover.php"; ?>' data-placement="top" data-original-title="Edit <?php echo $item['itemid']; ?>">Update</a>
                
            </p>
        </div>
    </div>
 
</div>