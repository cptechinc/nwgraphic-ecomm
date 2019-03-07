<?php header('Content-Type: application/json'); ?>

<?php
	//TODO
	$show_on_page = 10;
	if ($input->get->page) {
		$page = $input->get->int('page');
		if (!$page) {
			$page = 1;
		}
	} else {
		$page = 1;
	}

	if ($input->get->id) {
		$items = get_item(session_id(), $input->get->text('id'));
		$num_of_results = 1;
	} else {
		//$items = get_item_search_results(session_id());
		$items = get_item_search_results_paged(session_id(), $show_on_page, $page, false);
		$num_of_results = get_num_of_search_results(session_id());
	}
?>

<?php $item_array = array(); ?>

	<?php foreach($items as $item) : ?>
    	<?php $priceqty = ""; $prices = ""; ?>
    	<?php for ($i = 1; $i <= 6; $i++) : ?>
			<?php if ($item['priceqty'. $i] != 0) : ?>
				<?php $priceqty .= $item['priceqty' . $i] .','; $prices .= $item['priceprice' . $i] .','; ?>
			<?php endif; ?>
		<?php endfor; ?>
        <?php $item['image'] = $config->img_location . $item['image']; ?>
        <?php $item['priceqtys'] = $priceqty; ?>
        <?php $item['prices'] = $prices; ?>
        <?php $item_array[] = $item; ?>
        <?php unset($priceqty); unset($prices); ?>
    <?php endforeach; ?>
    <?php $json_array = array('items' => $item_array); ?>
    <?php $json_array['number_of_results'] = $num_of_results; ?>
    <?php $json_array['page'] = $page; ?>
    <?php $json_array['display'] = $show_on_page; ?>
    <?php echo json_encode($json_array); ?>
