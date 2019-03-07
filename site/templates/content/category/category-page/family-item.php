<div class="col-xs-6 col-sm-4 category-page family">
	<div class="panel panel-default">
		<div class="panel-body text-center">
			<a href="<?php echo $config->pages->products."redir/?action=showfamily&fam=".$family['famID']; ?>">
				<?php if (trim($family['image']) != '') : ?>
					<img class="img-rounded family-img" alt="<?php echo $family['shortdesc']; ?>" src="<?php echo $config->imagelocation.$family['image']; ?>">
                <?php else : ?>
					<img class="img-rounded family-img" alt="No Image Available" src="<?php echo $config->imagelocation; ?>no-img.png">
                <?php endif; ?>
			</a>
		</div>
		<div class="panel-footer panel-title">
			<a class="h4" href="<?php echo $config->pages->products."redir/?action=showfamily&fam=".$family['famID']; ?>"> 
				<?php echo $family['name1']; ?> 
			</a> 
			<i class="material-icons">&#xE5CC;</i>
		</div>
	</div>
</div>