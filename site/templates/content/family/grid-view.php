<?php $items = get_family_pricing(session_id(), $familyID); ?>
<div class="row">
	<?php foreach ($items as $item) : ?>
		<?php
				$speca = $item['speca']; $specb = $item['specb']; $specc = $item['specc']; $specd = $item['specd'];
				$spece = $item['spece']; $specf = $item['specf']; $specg = $item['specg']; $spech = $item['spech'];
				if ($item['price'] != "0.00") {
					$priceunit = '<span class="">$ '.$item['price'].'</span> ';
				} else {
					$priceunit = "<span class=''>$ Call for Price</span>";
				}
		?>
		<div class="col-sm-4">
			<div class="family thumbnail">
				<img src="<?php echo $config->img_location.$item['image']; ?>" alt="<?php echo $item['name1']; ?> image" class="img-responsive" />
				<div class="caption">
					<h4><a href="<?php echo $config->pages->products.'?id='.urlencode($item['itemid']); ?>"> <?php echo $item['name1']; ?></a></h4>
	                <p><small><strong>ItemID:</strong> <?php echo $item['itemid']; ?></small></p>
					<?php //include $config->paths->content.'product/show-product-features.php'; ?>
					<hr class="hr-primary">
					<form action="<?php echo $config->pages->cart; ?>redir/" method="post">
						<input type="hidden" name="action" value="add-to-cart">
						<input type="hidden" name="page" value="<?php echo $config->filename; ?>">
						<input type="hidden" name="itemid" value="<?php echo $item['itemid']; ?>">
	                    <div class="row">
	                    	<div class="col-xs-6">
	                        	<div class="form-group"> <label>Qty:</label> <input type="text" class="form-control text-right" name="qty" style="width: 75px;"> </div>
	                        </div>
	                        <div class="col-xs-6">
	                        	<div class="form-group text-right">
	                                <label><?php echo $priceunit; ?></label>
	                                <p class="form-control-static"> <button type="submit" class="btn btn-primary">Add to Cart</button></p>
	                            </div>
	                        </div>
	                    </div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
