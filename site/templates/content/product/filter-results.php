<div class="row">
	<div class="col-xs-12 form-group"> <?php include $config->paths->content.'pagination/pw/pagination-start.php'; ?> </div>
</div>
<?php 
	//fam,price,manf
	switch ($filters) {
		case 'fam':
			$family = $sanitizer->text($input->get->fam);
			$num_of_items = get_search_results_filter_family_count(session_id(), $family);
			$items = get_search_results_filter_family(session_id(), $family, $config->showonpage, $this_page, false);
			break;	
		case 'fam,price,manf':
			$family = $sanitizer->text($input->get->fam);
			$pricefilter = $sanitizer->text($input->get->price);
			$manffilter = $sanitizer->text($input->get->manf);
			$pricearray = explode('-', $pricefilter);
			$num_of_items = get_search_results_filter_family_price_manf_count(session_id(), $family, $pricearray[0], $pricearray[1], $manffilter, false);
			$items = get_search_results_filter_family_price_manf(session_id(), $family, $pricearray[0], $pricearray[1], $manffilter, $config->showonpage, $this_page, false);
			break;
		case 'fam,price':
			$family = $sanitizer->text($input->get->fam);
			$pricefilter = $sanitizer->text($input->get->price);
			$pricearray = explode('-', $pricefilter);
			$num_of_items = get_search_results_filter_family_price_count(session_id(), $family, $pricearray[0], $pricearray[1], false);
			$items = get_search_results_filter_family_price(session_id(), $family, $pricearray[0], $pricearray[1], $config->showonpage, $this_page, false);
			break;
		case 'fam,manf':
			$family = $sanitizer->text($input->get->fam);
			$manffilter = $sanitizer->text($input->get->manf);
			$num_of_items = get_search_results_filter_family_price_manf_count(session_id(), $family, $manffilter, false);
			$items = get_search_results_filter_family_price_manf(session_id(), $family, $manffilter, $config->showonpage, $this_page, false);
			break;
		case 'price': 
			$pricefilter = $sanitizer->text($input->get->price);
			$pricearray = explode('-', $pricefilter);
			$num_of_items = get_search_results_filter_price_count(session_id(), $pricearray[0], $pricearray[1], false);
			$items = get_search_results_filter_price(session_id(), $pricearray[0], $pricearray[1],  $config->showonpage, $this_page, false);
			//FIX
			break;
		case 'price,manf':
			$pricefilter = $sanitizer->text($input->get->price);
			$manffilter = $sanitizer->text($input->get->manf);
			$num_of_items = get_search_results_filter_price_manf_count(session_id(), $pricearray[0], $pricearray[1], $manffilter, false);
			$items = get_search_results_filter_price_manf(session_id(), $pricearray[0], $pricearray[1], $manffilter, $config->showonpage, $this_page, false);
			//FIX
			break;
		case 'manf':
			$manffilter = $sanitizer->text($input->get->manf);
			$num_of_items = get_search_results_filter_manf_count(session_id(), $manffilter, false);
			$items = get_search_results_filter_manf(session_id(), $manffilter, $config->showonpage, $this_page, false);
			break;
		default:
			$num_of_items = get_num_of_search_results(session_id()); 
			$items = get_item_search_results_paged(session_id(), $config->showonpage, $this_page, false);
			break;
	}

?>

<div id="products" class="row list-group">
	<?php foreach ($items as $item) : ?>
		<?php 
			$speca = $item['speca']; $specb = $item['specb']; $specc = $item['specc']; $specd = $item['specd'];
			$spece = $item['spece']; $specf = $item['specf']; $specg = $item['specg']; $spech = $item['spech'];
		?>
		<div class="col-xs-12 product-result">
			<div class="row">
				<div class="col-sm-3">
					<a href="<?php echo $config->pages->products.'?id='.urlencode($item['itemid']); ?>">
						<p class="text-center">
							<img src="<?php echo $config->img_location.$item['image']; ?>" alt="<?php echo $item['name1']; ?> image" />
						</p>
					</a>
				</div>
				<div class="col-sm-6">
					<h3>
						<a href="<?php echo $config->pages->products.'?id='.urlencode($item['itemid']); ?>"> 
							<?php echo $item['name1']; ?> <?php echo $item['name2']; ?> <?php echo $item['name3']; ?> <?php echo $item['name4']; ?>
						</a>
					</h3>
					<p><small class="help-block">Quick Order #<?php echo $item['orderno']; ?></small></p>
                    <p class="help-block"><?php echo $item['name1'].' '.$item['vpn']; ?></p>
                    <?php include $config->paths->content.'product/show-product-features.php'; ?>
				</div>
				<div class="col-sm-3">
					<?php if ($item['price'] != "0.00") : ?>
						<div class="product-price text-right">
							$ <span class="text-muted"><?php echo $item['price'] . ' / ' .$item['uomdesc']; ?></span>
						</div>
					<?php else : ?>
						<div class="product-price text-right">$ <span class="text-muted">Call for Price</span></div>
					<?php endif; ?>
					<form action="<?php echo $config->pages->cart; ?>redir/" method="post">
						<input type="hidden" name="action" value="add-to-cart">
						<input type="hidden" name="page" value="<?php echo $config->filename; ?>">
						<input type="hidden" name="itemid" value="<?php echo $item['itemid']; ?>">
						<label for="qty">Qty:</label>
						<input type="text" class="form-control text-right" name="qty" id="qty" style="width: 75px;"> <br>
						<button type="submit" class="btn btn-lg btn-block btn-primary">Add to Cart</button> 
					</form>
				</div>
			</div>
			<hr>
        </div>
	<?php endforeach; ?>
</div>
<?php $total_pages = ceil($num_of_items / $config->showonpage); ?>
<?php $insertafter = "products";  ?>
<?php include $config->paths->content.'pagination/pw/pagination-links.php'; ?>
<script>
	$(window).load(function() {
		setequalheight('.product-result');
	});


	$(window).resize(function(){
		setequalheight('.product-result');
	});
	
</script>
