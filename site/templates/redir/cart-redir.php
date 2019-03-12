<?php
	if ($input->post->action) {
		$action = $input->post->text('action');
	} else {
		$action = $input->get->text('action');
	}


	switch ($action) {
		case 'add-to-cart':
			$itemid = $input->post->text('itemid');
			$session->loc = $input->post->text('page');
			if ($input->post->text('qty') == '' || $input->post->text('qty') == NULL) {
				$qty = 1;
			} else  {
				$qty = $input->post->text('qty');
			}
			$LO = "DBNAME=".$config->dbName."\nADDTOCART\nitemid=" . $itemid . "\nqty=" . $qty;

			$item = get_item_im($itemid, false);
			$session->addtocart = 'You added ' . $qty . ' ' . $itemid . ' '. $item['name2'] . ' to the cart';
			break;
		case 'reorder':
			$itemid = $input->post->text('itemid');
			$session->loc =  $input->post->text('page') . "#"  . $input->post->text('ordn');
			$LO = "DBNAME=".$config->dbName."\nADDTOCART\nitemid=" . $itemid . "\nqty=" . $input->post->text('qty');
			$item = get_item_im($itemid, false);
			$session->addtocart = 'You added ' . $input->post->text('qty') . ' ' . $itemid . ' '. $item['name2'] . ' to the cart';
			break;
		case 'adjust':
			$itemid = $input->post->text('itemid');
			$session->loc = $input->post->text('page');
			$LO = "DBNAME=".$config->dbName."\nADDTOCART\nitemid=" . $itemid . "\nqty=" . $input->post->text('qty');
			break;
		case 'remove':
			$itemid = $input->post->text('itemid');
			$session->loc = $input->post->text('page');
			$LO = "DBNAME=".$config->dbName."\nADDTOCART\nitemid=" . $itemid . "\nqty=0";
			break;
		case 'prebill':
			$session->loc = $config->pages->billing;
			$LO = "DBNAME=".$config->dbName."\nPREBILL";
			break;
		case 'promo':
			$promo = strtoupper($input->post->text('promo'));
			$LO = "DBNAME=".$config->dbName."\nNWPROMO=" . $promo;

			$session->promo = $promo;

			if ($input->post->text('from-cart')) {
				$session->loc = $config->pages->cart;
			} else {
				$session->loc = $input->post->text('page');
			}
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
