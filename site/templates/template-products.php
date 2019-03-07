<?php
	include $config->paths->assets."classes/CategoryTree.php";
	if ($input->get->id) {
		$itemid = $input->get->text('id');
		$page->title = get_product_name(session_id(), $itemid);
		$is_item_loaded = is_item_loaded(session_id(), $itemid);
		if ($is_item_loaded) {
			$familyID = get_item_familyid(session_id(), $itemid, false);
			$sql = get_item_familyid(session_id(), $itemid, true);
			$pagecategory = get_category_from_family($familyID);
			$categorytree = new CategoryTree($pagecategory);
			if ($session->tries) {$session->remove('tries'); }
		} else {
			include $config->paths->content.'common/logic-tries-counter.php'; 
			if ($session->tries > 3) {
				throw new Wire404Exception();
			} else {
				header('Location: '.$config->pages->products.'redir/?action=itempage&id=' . $input->get->id); //FIX
				exit;	
			}
			
		}
	} elseif ($input->get->q) {
		$search = $input->get->text('q');
		$num_of_results = get_num_of_search_results(session_id());
		if ($num_of_results == 1) {
			$page->title = $num_of_results . ' Result for "' . $search . '"';
		} else {
			$page->title = $num_of_results . ' Results for "' . $search . '"';
		}
		
	} elseif ($input->get->cat) {
		$pagecategory = $input->get->text('cat');
		$categorytree = new CategoryTree($pagecategory); 
		$filters = '';
		if ($input->get->cat) { $filters = 'fam,'; } if ($input->get->price) { $filters .= 'price,'; } if ($input->get->manf) { $filters .= 'manf,'; } 
		$filters = rtrim($filters, ',');
		
	}

?>
<?php include("./_head.php"); ?>

<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo html_entity_decode($page->get('pagetitle|headline|title')); ?></h1> </div>
    <div class="row">
        <div class="col-sm-3">
        	<?php if ($input->get->q) : ?>
                <?php include $config->paths->content.'category/side-nav.php'; ?>
            <?php elseif ($input->get->id) : ?>
            	<?php include $config->paths->content.'category/side-nav.php'; ?>
            <?php elseif ($input->get->cat) : ?>
            	<?php include $config->paths->content.'category/item-filter.php'; ?>
            <?php endif; ?>
        </div>
        <div class="col-sm-9">
            <?php if ($input->get->q) : ?>
                <?php include $config->paths->content.'product/search-results.php'; ?>
            <?php elseif ($input->get->id) : ?>
            	<div class="row"> <div class="col-xs-12"><?php include $config->paths->content.'category/bread-crumbs.php'; ?></div> </div>
                <?php include $config->paths->content.'product/product-page.php'; ?>
            <?php elseif ($input->get->cat) : ?>
            	<div class="row"> <div class="col-xs-12"><?php include $config->paths->content.'category/bread-crumbs.php'; ?></div> </div>
            	<?php include $config->paths->content.'product/filter-results.php'; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($input->get->id) : ?>
        <?php include $config->paths->content.'common/js-show-nav.php'; ?>
        <?php $config->scripts->append($config->urls->templates.'scripts/json-menu.js'); ?>
    <?php endif; ?>
</div>
<?php include("./_foot.php"); ?>
