<?php include("./_head.php"); ?>
<?php $config->scripts->append($config->urls->templates.'scripts/screen-printing.js'); ?>
<div class="container page">
    <div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
    <?php echo $page->summary; ?>
    <?php include ($config->paths->content."services/screen-printing/screen-printing-outline.php"); ?>
</div>
<?php include("./_foot.php"); ?>
