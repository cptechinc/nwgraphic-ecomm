<script>
	var collapsesidenav = false;
	<?php if ($page->collapsesidenav == 1) : ?>
		collapsesidenav = true;
	<?php endif; ?>
	$(function() {
		showcategorymenu('<?php echo $categorytree->pagecategory; ?>', '<?php echo $categorytree->cata; ?>', '<?php echo $categorytree->catb; ?>', '<?php echo $categorytree->catc; ?>', '<?php echo $categorytree->catd; ?>', '<?php echo $categorytree->cate; ?>');
		
	if ($(window).width() < 768) {
			$('#cat-nav').collapse();
		} else if (collapsesidenav) {
			$('#cat-nav').collapse();
		}
	});
</script>
