<?php $schematics = get_schematic(session_id(), $schematicid, false); ?>
<?php 
	foreach ($schematics  as $schematic) { 
		$speca = $schematic['speca']; $specb = $schematic['specb']; $specc = $schematic['specc']; $specd = $schematic['specd'];
		$spece = $schematic['spece']; $specf = $schematic['specf']; $specg = $schematic['specg']; $spech = $schematic['spech'];
	} 
?>

<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="thumbnail">
			<img src="<?php echo $config->img_location.$schematic['schempic']; ?>" class="schematic-img">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<h3>
			<?php echo $schematic['name1']."<br>".$schematic['name2']."<br>".$schematic['name3']."<br>".$schematic['name4']."<br>".$schematic['name5']; ?>
		</h3>
		<?php include $config->paths->content.'product/show-product-features.php'; ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<?php $insertafter = "schematics";  ?>
		<?php include $config->paths->content.'family/table-view.php'; ?>
	</div>
</div>