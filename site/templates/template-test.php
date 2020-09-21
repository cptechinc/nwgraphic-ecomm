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
	<br>
	<?php echo $session->original; ?>
	<br>
	<?php
		$session->original;
		$expiration = str_replace(' ', '', $session->original);
		$expiration_array = explode("/", $expiration);
		$month = $expiration_array[0];
		$year = $expiration_array[1];
		if (strlen($year) == 2) {
			$expiration = "$month/20$year";
		}
		echo $expiration;
	?>
	</div><!-- end content -->
<?php include("./_foot.php"); ?>
