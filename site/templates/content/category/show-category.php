<div class="row list-group">
	
	<?php $child_categories = get_subcategories($categorytree->pagecategory); ?>
	
	<?php foreach ($child_categories as $child) : ?>
		<?php include $config->paths->content.'category/category-page/subcategory-item.php'; ?>
	<?php endforeach; ?>
		
	<?php $families = get_family_families($categorytree->pagecategory, false); ?>
	<?php foreach($families as $family) : ?>
		<?php $name = $family['name1']; $name2 = $family['name2'];  $famImg = $family['image'];  $famCat = $family['catid']; ?>
		<?php include $config->paths->content.'category/category-page/family-item.php'; ?>
	<?php endforeach; ?>
    
</div>
 <?php $setequalheights = array('.category-page .panel-title', '.category-page img'); ?>
