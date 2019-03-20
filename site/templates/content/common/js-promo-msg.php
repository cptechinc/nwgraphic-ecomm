<?php $loginrecord = get_login_record(session_id()); ?>
<?php $promocode = $loginrecord['promocode']; ?>
<?php if ($session->promo) : ?>
	<script>
		<?php if (($loginrecord['ermes']) || ($promocode != $session->promo)) : ?>
			$(function() {
				$.notify({
					icon: "glyphicon glyphicon-remove",
					message: "Invalid Promo Code: <?= $session->promo; ?>" ,
					url: "<?php echo $config->pages->cart; ?>",
					target: '_self'
				},{
					type: "danger",
					url_target: '_self'
				});
			});
		<?php else : ?>
			$(function() {
				$.notify({
					icon: "glyphicon glyphicon-ok",
					message: " Successfully added Promo Code: <?= $session->promo; ?> <br> (Click this message to go to the cart.)" ,
					url: "<?php echo $config->pages->cart; ?>",
					target: '_self'
				},{
					type: "success",
					url_target: '_self'
				});
			});
		<?php endif; ?>
	</script>
<?php endif; ?>
<?php $session->remove('promo'); ?>
