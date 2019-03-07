<div class="row">
	<div class="col-xs-12 form-group">
    <?php include $config->paths->content.'pagination/pw/pagination-start.php'; ?>
    </div>
</div>

<?php $items = get_item_search_results(session_id(), $config->showonpage, $this_page, false); $count = 1; ?>
<?php $num_of_items = get_num_of_search_results(session_id()); ?>
<?php foreach ($items as $item) : ?>
	<?php 
			$speca = $item['speca']; $specb = $item['specb']; $specc = $item['specc']; $specd = $item['specd'];
			$spece = $item['spece']; $specf = $item['specf']; $specg = $item['specg']; $spech = $item['spech'];
	?>
	<?php $itemid = $item['itemid']; ?>
    <?php if ($count == 1) : ?> <div class="row"><?php endif; ?>
	<div class="col-sm-4">
		<div class="thumbnail">
			<img src="<?php echo $config->img_location.$item['image']; ?>" alt="<?php echo $item['name1']; ?> image" class="img-responsive" />
			<div class="caption">
				<h4><a href="<?php echo $config->pages->products.'?id='.urlencode($itemid); ?>"> <?php echo $item['name1']; ?> - <?php echo $item['vpn']; ?></a></h4>
                <small class="help-block">Quick Order #<?php echo $item['orderno']; ?></small>
				<?php include $config->paths->content.'product/show-product-features.php'; ?>
				<hr class="hr-primary">
				<form action="<?php echo $config->pages->cart; ?>redir/" method="post">
					<input type="hidden" name="action" value="add-to-cart">
					<input type="hidden" name="page" value="<?php echo $config->filename; ?>">
					<input type="hidden" name="itemid" value="<?php echo $itemid; ?>">
                    <div class="row">
                    	<div class="col-xs-6"><label for="qty">Qty:</label></div>
                    	<div class="col-xs-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group"> <input type="text" class="form-control text-right" name="qty" id="qty" style="width: 75px;"> &nbsp; </div>
                        <div class="col-xs-6 form-group"> <button type="submit" class="btn btn-primary">Add to Cart</button> </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
	<?php if (($count) % 3 == 0) {echo '</div><div class="row">';} ?>
	<?php $count++; ?>
<?php endforeach; ?>
<?php if (($count - 1) % 3 != 0){echo '</div>'; } ?>
<?php $total_pages = ceil($num_of_items / $config->showonpage); ?>
<?php $insertafter = "products";  ?>
<?php include $config->paths->content.'pagination/pw/pagination-links.php'; ?>
