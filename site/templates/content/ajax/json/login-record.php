<?php
	header('Content-Type: application/json');
	$login = get_login_record(session_id());
	echo json_encode(array('response' => $login));
?>
