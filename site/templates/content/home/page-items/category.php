<?php $cat= load_category($catid); ?>


    <?php 
		if ($feature->type == 'PCAT') {
			$href = $config->pages->products."redir/?action=load-category&cat=".$cat['catid'];
		} else {
			$href = $config->pages->categories."?cat=".$cat['catid'];
		}
	?>

    <div class="col-xs-6 col-sm-4 featured-item">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <a href="<?php echo $href; ?>">
                    <p class="text-center">
                        <img class="family-img" alt="<?php echo $cat['catdesc']; ?>" src="<?php echo $config->img_location.$cat['image']; ?>">
                    </p>
                </a>
            </div>
            <div class="panel-footer text-center">
                <h4 class="text-center"><a href="<?php echo $href; ?>"> <?php echo $cat['catdesc']; ?></a></h4>
                <h5><?php echo $subheading; ?></h5>
            </div>
        </div>
    </div>

