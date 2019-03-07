<form method="post" action="redir/">
	<input type="hidden" name="itemid" value="<?php echo $item['itemid']; ?>"> <input type="hidden" name="page" value="<?php echo $config->filename; ?>">
	<div class="row">
    	<div class="col-xs-12 form-group">
            <div class="input-group">
                <input type="text" class="form-control text-right"  name="qty" placeholder="qty" value="<?php echo $item['qty']; ?>">
                <span class="input-group-btn"> 
                	<button class="btn btn-warning" type="submit" name="action" value="adjust"> <span class="glyphicon glyphicon-pencil"></span> Update Qty</button> 
                </span>
            </div>

        </div>
    </div>
    
    <div class="row">
    	<div class="col-xs-12 form-group">
            <button class="btn btn-danger btn-block" type="submit" name="action" value="remove"><span class="glyphicon glyphicon-remove"></span> Remove Item</button>
        </div>
    </div>
</form>