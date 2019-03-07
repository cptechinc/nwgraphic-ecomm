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

<div class="row">
	<div class="col-sm-4">
        <form class="form-inline" id="pagination-form"  method="get">
        	<div class="form-group">
            	<label>Results Per Page</label>
                <input type="hidden" id="pagination-page" value="<?php echo $results_page_link; ?>">
                <input type="hidden" name="symbol" id="symbol" value="<?php echo $symbol; ?>">
                <select class="form-control" name="results-per-page" id="results-per-page">
                    <?php foreach ($config->results_array as $val ) : ?>
                        <?php if ($val == $results_on_page) {$selected = 'selected'; } else {$selected = '';} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                    <?php endforeach; ?>
                </select>
                <a href="redir/" class="btn btn-default table-hdr" title="Refresh Recent Orders"> 
                    <span class="glyphicon glyphicon-refresh"></span> &nbsp; &nbsp; Refresh Orders
                </a><!-- FIX -->
            </div> 
        </form>
	</div>
    <div class="col-sm-8">
        <form action="redir/" method="post" class="form-inline">
        	<div class="form-group">
                <input type="hidden" name="page" value="<?php echo $config->filename; ?>">
                <input type="hidden" name="action" value="order-search">
                <?php include $config->paths->content.'orders/orders-search-field.php'; ?>
            </div>
            &nbsp; &nbsp;
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#orders-search-modal">
                Advanced Search
            </button>
            <?php if ($session->ordersearch) : ?>
                <a href="<?php echo $config->pages->orders; ?>" class="btn btn-warning"> Clear Search </a>
            <?php endif; ?>
        </form>
    </div>
</div>

<script>
	$(document).ready(function(e){
		$('.search-panel .dropdown-menu').find('a').click(function(e) {
			e.preventDefault();
			var param = $(this).attr("href").replace("#","");
			var concept = $(this).text();
			$('.search-panel span#search_concept').text(concept);
			$('.input-group #search_param').val(param);
		});
	});
</script>