<?php include('./_head.php'); ?>
    <div class="container page">
    	
    		<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('title') ; ?></h1> </div>
    	
    	
    	<div class="row">
    		<div class="col-sm-3"> <?php include $config->paths->content."category/side-nav.php"; ?> </div>
    		<div class="col-sm-9">
    			<?php echo $page->body; ?>
    			
    		</div>
    	</div>
    </div>
    <?php $setequalheights = array('.featured-item .panel-body', '.featured-item .panel-header'); ?>
    <script>
    	var collapsesidenav = false;
    	<?php if ($page->collapsesidenav == 1) : ?>
    		collapsesidenav = true;
    	<?php endif; ?>
    	$(function() {

        	if ($(window).width() < 768) {
        		$('#cat-nav').collapse();
        	} else if (collapsesidenav) {
        		$('#cat-nav').collapse();
        	}
    	});
    </script>

<?php include('./_foot.php'); // include footer markup ?>
