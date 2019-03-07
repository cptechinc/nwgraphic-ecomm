<div class="modal fade" id="item-lookup" tabindex="-1" role="dialog" aria-labelledby="item-lookup-label">
    <div class="modal-dialog modal-lg full-screen" role="document">
        <div class="modal-content">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title" id="item-lookup-label">Item Lookup</h4>
            </div>
            <div class="modal-body">
           		<div class="row">
           			<div class="col-sm-12">
                    	<form id="searching" action="<?php echo $config->pages->products; ?>redir/" method="post">
                        	<input type="hidden" name="action" value="itemsearch">
                            <input type="hidden" id="add-item-return-page" value="<?php echo $config->filename; ?>"> 
                            <input type="hidden" id="add-item-redir" value="<?php echo $config->pages->cart; ?>redir/"> 
                            <input type="hidden" id="add-item-action" value="add-to-cart"> 
                            <div class="input-group custom-search-form form-group">
                                <input type="text" name="query" id="query" class="form-control">
                                <span class="input-group-btn"> 
                                	<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div><!-- /input-group -->
                         </form>
                    </div>
           		</div>
                <div id="item-results-container">
                    <div class="row">
                    	<div class="col-xs-12" id="item-lookup-results"> </div>
                    </div>
                	
                
                </div>

            </div>
        </div>
    </div>
</div>

<?php $config->scripts->append($config->urls->templates.'scripts/item-lookup.js'); ?>
