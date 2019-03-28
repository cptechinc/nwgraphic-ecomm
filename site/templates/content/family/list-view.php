<?php $items = get_family_pricing(session_id(), $familyID); ?>
<div id="products" class="row list-group">
	<?php foreach ($items as $item) : ?>
		<?php
			$speca = $item['speca']; $specb = $item['specb']; $specc = $item['specc']; $specd = $item['specd'];
			$spece = $item['spece']; $specf = $item['specf']; $specg = $item['specg']; $spech = $item['spech'];
			$priceqty1 = $item["priceqty1"];
		$priceqty2 = $item["priceqty2"];
		$priceqty3 = $item["priceqty3"];
		$priceqty4 = $item["priceqty4"];
		$priceqty5 = $item["priceqty5"];
		$priceqty6 = $item["priceqty6"];

		$priceprice1 = $item["priceprice1"];
		$priceprice2 = $item["priceprice2"];
		$priceprice3 = $item["priceprice3"];
		$priceprice4 = $item["priceprice4"];
		$priceprice5 = $item["priceprice5"];
		$priceprice6 = $item["priceprice6"];$itemid = $item['itemid'];

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
							<?php echo $item['name1']; ?>
						</a>
					</h3>
					<small class="help-block"><?php echo $item['name2']; ?></small>
					<?php //include $config->paths->content.'product/show-product-features.php'; ?>
				</div>
				<div class="col-sm-3">
					<?php if ($item['price'] != '0.00') : ?>
						<div class="product-price text-right">
							<span><?php echo $item['unit']; ?></span><br>
							$ <span><?php echo $item['price']; ?></span>
						</div><br>
						<div class="text-right">
							<?php include $config->paths->content."product/price-structure.php"; ?>
						</div>
					<?php else : ?>
						<div class="product-price text-right">$ <span class="">Call for Price</span></div>
					<?php endif; ?>
					<form action="<?php echo $config->pages->cart; ?>redir/" method="post">
						<input type="hidden" name="action" value="add-to-cart">
						<input type="hidden" name="page" value="<?php echo $config->filename; ?>">
						<input type="hidden" name="itemid" value="<?php echo $item['itemid']; ?>">
						<label for="qty">Qty:</label>
						<input type="text" class="form-control text-right" name="qty" id="qty" style="width: 75px;"> <br>
						<button type="submit" class="btn btn-block btn-primary">Add to Cart</button>
					</form>
				</div>
			</div>
			<hr>
		</div>
	<?php endforeach; ?>
</div>
