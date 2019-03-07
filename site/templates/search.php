<?php
	
	// search.php template file
	// See README.txt for more information. 
	
	// look for a GET variable named 'q' and sanitize it
	$q = $sanitizer->text($input->get->q); 
	$page->title = 'Searching for "'.$q.'"';
	$resultcount = get_num_of_search_results(session_id()); 

	if ($resultcount < $config->showonpage) {
		$endat = $resultcount;
	} else {
		$endat = ($config->showonpage * $input->pageNum()) + $config->showonpage;
		if ($endat > $resultcount) {
			$endat = $resultcount;
		}
	}

	if ($input->pageNum() > 1) {
		$startat = $input->pageNum() * $config->showonpage;
	} else {
		$startat = 1;
	}

	
	
?>
<?php include("./_head.php"); ?>

<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
    <?php ?>
    
    <?php if ($resultcount > 0 ) : ?>
        <h2>Showing <?php echo $startat.'-'.$endat; ?> of <?php echo $resultcount; ?> Product Results: </h2><br>
        <?php $items = get_item_search_results(session_id(), $config->showonpage, $input->pageNum(), false); ?>
        
        <?php include $config->paths->content."search/product-results.php"; ?>
    <?php else : ?>
        <h2>Product Results: </h2>
        <p>No products match your query</p>
    <?php endif; ?>

    
</div><!-- end content -->

<?php include $config->paths->content."common/js-set-equal-height.php"; ?>
<?php include("./_foot.php"); ?>
