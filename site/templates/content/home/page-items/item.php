<?php
	$item = get_item_im($itemid, false);
	
		$speca = $item['speca'];$specb = $item['specb']; $specc = $item['specc']; 
		$specd = $item['specd']; $spece = $item['spece']; $specf = $item['specf']; $specg = $item['specg']; $spech = $item['spech'];
	
?>

<div class="col-xs-6 col-sm-4 featured-item">
    <div class="panel panel-default">
        <div class="panel-body text-center">
            <a href="<?php echo $config->pages->products.'?id='.urlencode($itemid); ?>">
                <p class="text-center">
                    <img src="<?php echo $config->img_location.$item['image']; ?>" alt="<?php echo $item['name1']; ?> image" />
                </p>
            </a>
        </div>
        <div class="panel-footer text-center">
            <h4 class="text-center"><a href="<?php echo $config->pages->products.'?id='.urlencode($itemid); ?>"><?php echo $item['name1'].' '.$item['vpn']; ?></a></h4>
            <h5><?php echo $subheading; ?></h5>
			<div class="hidden-xs"><?php include $config->paths->content.'product/show-product-features.php'; ?></div>
        </div>
    </div>
</div>