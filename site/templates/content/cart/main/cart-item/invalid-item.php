<div class="list-group-item cart-item row bg-danger">
    <form action="redir/" method="post">
        <input type="hidden" name="itemid" value="<?php echo $item['itemid']; ?>"> <input type="hidden" name="page" value="<?php echo $config->filename; ?>">
        <div class="col-md-4">
            <div class="form-group">
                <a class="media-heading h4" href="<?php echo $product_link.urlencode($item['itemid']); ?>"><?php echo $item['itemid']; ?></a>
                <p>This item is invalid and will be discarded</p>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-2">
            <div class="form-group"> <label>Price</label> <p class="form-control-static">N/A</p> </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-2">
            <div class="form-group"> <label>Quantity</label> <p class="form-control-static">N/A</p> </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-2">
            <div class="form-group"> <label>Item Subtotal</label> <p class="form-control-static text-right">N/A</p> </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2">
            <div class="form-group">
                <p class="form-control-static">
                    <span class="pull-right">
                        <button type="submit" name="action" value="remove" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span> Delete </button> 
                    </span>
                </p>
            </div>
        </div>
    </form>
</div>