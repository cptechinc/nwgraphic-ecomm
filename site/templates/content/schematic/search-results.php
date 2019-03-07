<?php $num_of_items = $num_of_results; ?>
<div class="row">
	<div class="col-xs-12 form-group"> <?php include $config->paths->content.'pagination/pw/pagination-start.php'; ?> </div>
    <?php $items = get_schematic_items(session_id(), $config->showonpage, $this_page, false); ?>
</div>

<div id="schematics" class="row list-group">
<?php foreach ($items as $item) : ?>
	<?php 
		$speca = $item['speca']; $specb = $item['specb']; $specc = $item['specc']; $specd = $item['specd'];
		$spece = $item['spece']; $specf = $item['specf']; $specg = $item['specg']; $spech = $item['spech'];
	?>
	<div class="col-xs-6 col-sm-3 schematic-result">
		<div class="thumbnail">
			<div class="schematic-img-container">
				<p class="text-center">
					<img src="<?php echo $config->img_location.$item['image']; ?>" alt="<?php echo $item['name1']; ?> image"/>
				</p>
			</div>
			<div class="caption">
				<h4 class="group inner list-group-item-heading text-center">
					<a href="<?php echo $config->pages->products.'redir/?action=load-schematic&id='.urlencode($item['famID']); ?>"> 
						<?php echo $item['name1']; ?>
					</a>
				</h4>

				<div class="group inner list-group-item-text">
					<p class="text-center">
						<b><?php echo $item['name2']; ?></b> <br> <?php echo $item['name3']; ?> <br> 
						<?php echo $item['name4']; ?> <br> <?php echo $item['name5']; ?>
					</p>
					<div class="row">
						<div class="col-xs-12">
							<a href="<?php echo $config->pages->products.'redir/?action=load-schematic&id='.urlencode($item['famID']); ?>" class="btn btn-primary btn-block">See More</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>
<?php $total_pages = ceil($num_of_items / $config->showonpage); ?>
<?php $insertafter = 'schematics'; ?>
<?php include $config->paths->content.'pagination/pw/pagination-links.php'; ?>
<?php 
	$setequalheights = array(".schematic-result .list-group-item-text", ".schematic-result .schematic-img-container", ".schematic-result .caption h4");
?>