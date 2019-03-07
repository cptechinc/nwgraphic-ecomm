<?php
	if ($input->post->action) {
		$action = $input->post->text('action');
	} else {
		$action = $input->get->text('action');
	}


	unset($session->ordersearch);
	$custid = get_custID(session_id());
	
	if ($input->get->page) {
		$page = '&page=' . $input->get->page;
	} else {
		$page = '';	
	}
	
	
	if ($input->get->orderby) {
		$with_sort_addon = '&orderby=' . $input->get->orderby . '&ordering-rule=' . $input->get->page->{'ordering-rule'};
	} else {
		$with_sort_addon = '';
	}
	
	$link_addon = $with_sort_addon . $page;

	switch ($action) {
		case 'showtracking':
			$ordn = $input->get->text('ordn');
			$LO = "DBNAME=" . $config->dbName . "\nORDRTRK=" . $ordn;
			$session->loc = $config->pages->orders."?loaded=y&show=tracking&ordn=" . $ordn . "#" . $ordn;
			break;
		case 'get-order-details':
			$ordn = $input->get->text('ordn');
			$LO = "DBNAME=" . $config->dbName . "\nORDRDET=".$ordn."\nCUSTID=" . $custid;
			$session->loc = $config->pages->orders."?loaded=y&ordn=".$ordn.$link_addon."#".$ordn;
			break;
		case 'get-documents':
			$ordn = $input->get->text('ordn');
			$LO = "DBNAME=screen\nORDDOCS=".$ordn;
			$session->loc = $config->pages->orders."?loaded=y&ordn=".$ordn."&show=documents".$link_addon;
			if ($input->get->itemid) {
				$session->loc = $config->pages->orders."?loaded=y&ordn=".$ordn."&show=documents".$link_addon."&itemdoc=".$input->get->itemid;
			}
			$session->loc .= $link_addon . "#".$ordn;
			break;
	case 'order-search':
			$LO = "DBNAME=" . $config->dbName . "\nORDRHED";
			$session->loc = $config->pages->orders.'?loaded=y';
			
			switch ($input->get->text('order-status')) {
				case 'O':
					$os = 'Open Orders';
					break;
				case 'B':
					$os = 'Both Open and Shipped Orders';
					break;
				case 'H':
					$os = 'Shipped Orders';
					break;
				default:
					$os = 'Both Open and Shipped Orders';
			}
			
			if ($input->get->text('query') == '' ) {
				$session->ordersearch = $os;
			} else {
				$session->ordersearch = "'" . $input->get->text('query') . "' In " . $os;
			}
			$LO .= "\nTYPE=" .$input->get->text('order-status');
			
			$LO .= "\n" . strtoupper($input->get->text('search-type'))."=" . $input->get->text('query');
			$session->ordersearch =  "Searching for '". $input->get->text('query') . "' in " . $os;
			if ($input->post->{'date-from'}) {
				$date_from = $input->get->text('date-from');
				$date_thru = "";
				
				if (!$input->post->{'date-through'}) {
					$date_thru = date('m/d/Y');
				} else {
					$date_thru = $input->get->text('date-through');
				}
				if ($date_from != "" || $date_from != NULL) {
					$searchvalu = "Date Range: ".$date_from.' - '.$date_thru;
					$session->ordersearch =  $searchvalu . ' in ' . $os;
				}
				
				$LO .= "\nDATEFROM=".$date_from."\nDATETHRU=".$date_thru;
				$session->loc = $config->pages->orders."?loaded=y";
			}
			
			break;
		default: 
			$custid = get_custid_from_login(session_id());
			$LO = "DBNAME=" . $config->dbName . "\nORDRHED\nCUSTID=".$custid;
			$session->loc =  $config->pages->orders.'?loaded=y';
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