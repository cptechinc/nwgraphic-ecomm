<?php header('Content-Type: application/json'); ?>

<?php 
	$qty = 1;
	$items = get_item_search_results_im(10, 1, false);
?>

<?php $item_array = array(); ?>
	
	<?php foreach($items as $item) : ?>
       	<?php $item['sessionid'] = session_id(); ?>
        <?php $item_array[] = $item; ?>
    <?php endforeach; ?>
    <?php $json_array = array('results' => $item_array); ?>
    <?php echo json_encode($json_array); ?>
