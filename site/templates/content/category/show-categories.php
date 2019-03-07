<?php $page_categories = get_top_level_categories(); ?>

<div class="row list-group">
	<?php foreach ($page_categories as $child) : ?>
		<?php include $config->paths->content.'category/category-page/subcategory-item.php'; ?>
	<?php endforeach; ?>
</div>

<?php $setequalheights = array('.category .panel-heading', '.category .panel-body'); ?>