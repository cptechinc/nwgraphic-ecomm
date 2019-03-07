<?php include("./_head.php"); ?>
<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
    <div class="row">
        <div class="col-xs-12">
            <?php include $config->paths->content.'brands/brands-grid.php'; ?>
        </div>
    </div>
</div>
<?php $setequalheights = array('.brand .panel-body', '.brand .panel-header'); ?>
<?php include("./_foot.php"); ?>