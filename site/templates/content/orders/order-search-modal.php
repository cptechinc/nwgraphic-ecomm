<div class="modal fade" id="orders-search-modal" tabindex="-1" role="dialog" aria-labelledby="orders-search-modal-label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="orders-search-modal-label">Search Through Orders</h4>
            </div>
            <div class="modal-body">
            	<form action="redir/" method="post">
                	<input type="hidden" name="page" value="<?php echo $config->filename; ?>">
                    <input type="hidden" name="action" value="order-search">
                	<div class="row">
                    	<div class="col-xs-12"><div class="form-group"><?php include $config->paths->content.'orders/orders-search-field.php'; ?></div></div>
                    </div>
                    <div class="row"><div class="col-xs-12"><legend>Optional Parameters</legend></div></div>
                    <div class="row">
                    	<div class="col-sm-3">
                            <div class="form-group">
                                <label>Order Status: </label>
                                <select name="order-status" class="form-control" tabindex="1">
                                      <option value="H">Shipped</option> <!--P stands for posted/history. N is for Open status -->
                                      <option value="O">Open Order</option> <option value="B" selected="selected">Both</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                        	<label>Date From: </label>
                            <div class="input-group date">
                            	<input type="text" class="form-control text-right" name="date-from" placeholder="MM/DD/YYYY">
                            	<span class="input-group-addon addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                        	<label>Date Through: </label>
                        	<div class="input-group date">
                                <input type="text" class="form-control text-right" name="date-through" placeholder="MM/DD/YYYY">
                                <span class="input-group-addon addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
                            </div>
                        </div>
                    </div>
             		<div class="row"><div class="col-xs-12"><span class="text-center"><button class="btn btn-success" type="submit">Search</button></span></div></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>