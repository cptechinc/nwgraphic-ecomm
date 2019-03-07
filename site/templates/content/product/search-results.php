<div class="row">
	<div class="col-xs-12 form-group">
    	<?php include $config->paths->content.'pagination/pw/pagination-start.php'; ?>
    </div>
</div>
<?php $items = get_item_search_results(session_id(), $config->showonpage, $this_page, false); $count = 1; ?>
<?php $num_of_items = get_num_of_search_results(session_id()); ?>

<div id="products" class="row list-group">
	<?php foreach ($items as $item) : ?>
		<?php 
			$speca = $item['speca']; $specb = $item['specb']; $specc = $item['specc']; $specd = $item['specd'];
			$spece = $item['spece']; $specf = $item['specf']; $specg = $item['specg']; $spech = $item['spech'];
		?>
		<?php $itemid = $item['itemid']; ?>
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
							<?php echo $item['name1']; ?> - <?php echo $item['vpn']; ?>
						</a>
					</h3>
					
					<?php include $config->paths->content.'product/show-product-features.php'; ?>
				</div>
				<div class="col-sm-3">
					<?php if ($item['price'] != "0.00") : ?>
						<div class="product-price text-right">
							$ <span><?php echo $item['price'] . ' / ' .$item['uomdesc']; ?></span>
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
<?php $insertafter = 'products'; ?>
<?php include $config->paths->content.'pagination/pw/pagination-links.php'; ?>
