<form action="<?php echo $config->pages->products; ?>redir/" method="POST" >
    <input type="hidden" name="page" value="<?php echo $config->filename; ?>">
    <input type="hidden" name="action" value="generalsearch">
    <div class="form-group">
		<div class="input-group custom-search-form">
	        <input type="text" class="form-control input-sm query" name="query" placeholder="What can we help you find?">
	        <span class="input-group-btn"> <button type="submit" class="btn btn-sm btn-default"> <span class="glyphicon glyphicon-search"></span> </button> </span>
	    </div>
    </div>
</form>