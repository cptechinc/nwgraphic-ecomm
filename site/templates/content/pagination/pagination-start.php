<?php 
	
	if ($input->get->page) {
		$this_page = $input->get->int('page'); 
		if (!is_int($this_page)) { $this_page = 1; }
	} else {
		$this_page = 1;
	}
	
	if ($input->get->{'results-per-page'}) {
		$config->showonpage = $input->get->get('results-per-page');
		$session->{'results-per-page'} = $config->showonpage;
	} elseif ($session->{'results-per-page'}){
		$config->showonpage = $session->{'results-per-page'};
	} 
	
	
	$results_page_link = replace_and_get_url($config->filename, 'results-per-page', 'delete-404');
	if (strpos($results_page_link, '?') !== FALSE) {
		$symbol = '&';
	} else {
		$symbol = '?';
	}

?>

<form action="<?php echo $config->filename; ?>" method="get" class="form-inline" id="pagination-form">
    <div class="form-group">
    	<label>Results Per Page &nbsp;</label>
        <input type="hidden" id="pagination-page" value="<?php echo $results_page_link; ?>">
        <input type="hidden" name="symbol" id="symbol" value="<?php echo $symbol; ?>">
        <select class="form-control" name="results-per-page" id="results-per-page">
        	<?php foreach ($config->results_array as $val ) : ?>
            	<?php if ($val == $config->showonpage) : ?>
                	<option value="<?php echo $val; ?>" selected><?php echo $val; ?></option>
                <?php else : ?>
                	<option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                <?php endif; ?>
        	<?php endforeach; ?>
        </select>&nbsp;
        <input type="hidden" name="symbol" value="<?php echo $symbol; ?>">
    </div>
</form>