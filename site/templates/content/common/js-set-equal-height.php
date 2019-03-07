<?php if (isset($setequalheights)) : ?>
<script>
	$(window).load(function() {
		<?php foreach ($setequalheights as $container) : ?>
			setequalheight('<?php echo $container; ?>');
		<?php endforeach; ?>
	});


	$(window).resize(function(){
		<?php foreach ($setequalheights as $container) : ?>
			setequalheight('<?php echo $container; ?>');
		<?php endforeach; ?>
	});
	
</script>
<?php endif; ?>