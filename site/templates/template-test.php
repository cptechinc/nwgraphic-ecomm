<?php
	$config->filename = '/store/ajax/load/item-search-results//store/cart/';
	$totalresults = get_num_of_search_results(session_id());
	$insertafter = 'item-search-results';
	$total_pages = ceil($totalresults / $config->showonpage);
	$datafields = "data-loadinto='#item-results-container'";
?>

<?php include("./_head.php"); ?>

<div class="container page">
	<?php
		echo $session->sql;


	?>
</div>
<?php include("./_foot.php"); ?>
