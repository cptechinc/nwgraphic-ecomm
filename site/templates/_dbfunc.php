<?php

/* =============================================================
   CATEGORIES AND FAMILIES
 ============================================================ */
	function get_top_level_categories() {
		$sql = "SELECT * FROM catagory WHERE cat1 = '0' ORDER BY displayOrder";
		$results = wire('database')->query($sql);
		return $results->fetchAll(PDO::FETCH_ASSOC);
	}

	function get_child_count($cat) {
		$count = '';
		$sql = wire('database')->prepare("SELECT COUNT(*) as count FROM catagory WHERE sub = :cat");
		$switching = array(':cat' => $cat);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function get_subcategories($cat) {
		$sql = wire('database')->prepare("SELECT * from catagory WHERE sub = :cat ORDER BY displayOrder");
		$switching = array(':cat' => $cat);
		$sql->execute($switching);
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	function get_families($cat, $debug) {
		$sql = wire('database')->prepare("SELECT famID, name1, name2, image, shortdesc, catid FROM family WHERE catid = :cat AND ftype = 'F'");
		$switching = array(':cat' => $cat); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_family_families($cat, $debug) {
		$sql = wire('database')->prepare("SELECT famID, name1, name2, image, shortdesc, catid FROM family WHERE catid = :cat AND ftype = 'F' ORDER BY famID");
		$switching = array(':cat' => $cat); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_family_families_count($cat) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM family WHERE catid = :cat");
		$switching = array(':cat' => $cat);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function get_tview_count($session) {
		$sql = wire('database')->prepare("SELECT COUNT(*) AS count FROM tview WHERE sessionid = :session AND itemid != ''");
		$switching = array(':session' => $session);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function get_specific_cat($cat, $pagecatid, $debug) {
		$cat_name = '';
		$sql = wire('database')->prepare("SELECT $cat FROM catagory WHERE catid = :pagecatid");
		$switching = array(':pagecatid' => $pagecatid); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}

	function get_category_name($cat, $debug) {
		$cat_name = '';
		$sql = wire('database')->prepare("SELECT catdesc FROM catagory WHERE catid = :cat");
		$switching = array(':cat' => $cat); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}

	function load_category($catid) {
		$sql = wire('database')->prepare("SELECT * FROM catagory WHERE catid = :catid");
		$switching = array(':catid' => $catid); $withquotes = array(true);
		$sql->execute($switching);
		return $sql->fetch(PDO::FETCH_ASSOC);
	}

	function get_family($familyID, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM family WHERE famID = :fam");
		$switching = array(':fam' => $familyID); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetch(PDO::FETCH_ASSOC);
		}
	}

	function get_family_name($fam) {
		$sql = wire('database')->prepare("SELECT name1 FROM family WHERE famID = :fam");
		$switching = array(':fam' => $fam);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function has_tview($sessionID, $debug = false) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM tview WHERE sessionid = :sessionid AND itemid = '' ");
		$switching = array(':sessionid' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return boolval($sql->fetchColumn());
		}
	}

	function get_family_headings($session, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM tview WHERE sessionid = :sessionid AND itemid = '' ");
		$switching = array(':sessionid' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_tview($session) {
		$sql = wire('database')->prepare("SELECT * FROM tview WHERE sessionid = :sessionid AND itemid != ''");
		$switching = array(':sessionid' => $session);
		$sql->execute($switching);
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	function get_tview_limit($session, $limit = 10, $page = 1, $debug) {
		if ($page > 1) { $start_point = ($page * $limit) - $limit; } else { $start_point = 0; }
		$sql = wire('database')->prepare("SELECT * FROM tview WHERE sessionid = :sessionid AND itemid != '' LIMIT $start_point , $limit");
		$switching = array(':sessionid' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_family_pricing($session, $fam) {
		$sql = wire('database')->prepare("SELECT * FROM pricing WHERE familyid = :fam AND sessionid = :sessionid ORDER BY itemid ASC");
		$switching = array(':fam' => $fam, ':sessionid' => $session);
		$sql->execute($switching);
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	function get_family_pricing_count($session, $family) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM pricing WHERE familyid = :fam AND sessionid = :sessionid");
		$switching = array(':fam' => $family, ':sessionid' => $session);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function has_tableview($family) {
		$sql = wire('database')->prepare("SELECT tview FROM family WHERE famID = :fam");
		$switching = array(':fam' => $family);
		$sql->execute($switching);
		if ($sql->fetchColumn() == 'Y') { return true; } else { return false; }
	}

	function isiteminim($itemid, $debug) {
		$sql = wire('database')->prepare("SELECT COUNT(*) AS count FROM im WHERE itemid = :itemid");
 		$switching = array(':itemid'=> $itemid); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			$count = $sql->fetchColumn();
			if ($count > 0) { return true; } else { return false; }
		}
	}

	function get_children($cat, $debug) {
		$sql = wire('database')->prepare("SELECT catid, catdesc, cata, catb, catc, catd, cate, cat1, sub, image from catagory WHERE sub = :cat ORDER BY displayOrder");
		$switching = array(':cat'=> $cat); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function count_sidebar_items($session, $debug) {
		$sql = wire('database')->prepare("SELECT COUNT(*) as count from sidebar WHERE sessionid = :sessionid");
		$switching = array(':sessionid' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}

	}

	function get_sidebar($session, $debug) {
		$sql = wire('database')->prepare("SELECT * from sidebar WHERE sessionid = :sessionid ORDER BY type");
		$switching = array(':sessionid' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_sidebar_type($session, $type, $headingtf, $debug) {
		$heading = '';
		$sql = "SELECT * from sidebar WHERE sessionid = :sessionid AND type = :type AND title != 'Y'";
		if ($headingtf) {$sql = "SELECT * from sidebar WHERE sessionid = :sessionid AND type = :type AND title = 'Y'";}
		$sql = wire('database')->prepare($sql);
		$switching = array(':sessionid' => $session, ':type' => $type); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} elseif ($headingtf) {
			$sql->execute($switching);
			$result =  $sql->fetch(PDO::FETCH_ASSOC);
			return $result['description'];
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

/* =============================================================
   LOGIN FUNCTIONS
 ============================================================ */

	function get_login_record($session) {
		$sql = wire('database')->prepare("SELECT * FROM login WHERE sessionid = :session LIMIT 1");
		$switching = array(':session' => $session);
		$sql->execute($switching);
		return $sql->fetch(PDO::FETCH_ASSOC);
	}

	function get_login_error_msg($session) {
		$error = '';
		$sql = wire('database')->prepare("SELECT ermes FROM login WHERE sessionid = :sessionid");
		$switching = array(':sessionid' => $session);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function get_login_status($session) {
		$vl = 'N';
		$sql = wire('database')->prepare("SELECT validlogin FROM login WHERE sessionid = :sessionid LIMIT 1");
		$switching = array(':sessionid' => $session);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function get_login_name($session) {
		$sql = wire('database')->prepare("SELECT contact FROM login WHERE sessionid = :sessionid LIMIT 1");
		$switching = array(':sessionid' => $session);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function get_custid_from_login($session) {
		$sql = wire('database')->prepare("SELECT custid FROM login WHERE sessionid = :sessionid LIMIT 1");
		$switching = array(':sessionid' => $session);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function get_custname_from_login($session) {
		$sql = "SELECT name FROM login WHERE sessionid = '$session' LIMIT 1";
		$results = wire('database')->query($sql);
		return $results->fetchColumn();
	}

	function get_email_from_login($session) {
		$sql = "SELECT email FROM login WHERE sessionid = '$session' LIMIT 1";
		$results = wire('database')->query($sql);
		return $results->fetchColumn();
	}

	function enter_new_login($session, $email, $contact, $company, $addr1, $addr2, $city, $state, $zip, $country, $phone, $mother, $cityborn, $password, $debug) {
		$sql = wire('database')->prepare("INSERT INTO login (sessionid, email, address1, address2, city, st, zip, contact, passwd, cbi, mmn, country, phone, name, shiptoid) VALUES (:sessionid, :email, :address1, :address2, :city, :state, :zip, :contact, :password, :cbi, :mmn, :country, :phone, :name, '1')");
		$switching = array(':sessionid' => $session, ':email' => $email, ':address1' => $addr1, ':address2' => $addr2, ':city' => $city, ':state' => $state, ':zip' => $zip, ':contact' => $contact, ':password' => $password, ':cbi' => $cityborn, ':mmn' => $mother, ':country' => $country, ':phone' => $phone, ':name' => $company);
		$withquotes = array(true, true, true, true, true, true, true, true, true, true, true, true);
		$sql->execute($switching);
		return returnsqlquery($sql->queryString, $switching, $withquotes);
	}

 /* =============================================================
   BILLING FUNCTIONS
 ============================================================ */
	function get_billing_form_error($session) {
		$sql = "SELECT ermes FROM billing WHERE sessionid = '$session'";
		$results = wire('database')->query($sql);
		return $results->fetchColumn();
	}

	function get_billing_information($session) {
		$sql = "SELECT billing.*, cast(aes_decrypt(ccno, hex(sessionid)) as char charset utf8) as cc, cast(aes_decrypt(xpdate, hex(sessionid)) as char charset utf8) as expirdate, cast(aes_decrypt(vc, hex(sessionid)) as char charset utf8) as cvv FROM billing WHERE sessionid = '$session'";
		$results = wire('database')->query($sql);
		return $results->fetch(PDO::FETCH_ASSOC);
	}

	function get_ordn($session) {
		$sql = "SELECT orders FROM billing WHERE sessionid = '$session'";
		$results = wire('database')->query($sql);
		return $results->fetchColumn();
	}

	function get_shiptos($session) {
		$sql = "SELECT * FROM shipto WHERE sessionid = '$session'";
		$results = wire('database')->query($sql);
		return $results->fetchAll(PDO::FETCH_ASSOC);
	}

	function get_shipvias($session) {
		$sql = "SELECT * FROM shipvia WHERE sessionid = '$session' ORDER BY recno";
		$results = wire('database')->query($sql);
		return $results->fetchAll(PDO::FETCH_ASSOC);
	}

	function edit_billing($sessionid, $billing, $debug) {
		$originalbilling = get_billing_information($sessionid);
		$columns = array_keys($originalbilling);
		$withquotes = $switching = array();
		$setstmt = '';
		foreach ($columns as $column) {
			if (strlen($billing[$column])) {
				if ($originalbilling[$column] != $billing[$column]) {
					$prepped = ':'.$column;
					$setstmt .= $column." = ".$prepped.", ";
					$switching[$prepped] = $billing[$column];
					$withquotes[] = true;
				}
			}
		}
		$setstmt = rtrim($setstmt, ', ');
		$sql = wire('database')->prepare("UPDATE billing SET $setstmt WHERE sessionid = :sessionid");
		$switching[':sessionid'] = $sessionid; $withquotes[] = true;
		if ($debug) {
			return	returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			if (sizeof($switching) > 1) {$sql->execute($switching); }

			return returnsqlquery($sql->queryString, $switching, $withquotes);
		}
	}

	function update_billing_billto($session, $bill_contact, $bill_name, $bill_address, $bill_address2, $bill_city, $bill_state, $bill_zip, $bill_country) {
		$sql = "UPDATE billing SET bconame = '$bill_name', bname = '$bill_contact', baddress = '$bill_address', baddress2 = '$bill_address2',
				bcity = '$bill_city', bst = '$bill_state', bzip = '$bill_zip', bcountry = '$bill_country' WHERE sessionid = '$session'";
		$results = wire('database')->query($sql);
		return $sql;
	}

	function update_billing_shipto($session, $ship_contact, $ship_name, $ship_address, $ship_address2, $ship_city, $ship_state, $ship_zip, $ship_country) {
		$sql = "UPDATE billing SET sconame = '$ship_name', sname = '$ship_contact', saddress = '$ship_address', saddress2 = '$ship_address2',
				scity = '$ship_city', sst = '$ship_state', szip = '$ship_zip', scountry = '$ship_country' WHERE sessionid = '$session'";
		$results = wire('database')->query($sql);
		return $sql;
	}

	//AES_ENCRYPT('$ccno', UNHEX(HEX('$session')))

	function update_billing_order($session, $phone, $email, $pon, $note, $shipvia, $shipcom) {
		$sql = "UPDATE billing SET phone = '$phone', email = '$email', pono = '$pon', shipmeth = '$shipvia', shipcom = '$shipcom', note = '$note' WHERE sessionid = '$session'";
		wire('database')->exec($sql);
		return $sql;
	}

	function update_credit_on_order($session, $paytype, $ccno, $cardcvc, $xpd) {
		$sql = "UPDATE billing SET paymenttype = '$paytype', ccno = AES_ENCRYPT('$ccno', HEX('$session')), xpdate = AES_ENCRYPT('$xpd', HEX('$session')), vc = AES_ENCRYPT('$cardcvc', HEX('$session')) WHERE sessionid = '$session'";
		wire('database')->exec($sql);
		return $sql;
	}

	function get_creditinfo($sessionid) {
		$sql = wire('database')->prepare("SELECT cast(aes_decrypt(ccno, hex(sessionid)) as char charset utf8) as cc, cast(aes_decrypt(xpdate, hex(sessionid)) as char charset utf8) as expirdate, cast(aes_decrypt(vc, hex(sessionid)) as char charset utf8) as cvv, paymenttype FROM billing WHERE sessionid = :sessionid");
		$switching = array(':sessionid' => $sessionid); $withquotes = array(true);
		$sql->execute($switching);
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	function remove_errors($session) {
		$sql = "UPDATE billing SET error = '', ermes = '' WHERE sessionid = '$session'";
		wire('database')->exec($sql);
		return $sql;
	}

	function get_countrystates($country, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM statesandprovinces WHERE country = :country AND abbreviation != ''");
		$switching = array(':country'=> $country); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_countries() {
		$sql = "SELECT * FROM country";
		$results = wire('database')->query($sql);
		return $results->fetchAll(PDO::FETCH_ASSOC);
	}

	function create_billing_record($session) {
		$sql = "INSERT into billing (sessionid) VALUES ('$session')";
		wire('database')->exec($sql);
		return $sql;
	}


 /* =============================================================
   CART FUNCTIONS
 ============================================================ */

 	function get_cart_count($session) {
		$sql = "SELECT COUNT(*) FROM cart WHERE sessionid = '$session' AND itemid != ''";
		$results = wire('database')->query($sql);
		return $results->fetchColumn();
	}

	function get_cart($session) {
		$sql = "SELECT * FROM cart WHERE sessionid = '$session' AND itemid != ''";
		$results = wire('database')->query($sql);
		return $results->fetchAll(PDO::FETCH_ASSOC);
	}

	function get_cart_totals($session) {
		$sql = "SELECT * FROM cart WHERE sessionid = '$session' AND itemid = '' ORDER BY recordno";
		$results = wire('database')->query($sql);
		return $results->fetchAll(PDO::FETCH_ASSOC);
	}
	function get_cart_subtotal($sessionid) {
		$sql = wire('database')->prepare("SELECT SUM(price) FROM cart WHERE sessionid = :sessionid");
		$switching = array(':sessionid' => $sessionid); $withquotes = array(true);
		$sql->execute($switching);
		$subtotal = $sql->fetchColumn();
		if (strlen($subtotal < 1)) {
			$subtotal = "0.00";
		}
		return $subtotal;
	}

 /* =============================================================
   PRODUCT FUNCTIONS
 ============================================================ */
	function get_product_name($session, $itemid) {
		$sql = wire('database')->prepare("SELECT * FROM pricing WHERE itemid = :itemid AND sessionid = :session LIMIT 1");
		$switching = array(':itemid' => $itemid, ':session' => $session); $withquotes = array(true, true);
		$sql->execute($switching);
		$result = $sql->fetch(PDO::FETCH_ASSOC);
		return $result['name1'] . ' ' . $result['vpn'];
	}

	function is_item_loaded($session, $itemid) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM pricing WHERE itemid = :itemid AND sessionid = :session");
		$switching = array(':itemid' => $itemid, ':session' => $session); $withquotes = array(true, true);
		$sql->execute($switching);
		if ($sql->fetchColumn() < 1) {
			return false;
		} else {
			return true;
		}
	}

	function get_item_familyid($session, $itemid, $debug) {
		$sql = wire('database')->prepare("SELECT familyid FROM pricing WHERE itemid = :itemid AND sessionid = :session LIMIT 1");
		$switching = array(':itemid' => $itemid, ':session' => $session); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}

	function get_category_from_family($familyID) {
		$sql = wire('database')->prepare("SELECT catid FROM family WHERE famID = :familyID LIMIT 1");
		$switching = array(':familyID' => $familyID); $withquotes = array(true);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function get_item($session, $itemid, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM pricing WHERE itemid = :itemid AND sessionid = :session LIMIT 1");
		$switching = array(':itemid' => $itemid, ':session' => $session); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_item_im($item, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM im WHERE itemid = :itemid LIMIT 1");
		$switching = array(':itemid' => $itemid); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetch(PDO::FETCH_ASSOC);
		}
	}



	function get_item_search_results_paged($session, $limit = 10, $page = 1, $debug) {
		$limiting = returnlimitstatement($limit, $page);
		$sql = wire('database')->prepare("SELECT * FROM pricing WHERE sessionid = :session AND recordno < 900 $limiting");
		$switching = array(':session' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}



/* =============================================================
   ORDERS FUNCTIONS
 ============================================================ */
 	function get_number_of_orders($session, $debug) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM ordrhed WHERE sessionid = :session AND type = 'O'");
		$switching = array(':session' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}

	function get_orders($session, $limit = 10, $page = 1, $debug) {
		$limiting = returnlimitstatement($limit, $page);
		$sql = wire('database')->prepare("SELECT * FROM ordrhed WHERE sessionid = :session AND type = 'O' $limiting");
		$switching = array(':session' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_order($session, $ordn, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM ordrhed WHERE sessionid = :session AND orderno = :ordn");
		$switching = array(':session' => $session, ':ordn' => $ordn); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetch(PDO::FETCH_ASSOC);
		}
	}

	function get_orders_orderby($session, $limit = 10, $page = 1, $orderingRule, $orderBy, $debug) {
		$limiting = returnlimitstatement($limit, $page);
		$sql = wire('database')->prepare("SELECT * FROM ordrhed WHERE sessionid = :session AND type = 'O' ORDER BY $orderBy $orderingRule $limiting");
		$switching = array(':session' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_orders_orderdate($session, $limit = 10, $page = 1, $orderingRule, $debug) {
		$limiting = returnlimitstatement($limit, $page);
		$sql = wire('database')->prepare("SELECT STR_TO_DATE(orderdate, '%m/%d/%Y') as dateoforder, orderhed.* FROM ordrhed WHERE sessionid = '$session' AND type = 'O' ORDER BY dateoforder $orderingRule $limiting");
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_order_docs($session, $ordn, $debug) {
		$query = wire('database')->prepare("SELECT * FROM orddocs WHERE sessionid = :session AND orderno = :ordn AND itemnbr = ''");
		$switching = array(':session' => $session, ':ordn' => $ordn); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_order_tracking($session, $ordn, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM ordrtrk WHERE sessionid = :session AND orderno = :ordn");
		$switching = array(':session' => $session, ':ordn' => $ordn); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_order_details($session, $ordn, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM ordrdet WHERE sessionid = :session AND orderno = :ordn");
		$switching = array(':session' => $session, ':ordn' => $ordn); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

 	function get_custID($session) {
		$sql = wire('database')->prepare("SELECT custid FROM login WHERE sessionid = :session");
		$switching = array(':session' => $session); $withquotes = array(true);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

/* =============================================================
   SEARCH PAGE FUNCTIONS
 ============================================================ */

	function get_schematic_items($session, $limit = 10, $page = 1, $debug) {
		$limiting = returnlimitstatement($limit, $page);
		$sql = wire('database')->prepare("SELECT * FROM tvsearch WHERE sessionid = :session $limiting");
		$switching = array(':session' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_schematic_items_count($session, $debug) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM tvsearch WHERE sessionid = :session $limiting");
		$switching = array(':session' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}

	function get_item_search_results($session, $limit = 10, $page = 1, $debug) {
		$limiting = returnlimitstatement($limit, $page);
		$sql = wire('database')->prepare("SELECT * FROM pricing WHERE sessionid = :session AND recno < 900 GROUP BY itemid $limiting");
		$switching = array(':session' => $session); $withquotes = array(true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_item_search_results_im($limit = 10, $page = 1, $debug) {
		$limiting = returnlimitstatement($limit, $page);
		$sql = wire('database')->prepare("SELECT * FROM im $limiting");
		$switching = array(); $withquotes = array();
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function get_search_results_filter_family($session, $familyID, $limit = 10, $page = 1, $debug) {
		$limiting = returnlimitstatement($limit, $page);
		$sql = wire('database')->prepare("SELECT * FROM pricing WHERE sessionid = :session AND familydes = :familyID $limiting");
		$switching = array(':session' => $session, ':familyID' => $familyID); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function item_search_results_filter($session, $familyID, $price1, $price2, $manf, $limit, $page, $debug) {
		$limiting = returnlimitstatement($limit, $page);
		$filter = builditemfilter($familyID, $price1, $price2, $manf, 'filter');
		$switching = array(':session' => $session); $withquotes = array(true);
		$withquotes = array_merge($withquotes, builditemfilter($familyID, $price1, $price2, $manf, 'quotes'));
		$switching = array_merge($switching, builditemfilter($familyID, $price1, $price2, $manf, 'switching'));
		$sql = wire('database')->prepare("SELECT * FROM pricing WHERE sessionid = :session $filter $limiting");
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	function item_search_results_filter_count($session, $familyID, $price1, $price2, $manf, $debug) {
		$filter = builditemfilter($familyID, $price1, $price2, $manf, 'filter');
		$switching = array(':session' => $session); $withquotes = array(true);
		$withquotes = array_merge($withquotes, builditemfilter($familyID, $price1, $price2, $manf, 'quotes'));
		$switching = array_merge($switching, builditemfilter($familyID, $price1, $price2, $manf, 'switching'));
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM pricing WHERE sessionid = :session $filter");
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetchColumn();
		}
	}


	function get_num_of_search_results($session) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM pricing WHERE sessionid = :session AND recno < 900");
		$switching = array(':session' => $session); $withquotes = array(true);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

 /* =============================================================
   SCHEMATIC PAGE FUNCTIONS
 ============================================================ */
	function get_schematic_name($session, $schematicid) {
		$sql = wire('database')->prepare("SELECT name1 FROM tvsearch WHERE famID = :schemaid AND sessionid = :session LIMIT 1");
		$switching = array(':session' => $session, ':schemaid' => $schematicid); $withquotes = array(true, true);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function is_schematic_loaded($session, $schematicid) {
		$sql = wire('database')->prepare("SELECT COUNT(*) FROM tvsearch WHERE famID = :schemaid AND sessionid = :session");
		$switching = array(':session' => $session, ':schemaid' => $schematicid); $withquotes = array(true, true);
		$sql->execute($switching);
		return $sql->fetchColumn();
	}

	function get_schematic($session, $schematicid, $debug) {
		$sql = wire('database')->prepare("SELECT * FROM tvsearch WHERE famID = :schematicid AND sessionid = :session LIMIT 1");
		$switching = array(':session' => $session, ':schemaid' => $schematicid); $withquotes = array(true, true);
		if ($debug) {
			return returnsqlquery($sql->queryString, $switching, $withquotes);
		} else {
			$sql->execute($switching);
			return $sql->fetch(PDO::FETCH_ASSOC);
		}
	}

/* =============================================================
   USEFUL MYSQL FUNCTIONS
 ============================================================ */
 	function hexstring($str) {
		$hexedstring = '';
		$query = wire('database')->prepare("SELECT HEX(:str) as hexed");
		$query->bindParam(':str', $str);
		if ($debug) {
			return str_replace(":str", "'".$str."'", $query->queryString);
		} else {
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($results as $result) {
				$hexedstring = $result['hexed'];
			}
			return $hexedstring;
		}
	}

	function unhexstring($str) {
		$unhexedstring = '';
		$query = wire('database')->prepare("SELECT UNHEX(:str) as unhexed");
		$query->bindParam(':str', $str);
		if ($debug) {
			return str_replace(":str", "'".$str."'", $query->queryString);
		} else {
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($results as $result) {
				$unhexedstring = $result['unhexed'];
			}
			return $unhexedstring;
		}
	}
?>
