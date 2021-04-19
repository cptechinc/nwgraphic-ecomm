<?php include("./_head.php"); $page_step = 'billing'; ?>
<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
	<?php include $config->paths->content.'billing/billing-outline.php'; ?>
</div>

<?php $config->scripts->append($config->urls->templates.'scripts/billing/jquery.validate.min.js'); ?>
<?php $config->scripts->append($config->urls->templates.'scripts/billing/jquery.payment.min.js'); ?>
<?php $config->scripts->append($config->urls->templates.'scripts/billing/validate-card.js'); ?>
<?php $config->scripts->append(hash_templatefile('scripts/billing/billing.js')); ?>

<?php if ($billing['paymenttype'] != 'bill' && $billing['paymenttype'] != '') : ?>
	<script>
		$(function() { $('select[name="payment-method"]').val('<?php echo strtolower('cc'); ?>').change(); });
    </script>
<?php elseif (strtolower($billing['termtype']) == 'cc') : ?>
	<script>
		$(function() { $('select[name="payment-method"]').val('cc').change(); });
    </script>
<?php endif; ?>
<?php include("./_foot.php"); ?>
