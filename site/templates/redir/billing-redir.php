<?php
	if ($input->post->action) {
		$action = $input->post->text('action');
	} else {
		$action = $input->get->text('action');
	}

	
	switch ($action) {
		case 'prebill':
			$session->loc = $config->pages->billing;
			$LO = "DBNAME=".$config->dbName."\nPREBILL";
			break;
		case 'submit-billing-form':
			//remove_errors(session_id());
			$billing = get_billing_information(session_id());
			
			//update_billing_billto(session_id(), $bill_contact, $bill_name, $bill_address, $bill_address2, $bill_city, $bill_state, $bill_zip, $bill_country);
			//update_billing_shipto(session_id(), $ship_contact, $ship_name, $ship_address, $ship_address2, $ship_city, $ship_state, $ship_zip, $ship_country);
			//update_billing_order(session_id(), $phone, $email, $pon, $note, $shipvia, $shipcom);
			//update_billing_order(session_id(), $phone, $email, $pon, $note, $shipvia, $shipcom);
			
			$billing['bname'] = $input->post->text('bill-contact');
			$billing['bconname'] = $input->post->text('bill-name');
			$billing['baddress'] = $input->post->text('bill-address');
			$billing['baddress2'] = $input->post->text('bill-address2');
			$billing['bcity'] = $input->post->text('bill-city');
			$billing['bst'] = $input->post->text('bill-state');
			$billing['bzip'] = $input->post->text('bill-zip');
			$billing['bcountry'] = $input->post->text('bill-country');
			
			
			$billing['sname'] = $input->post->text('shipto-contact');
			$billing['sconname'] = $input->post->text('shipto-name');
			$billing['saddress'] = $input->post->text('shipto-address');
			$billing['saddress2'] = $input->post->text('shipto-address2');
			$billing['scity'] = $input->post->text('shipto-city');
			$billing['sst'] = $input->post->text('shipto-state');
			$billing['szip'] = $input->post->text('shipto-zip');
			$billing['scountry'] = $input->post->text('shipto-country');
			
			$billing['phone'] = $input->post->text('phone');
			$billing['email'] = $input->post->text('email');
			$billing['pono'] = $input->post->text('pon');
			$billing['shipmeth'] = $input->post->text('shipvia');
			$billing['note'] = $input->post->text('note');
			if ($input->post->text('payment-method') == 'bill') {
				$billing['paymenttype'] = 'bill';
			}
			if ($input->post->text('ship-complete') > 0) {
				$billing['shipcom'] = $input->post->text('ship-complete');
			} else {
				$billing['shipcom'] = 'N';
			}
			
			$session->testsql = edit_billing(session_id(), $billing, true);
			$session->sql = edit_billing(session_id(), $billing, false);
			
			$ccno = str_replace(' ', '', $input->post->text('cardnumber'));
			$cardcvc = $input->post->text('cvc');
			$expiration = str_replace(' ', '', $input->post->text('expdate'));
			
			
			
			if (strlen($ccno) > 0) { $paytype = $input->post->text('card-type'); }
			if ($input->post->{'use-provided-card'}) {
				if 	($input->post->text('use-provided-card') == 'Y') {
					$creditcard = get_creditinfo(session_id());
					$ccno = $creditcard['cc'];
					$expiration = $creditcard['expirdate'];
					$cardcvc  = $creditcard['cvv'];
					$paytype = $creditcard['paymenttype'];
					
				}
			}
			 
			if (strlen($ccno) > 0) {
				
				$session->sql .= "<br><br>" . update_credit_on_order(session_id(), $paytype, $ccno, $cardcvc, $expiration);	
			}
			
			$LO = "DBNAME=".$config->dbName."\nADDTOCART";
			$session->loc = $config->pages->confirmation; 
			break;
		case 'register-for-account':
			$session->loc = '/store/test/';
			create_billing_record(session_id());
			$bill_name = $input->post->text('bill-name');
			$bill_contact = $input->post->text('bill-contact');
			$bill_address = $input->post->text('bill-address');
			$bill_address2 = $input->post->text('bill-address2');
			$bill_city = $input->post->text('bill-city');
			$bill_state = $input->post->text('bill-state');
			$bill_zip = $input->post->text('bill-zip');
			$bill_country = $input->post->text('bill-country');
			$session->sql = update_billing_billto(session_id(), $bill_contact, $bill_name, $bill_address, $bill_address2, $bill_city, $bill_state, $bill_zip, $bill_country);
			
			$ship_contact = $input->post->text('shipto-contact');
			$ship_name = $input->post->text('shipto-name');
			$ship_address = $input->post->text('shipto-address');
			$ship_address2 = $input->post->text('shipto-address2');
			$ship_city = $input->post->text('shipto-city');
			$ship_state = $input->post->text('shipto-state');
			$ship_zip = $input->post->text('shipto-zip');
			$ship_country = $input->post->text('shipto-country');
			$session->sql = update_billing_shipto(session_id(), $ship_contact, $ship_name, $ship_address, $ship_address2, $ship_city, $ship_state, $ship_zip, $ship_country);
			
			$phone = $input->post->text('phone');
			$email = $input->post->text('email');
			$pon = '';
			$shipvia = '';
			$paytype = '';
			$ccno = '';
			$card_cvc = '';
			$xpd = '';
			$note = '';
			$shipcom = '';
			$session->sql = update_billing_order(session_id(), $phone, $email, $pon, $note, $shipvia, $shipcom);
			
			
			$LO = "DBNAME=".$config->dbName."\nNEWACCOUNT";
			break;
		case 'confirm-order':
			$session->loc = $config->pages->billing_thanks;
			$LO = "DBNAME=".$config->dbName."\nBILL";
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