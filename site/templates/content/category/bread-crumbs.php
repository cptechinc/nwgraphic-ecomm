<?php if ($categorytree->cata != '' ) : ?>
	<?php $cata_name = get_category_name($categorytree->cata, false); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo $config->urls->root; ?>">Home</a></li>
        
        <?php $cata_name = get_category_name($categorytree->cata, false); ?>
		<?php if ($categorytree->cata == $categorytree->pagecategory && !isset($familyID)) : ?>
			<li class="active"><?php echo $cata_name; ?></li>
		<?php else : ?>
			<li><a href="<?php echo $categorytree->categorylink($categorytree->cata); ?>" title="<?php echo $cata_name; ?> page"><?php echo $cata_name; ?></a></li>
		<?php endif; ?>
       
        <?php if ($categorytree->hascatb) : ?>
			<?php $catb_name = get_category_name($categorytree->catb, false); ?>
			<?php if ($categorytree->catb == $categorytree->pagecategory && !isset($familyID)) : ?>
				<li class="active"><?php echo $catb_name; ?></li>
			<?php else : ?>
				<li><a href="<?php echo $categorytree->categorylink($categorytree->catb); ?>" title="<?php echo $catb_name; ?> page"><?php echo $catb_name; ?></a></li>
			<?php endif; ?>
		<?php endif; ?>
        
        <?php if ($categorytree->hascatc) : ?>
			<?php $catc_name = get_category_name($categorytree->catc, false); ?>
			<?php if ($categorytree->catc == $categorytree->pagecategory && !isset($familyID)) : ?>
				<li class="active"><?php echo $catc_name; ?></li>
			<?php else : ?>
				<li><a href="<?php echo $categorytree->categorylink($categorytree->catc); ?>" title="<?php echo $catc_name; ?> page"><?php echo $catc_name; ?></a></li>
			<?php endif; ?>
		<?php endif; ?>
        
        <?php if ($categorytree->hascatd) : ?>
			<?php $catd_name = get_category_name($categorytree->catd, false); ?>
			<?php if ($categorytree->catd == $categorytree->pagecategory && !isset($familyID)) : ?>
				<li class="active"><?php echo $catd_name; ?></li>
			<?php else : ?>
				<li><a href="<?php echo $categorytree->categorylink($categorytree->catd); ?>" title="<?php echo $catd_name; ?> page"><?php echo $catd_name; ?></a></li>
			<?php endif; ?>
		<?php endif; ?>
        
        <?php if ($categorytree->hascate) : ?>
			<?php $cate_name = get_category_name($categorytree->cate, false); ?>
			<?php if ($categorytree->cate == $categorytree->pagecategory && !isset($familyID)) : ?>
				<li class="active"><?php echo $cate_name; ?></li>
			<?php else : ?>
				<li><a href="<?php echo $categorytree->categorylink($categorytree->cate); ?>" title="<?php echo $cate_name; ?> page"><?php echo $cate_name; ?></a></li>
			<?php endif; ?>
		<?php endif; ?>
        
        <?php if (isset($familyID)) : ?>
        	<?php $familyname = get_family_name($familyID); $familylink = $config->pages->products."redir/?action=showfamily&fam=".$familyID."&cat=".$pagecategory; ?>
            <?php if ($page->name == 'products') : ?>
            	<li><a href="<?php echo $familylink; ?>" title="<?php echo $family_name; ?>page"><?php echo $familyname; ?></a></li>
            <?php else : ?>
            	<li class="active"><?php echo $familyname; ?></li>
            <?php endif; ?>
        <?php endif; ?>
    </ol>
<?php endif; ?>