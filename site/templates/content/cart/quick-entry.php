<form action="<?php echo $config->pages->cart; ?>redir/" method="post">
    <input type="hidden" name="action" id="action" value="add-to-cart"> 
    <input type="hidden" name="page" id="page" value="<?php echo  $config->filename; ?>">
    <input type="hidden" name="redir" id="redir" value="<?php echo $config->pages->cart; ?>redir/">
    
    <div class="row">
    	<div class="col-sm-12">
        	<div class="form-group"> <label>Item ID : </label><input type="text" class="form-control" name="itemid"> </div>
        	<div class="form-group"> <label>Qty : </label> <input type="text" class="form-control text-right qty" name="qty"> </div>
        	<div class="text-center"><button type="submit" class="btn btn-success "><span class="glyphicon glyphicon-plus"></span> Add To Cart</button> </div>
        </div>
    </div>
</form>
    
        
