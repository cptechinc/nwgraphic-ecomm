<?php 
	if ($input->get->id) {
		$schematicid = $input->get->text('id');
		$page->title = get_schematic_name(session_id(), $schematicid);
		$is_schematic_loaded = is_schematic_loaded(session_id(), $schematicid);
		if ($is_schematic_loaded) {
			$family = $schematicid;
			$page_category = get_category_from_family($family);
			$cata = get_specific_cat('cata', $page_category, false); $catb = get_specific_cat('catb', $page_category, false); 
			$catc = get_specific_cat('catc', $page_category, false); $catd = get_specific_cat('catd', $page_category, false); 
			$cate = get_specific_cat('cate', $page_category, false); 
			if ($session->tries) {$session->remove('tries'); }
		} else {
			include $config->paths->content.'common/logic-tries-counter.php'; 
			if ($session->tries > 3) {
				throw new Wire404Exception();
			} else {
				header('Location: '.$config->pages->products.'redir/?action=load-schematic&id=' . $input->get->id); //FIX
				exit;	
			}
			
		}
	} else if ($input->get->q) {
		$search = $input->get->text('q');
		$num_of_results = get_schematic_items_count(session_id(), false);
		if ($num_of_results == 1) {
			$page->title = $num_of_results . ' Result for "' . $search . '"';
		} else {
			$page->title = $num_of_results . ' Results for "' . $search . '"';
		}
		
	}
?>
<?php include("./_head.php"); ?>
<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
    <div class="row">
        <div class="col-xs-12">
        	<?php if ($input->get->q) : ?>
                <?php include $config->paths->content.'schematic/search-results.php'; ?>
            <?php elseif ($input->get->id) : ?>
            	<div class="row"> <div class="col-xs-12"><?php include $config->paths->content.'category/bread-crumbs.php'; ?></div> </div>
                <?php include $config->paths->content.'schematic/schematic-page.php'; ?>
            <?php elseif ($input->get->cat) : ?>
            	<div class="row"> <div class="col-xs-12"><?php include $config->paths->content.'category/bread-crumbs.php'; ?></div> </div>
            	<?php include $config->paths->content.'product/filter-results.php'; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include("./_foot.php"); ?>