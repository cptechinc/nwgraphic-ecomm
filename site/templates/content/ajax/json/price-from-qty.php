<?php header('Content-Type: application/json'); ?>

<?php
	$qty = 1;
	if ($input->get->qty) {
		$qty = $input->get->int('qty');
	}
	if ($input->get->id) {
		$items = get_item(session_id(), $input->get->text('id'));
		$num_of_results = 1;
	}
?>

<?php $item_array = array(); ?>

	<?php foreach($items->fetchAll(PDO::FETCH_ASSOC) as $item) : ?>
    	<?php $priceqty = ""; $price = "";  ?>

    	<?php for ($i = 1; $i <= 6; $i++) : ?>
			<?php if ($item['priceqty'. $i] <= $qty) : ?>
				<?php $priceqty = $i; $price = $item['priceprice'. $i]; ?>
			<?php endif; ?>
		<?php endfor; ?>

        <?php $item['priceqty'] = $priceqty; ?>
        <?php $item['price'] = $price; ?>
        <?php $item_array[] = $item; ?>
        <?php unset($priceqty); unset($price); ?>
    <?php endforeach; ?>
    <?php $json_array = array('results' => $item_array); ?>
    <?php $json_array['number_of_results'] = $num_of_results; ?>
    <?php echo json_encode($json_array); ?>
