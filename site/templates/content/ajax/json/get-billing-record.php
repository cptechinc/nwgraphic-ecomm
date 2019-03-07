<?php
	header('Content-Type: application/json');
	$billing = get_billing_information(session_id());

	echo json_encode($billing);

?>
