<?php 
	header('Content-Type: application/json');
    $category = $input->get->text('cat');
    $children = get_children($category, false);

    echo json_encode($children);

?>
