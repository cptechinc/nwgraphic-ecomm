<?php

/**
 * Initialization file for template files
 *
 * This file is automatically included as a result of $config->prependTemplateFile
 * option specified in your /site/config.php.
 *
 * You can initialize anything you want to here. In the case of this beginner profile,
 * we are using it just to include another file with shared functions.
 *
 */

	include_once("./_func.php"); // include our shared functions
	include_once($config->paths->templates."_dbfunc.php");

	$config->sessionName = session_name();
	$querystring = return_querystring($config->filename);
	$page->PageURL = $page->httpUrl."?".$querystring;


	$config->styles->append($config->urls->templates.'styles/bootstrap.min.css');
	$config->styles->append('https://fonts.googleapis.com/icon?family=Material+Icons');
	$config->styles->append($config->urls->templates.'styles/libs.css');
	$config->styles->append($config->urls->templates.'styles/styles.css');

	$config->scripts->append($config->urls->templates.'scripts/config.js');
	$config->scripts->append($config->urls->templates.'scripts/bootstrap.min.js');
	$config->scripts->append($config->urls->templates.'scripts/libs.js');
	$config->scripts->append($config->urls->templates.'scripts/scripts.js');


	$user->loggedin = check_if_user_is_logged_in(session_id());
	if ($user->loggedin) {
		$user->fullname = get_login_name(session_id());
		$user->email = get_email_from_login(session_id());
		$user->custID = get_custid_from_login(session_id());
		$user->custname = get_custname_from_login(session_id());
	} elseif ($page->requirelogin == 1) { 
		header('location: ' . $config->pages->login);
		exit;
	}

	$TESTING = false;
	if ($input->get->testing) {
		if ($input->get->text('testing') == 'n') {
			$session->testing = false;
		} else {
			$session->testing = true;
		}
	}

	if (isset($session->testing)) {
		if ($session->testing) {
			$TESTING = TRUE;
			$config->cgi = $config->cgiTEST;
		} else {
			$TESTING = false;
			$config->cgi = $config->cgiPROD;
		}
	}

	$site = $pages->get('/config/');
	
	
