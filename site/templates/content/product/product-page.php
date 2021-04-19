<?php
	$item_details = get_item(session_id(), $itemid, false);
	foreach ($item_details as $item) {
		$price = $item['price'];
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
		$priceprice6 = $item["priceprice6"];
		$listprice = $item['listprice'];

		$name1 = latin_to_utf($item['name1']);
		$name2 = latin_to_utf($item['name2']);
		$name3 = latin_to_utf($item['name3']);
		$name4 = latin_to_utf($item['name4']);

		$shortDesc = latin_to_utf($item['shortdesc']);
		$longDesc = latin_to_utf($item['longdesc']);
		$img = $item['image'];
		$familyid = $item['familyid'];

		$uofm = $item['uomdesc'];

		$speca = $item['speca'];
		$specb = $item['specb'];
		$specc = $item['specc'];
		$specd = $item['specd'];
		$spece = $item['spece'];
		$specf = $item['specf'];
		$specg = $item['specg'];
		$spech = $item['spech'];

		$familydesc = $item['familydes'];
		$orderno = $item['orderno'];
		$vpn = $item['vpn'];
		$name = $itemid . ' ' . $item['name1'] . ' ' . $item['name2'];
	}
?>

<div class="row">
    <div class="col-sm-8 form-group">
        <form action="<?php echo $config->pages->products; ?>redir/" method="POST">
            <input type="hidden" name="page" value="<?php echo $config->filename; ?>">
            <input type="hidden" name="action" value="itemsearch">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="query" placeholder="Search products">
                <span class="input-group-btn">
                	<button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-search"></span> </button>
                </span>
            </div>
        </form>
    </div>
</div>
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
            	<div class="col-xs-12">
                	<table class="table table-bordered">
                    	<tr>
							<td colspan="3" class="product">
                     			<p class="text-center"><img id="item-display" src="<?php echo $config->img_location.$img; ?>" alt=""> </p>
                      		</td>
                       	</tr>
                        <tr>
							<td class="product additional-pictures"> <p class="text-center"><img src="<?php echo $config->img_location.$img; ?>" alt=""></p> </td>
							<td class="product additional-pictures"> <p class="text-center"><img src="<?php echo $config->img_location.$img; ?>" alt=""></p> </td>
							<td class="product additional-pictures"> <p class="text-center"><img src="<?php echo $config->img_location.$img; ?>" alt=""></p> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <h3 class="product-title"><?php echo $name1; ?> <?php echo $name2; ?> <?php echo $name3; ?> <?php echo $name4; ?></h3>
            <div class="product-desc">
            	<?php if ($speca != "") : ?> <h4 class="text-primary">Features:</h4> <?php endif; ?>
				<?php include $config->paths->content.'product/show-product-features.php'; ?>
            </div>
            <hr>
            <?php if ($item['price'] != "0.00") : ?>
            	<h4 class="product-price">Price: $ <span class="price"><?php echo $price . ' / ' .$uofm; ?></span></h4>
            <?php else : ?>
            	<h4 class="product-price">Price: $ <span class="price">Call for Price</span></h4>
            <?php endif; ?>
            <br>
            <div class="row"> <div class="col-sm-10"> <?php include $config->paths->content.'product/price-structure.php'; ?> </div> </div>

            <hr>
            <form class="form-horizontal add-cart" action="<?php echo $config->pages->cart; ?>redir/" method="post">
                <input type="hidden" name="action" value="add-to-cart">
                <input type="hidden" name="page" value="<?php echo $config->filename; ?>">
                <input type="hidden" name="itemid" value="<?php echo $itemid; ?>">
                <div class="well">
	                <div class="form-group">
	                    <div class="col-md-12">
	                        <div class="row">
	                            <div class="col-xs-6">
	                                <label for="quantity">Qty:</label> <input type="text" class="form-control text-right" id="quantity" name="qty">
	                            </div>
	                            <div class="col-xs-6 text-right">
	                            	<label>$ <?php echo $price . ' / ' .$uofm; ?></label>
	                                <button type="submit" class="btn btn-success"><i class="material-icons">&#xE854;</i>Add To Cart</button>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                </div>
            </form>
        </div>
    </div>
	<h3>Product Overview</h3>
    <div class="row">
        <div class="col-md-12 product-info">
            <ul id="myTab" class="nav nav-tabs nav_tabs">
                <li class="active"><a href="#description" data-toggle="tab">DESCRIPTION</a></li>
                <li><a href="#product-info" data-toggle="tab">PRODUCT INFO</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="description">
					<br>
					<section class="container-fluid product-info">
						<?php $descArr = explode('&lt;br&gt;', $shortDesc);?>
						<h5><?php echo $descArr[0]; ?></h5>
						<?php for ($i = 1; $i < count($descArr); $i++) : ?>
							<p><?php echo $descArr[$i]; ?></p>
						<?php endfor; ?>
						<p>
							<?php if ($longDesc == '<iframe src=info/whichtape.php width=600px height=340px scrolling=no frameborder=0></iframe>') : ?>
								<?= $pages->get('template=template-topicitem,name=which-tape-is-right-for-me')->body; ?>
							<?php else : ?>
								<?php echo $longDesc; ?>
							<?php endif; ?>
						</p>
					</section>
				</div>
                <div class="tab-pane fade" id="product-info">
                    <section class="container-fluid">
						<h3><?php echo $name1 . ' ' . $name2 . ' ' . $name3 . ' ' . $name4; ?></h3>
						<p><b>Item ID:</b> <?php echo $item['itemid']; ?></p>
						<p><b>Manufacturer:</b> <?php echo $item['name1']; ?></p>
						<p><b>Model No:</b> <?php echo $item['vpn']; ?></p>
						<?php include $config->paths->content.'product/show-product-features.php'; ?>
                    </section>
                </div>
                <div class="tab-pane fade" id="related">
                	<?php include $config->paths->content.'product/related-items.php'; ?>
				</div>
            </div>
            <hr>
        </div>
    </div>

</div>
