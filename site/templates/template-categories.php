<?php 
	if ($input->get->cat) {
		include $config->paths->assets."classes/CategoryTree.php";
		$categorytree = new CategoryTree($input->get->text('cat'));
		$page->title = get_category_name($categorytree->pagecategory, false);
	} else {
		$page->title = 'Browse Categories';
		
	}
	if ($input->get->cat) { $showsidebar = true; $config->scripts->append($config->urls->templates.'scripts/json-menu.js'); }
?>
<?php include("./_head.php"); ?>

<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo html_entity_decode($page->get('pagetitle|headline|title')); ?></h1> </div>
    <div class="row">
        <div class="col-sm-3">
			<?php include $config->paths->content.'category/side-nav.php'; ?>
        </div>
        <div class="col-sm-9">
            <?php if ($input->get->cat) : ?>
                <?php include $config->paths->content.'category/bread-crumbs.php'; ?>
                <?php include $config->paths->content.'category/show-category.php'; ?>
            <?php else : ?>
                <?php include $config->paths->content.'category/show-categories.php'; ?>
            <?php endif; ?>
        </div>
    </div> <!-- END ROW -->
</div>
<!-- END PAGE -->


<?php include("./_foot.php"); ?>
