<?php 
	$items = get_item_search_results(session_id(), $config->showonpage, $input->pageNum, false);
	$dontshowfeatures = false; 
	$insertafter = 'item-search-results';
	
	$totalresults = get_num_of_search_results(session_id()); 
	
	$total_pages = ceil($totalresults / $config->showonpage);
	$datafields = "data-loadinto='#item-results-container'";
	
?>
<div class="col-xs-12" id="item-lookup-results">
	<?php include $config->paths->content."search/product-results.php"; ?>
</div>
<br>
<?php include $config->paths->ajax."load/pagination/pagination-links.php"; ?>