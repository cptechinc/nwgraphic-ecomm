<?php
	include $config->paths->assets."classes/CategoryTree.php";
	$page->loaded = true;
	$familyID = $input->get->text('fam');

	if (get_family_pricing_count(session_id(), $familyID) == 0) {
		//header("Location: ". $config->pages->products."redir/?action=showfamily&fam=$familyID");
	}

	include $config->paths->content.'family/page-loaded-logic.php';
	if ($page->loaded === false) {
		// header("Location: ". $config->pages->products."redir/?action=showfamily&fam=$familyID");
	}
	$pagecategory = get_category_from_family($familyID);
	$categorytree = new CategoryTree($pagecategory);
	$tableview = has_tableview($familyID);
	$page->title = get_family_name($familyID); ;

	if ($input->get->fam) { $showsidebar = true; $config->scripts->append($config->urls->templates.'scripts/json-menu.js'); }
?>
<?php include("./_head.php"); ?>

<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo html_entity_decode($page->title); ?></h1> </div>
    <div class="row">
        <div class="col-sm-3">
            <?php include $config->paths->content.'category/side-nav.php'; ?>
        </div>
        <div class="col-sm-9">
            <?php include $config->paths->content.'family/family-details.php'; ?>
			<hr>
            <?php if (has_tableview($familyID)) : ?>
               	<?php $insertafter = "family";  ?>
                <?php include $config->paths->content.'family/table-view.php'; ?>
            <?php else : ?>
                <?php include $config->paths->content.'family/list-view.php'; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include("./_foot.php"); ?>
