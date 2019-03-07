<?php $subcategory_count = get_child_count($page_category); ?>
<?php $count = 1; ?>
<?php if ((int) $subcategory_count > 0) : ?>
	<?php $child_categories = get_subcategories($page_category); ?>
	<div class="row list-group">
		<?php foreach ($child_categories as $child) : ?>
			<?php include $config->paths->content.'category/category-page/subcategory-item.php'; ?>
		<?php endforeach; ?>
    </div>
    <?php $setequalheights = array('.category .panel-heading', '.category .panel-body'); ?>
<?php else : ?>
	<?php $families = get_families($page_category); ?>
    <?php foreach($families as $family) : ?>
    	<?php $name = $family['name1']; $name2 = $family['name2'];  $famImg = $family['image'];  $famCat = $family['catid']; ?>
    	<?php include $config->paths->content.'category/category-page/family-item.php'; ?>
    <?php endforeach; ?>
    <?php $setequalheights = array('.family .panel-footer', '.family .panel-body'); ?>
<?php endif; ?>

