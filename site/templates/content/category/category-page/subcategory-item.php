<?php 
	if ($child['sdis'] == 'I') {
		$catlink = $config->pages->products."redir/?action=load-category&cat=".$child['catid'];
		$catlink = $config->pages->categories."?cat=".$child['catid']; 
	} else {
		$catlink = $config->pages->categories."?cat=".$child['catid']; 
	}
?>
<div class="col-xs-6 col-sm-4 category category-page">
	<div class="panel panel-default">
		<div class="panel-heading panel-title">
			
			<a class="h4" href="<?php echo $catlink; ?>"> <?php echo $child['catdesc']; ?> </a> <i class="material-icons">&#xE5CC;</i>
			
		</div>
		<div class="panel-body text-center">
			<a href="<?php echo $catlink; ?>">
				<?php if (trim($child['image']) != '') : ?>
					<img class="group list-group-image" src="<?php echo $config->img_location."thumb/".$child['image']; ?>" alt="" />
				<?php else : ?>
					<img class="group list-group-image" src="<?php echo $config->img_location; ?>no-img.png" alt="No Image Available" />
				<?php endif; ?>
			</a>
		</div>
	</div>
</div>