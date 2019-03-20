<?php
	if ($input->post->action) {
		$action = $input->post->text('action');
	} else {
		$action = $input->get->text('action');
	}

	switch ($action) {
		case 'login':
			if ($input->post->email) {
				$email = $input->post->text('email');
				$pass = $input->post->text('password');
				$LO = "DBNAME=".$config->dbName."\nLOGIN=" . $email . "\nPSWD=" . $pass;
				$session->loc = $config->pages->login;
				$session->action = 'login';
			}
			break;
		case 'login-return':
			if ($input->post->email) {
				$email = $input->post->text('email');
				$pass = $input->post->text('password');
				$LO = "DBNAME=".$config->dbName."\nLOGIN=" . $email . "\nPSWD=" . $pass;
				$session->loc = $input->post->text('page');
				$session->action = 'login';
			}
			break;
		case 'logout':
			$LO = "DBNAME=".$config->dbName."\nLOGOUT";
			$session->remove('promo');
			$session->loc = $config->pages->loggedout;
			break;
		case "forgot-password":
			$email = $input->post->text('email');
			$mother = $input->post->text('maiden');
			$cityborn = $input->post->text('city');
			$LO = "DBNAME=".$config->dbName."\nFORGOT PASS \nEMAIL=". $email ." \nMMN=".$mother." \nCBI=". $cityborn;
			$session->loc = $input->post->text('page');
			break;
		case "change-password":
			$email = $input->post->text('email');
			$password = $input->post->text('current-password');
			$newpassword = $input->post->text('new-password');
			$LO = "DBNAME=".$config->dbName."\nCHANGE PASS \nEMAIL=". $email ." \nPASS=".$password."\nNPASS=". $newpassword;
			break;
		case "register-existing-customer":
			$email = $input->post->text('email');
  			$password = $input->post->text('password');
  			$shipid = $input->post->text('shipid');
  			$custid = $input->post->text('acct-number');
 			$contact = $input->post->text('contact');
  			$invoiceone = $input->post->text('invoice1');
  			$invoicetwo = $input->post->text('invoice2');
  			$maiden = $input->post->text('mmn');
  			$bornin = $input->post->text('born-in');

 			$LO = "DBNAME=".$config->dbName."\nEXTCUST \nEMAIL=". $email ." \nPASS=".$password."\nCUSTID=". $custid."\nSHIPID=".$shipid."\nMMN=".$maiden;
			$LO .= "\nCBI=".$bornin."\nINV1=".$invoiceone."\nINV2=".$invoicetwo."\nCONTACT=".$contact;
			break;
		case 'set-up-recovery':
			$email = $input->post->text('email');
			$pass = $input->post->text('pass');
			$mothermaiden = $input->post->text('maiden');
			$cityborn = $input->post->text('city');
			$newpass = $input->post->text('npass');
			$confirmnewp = $input->post->text('cpass');
			$LO = "DBNAME=".$config->dbName."\nFIRST CHANGE PASS \nEMAIL=". $email ." \nPASS=".$pass."\nNPASS=". $confirmnewp." \nMMN=".$mothermaiden." \nCBI=". $cityborn;
			break;
		case 'register-new-account':
			$email = $input->post->text('email');
			$contact = $input->post->text('contact');
			$mother = $input->post->text('mmn');
			$password = $input->post->text('password');
			$cityborn = $input->post->text('cityborn');
			$company = $input->post->text('company');
			$addr = $input->post->text('address');
			$addr2 = $input->post->text('address2');
			$city = $input->post->text('city');
			$zip = $input->post->text('bill-zip');
			$state = $input->post->text('state');
			$country = $input->post->text('country');
			$phone = $input->post->text('phone');


			$session->sql = enter_new_login(session_id(), $email, $contact, $company, $addr, $addr2, $city, $state, $zip, $country, $phone, $mother, $cityborn, $password, true);
			$session->sql .= "<br>" . date('G:i');
			$session->loc = $config->pages->index;
			$LO = "DBNAME=".$config->dbName."\nNEWLOGIN\nemail=" . $email;
			break;
	}

	$vard = "/usr/capsys/ecomm/" . session_id();
	$g = $LO;
	$handle = fopen($vard, "w") or die("cant open file");
	fwrite($handle, $g);
	fclose($handle);
	header("location: /cgi-bin/" . $config->cgi . "?fname=" . session_id());

 	exit;
?>
