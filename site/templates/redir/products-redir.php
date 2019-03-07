<?php
	if ($input->post->action) {
		$action = $input->post->text('action');
	} else {
		$action = $input->get->text('action');
	}
	
	if (isset($session->search)) {
		unset($session->search);	
	}
	switch ($action) {
		case 'generalsearch':
			$search = $input->post->text('query');
			$session->loc = $config->pages->search."?q=" . urlencode($search);
			$LO = "DBNAME=".$config->dbName."\nITNOSRCH=" . $search;
			break;
		case 'showfamily': 
			$family = $input->get->text('fam');
			//$category = urldecode($_GET['cat']);
			//$session->loc = $config->pages->family."?cat=" . $category . "&fam=" . $family;
			$session->loc = $config->pages->family."?fam=" . $family;
			$LO = "DBNAME=". $config->dbName . "\nITEMPRICE\nFAMILY=" . $family;
			break;
		case 'showitem':
			$id = str_replace("--"," ",$input->get->text('id'));
			$session->loc = $config->pages->products."?id=".$input->get->id;
			$LO = "DBNAME=". $config->dbName . "\nITEMPRICE\nITEMFAM=" . $id;
			break;
		case 'itemsearch':	
			$search = $input->get->text('query');
			$session->search = $search;
			$session->loc = $config->pages->products."?q=" . urlencode($search);
			$LO = "DBNAME=".$config->dbName."\nITNOSRCH=" . $search;
			break;
		case 'load-category':
			$category = $input->get->text('cat');
			$session->loc = $config->pages->products."?cat=" . urlencode($category);
			$LO = "DBNAME=". $config->dbName . "\nSIDEBAR=" . $category;
			if ($input->get->fam) {
				$session->loc .= "&fam=" . $input->get->fam;
				$LO = "\nFAMILY=" . $input->get->text('fam');
			}
			
			break;
		case 'load-schematic':
			$family = $input->get->text('id');
			$LO = "DBNAME=". $config->dbName . "\nITEMPRICE\nFAMILY=" . $family;
			$session->loc = $config->pages->schematics."?id=" . urlencode($family);
			break;
		case 'itempage':	
			$search = $input->get->text('id');
			$session->loc = $config->pages->products."?id=" . urlencode($search);
			$LO = "DBNAME=".$config->dbName."\nITNOSRCH=" . $search;
			break;
		default:
			$LO = "DBNAME=".$config->dbName."\nTESTING";
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