<?php $page_step = 'confirmation'; ?>
<?php include('./_head.php'); // include header markup ?>
<div class="container page">
    <div class="page-header"> <h1><?php echo $page->get('pagetitle|headline|title'); ?></h1> </div>
    <br>
   <?php include $config->paths->content.'confirmation/confirmation-outline.php'; ?>
</div>
<?php include $config->paths->content.'cart/item-lookup.php'; ?>
<?php $config->scripts->append($config->urls->templates.'scripts/billing/jquery.validate.min.js'); ?>
<?php $config->scripts->append($config->urls->templates.'scripts/billing/jquery.payment.min.js'); ?>
<?php $config->scripts->append($config->urls->templates.'scripts/billing/validate-card.js'); ?>
<?php $config->scripts->append($config->urls->templates.'scripts/billing/billing.js'); ?>

<?php include('./_foot.php'); // include footer markup ?>

