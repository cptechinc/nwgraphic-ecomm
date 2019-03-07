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
	<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success animated fadeInDown" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 2147483647; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 2147483647;">×</button><span data-notify="icon" class="glyphicon glyphicon-shopping-cart"></span> <span data-notify="title"></span> <span data-notify="message">You added 1   to the cart <br> (Click this Message to go to the cart.)</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div></div><a href="/shop/cart/" target="_self" data-notify="url" style="background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); height: 100%; left: 0px; position: absolute; top: 0px; width: 100%; z-index: 2147483647;"></a></div>
</div><!-- end content -->
<?php include("./_foot.php"); ?>
