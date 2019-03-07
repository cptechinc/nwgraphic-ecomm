<?php
	$login_status = get_login_status(session_id());
	if ($session->loc) {} else {$session->loc == ''; }
	$L = $session->loc;
	if (isset($session->action)) {
		if ($session->action == 'login') {
			if ($login_status != 'Y') {
				$L = $config->pages->login;	
			} else {
				$L = $config->pages->index;
			}
		}
		unset($session->action);
	}
	if ($L == "") {
		$L = $config->urls->root;
	} elseif ($L == $config->pages->billing_thanks) {
		$errors = get_billing_form_error(session_id());
		if (strlen(trim($errors)) > 0) {
			$L = $config->pages->billing;	
		} 
	} elseif ($login_status != 'Y' || $login_status == 'Y') {
		$error = get_login_error_msg(session_id());
		if ($error == "FIRST LOGIN") {
			$L = $config->pages->password."first-login/";
		} elseif ($error == 'SendEmail') {
			$L = $config->pages->password."forgot/";
		}
	}
	echo 'sfsdafdsa';
	header("location: " . $L);
	exit;

				
			
?>