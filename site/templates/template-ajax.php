<?php

	if ($input->urlSegment1 == 'json') {
		switch ($input->urlSegment2) {
			case 'login-record':
				include $config->paths->content . 'ajax/json/login-record.php';
				break;
			case 'price-from-item-qty':
				include $config->paths->content . 'ajax/json/price-from-qty.php';
				break;
			case 'get-billing-custid':
				include $config->paths->content . 'ajax/json/get-billing-record.php';
				break;
			case 'item-search':
				include $config->paths->content . 'ajax/json/item-search.php';
				break;
			case 'recaptcha':
				include $config->paths->content . 'ajax/json/recaptcha.php';
				break;
			case 'get-cat-child':
				include $config->paths->content . 'ajax/json/get-child-categories.php';
				break;
			case 'test':
				include $config->paths->content . 'ajax/json/test.php';
				break;
		}
	} else if ($input->urlSegment1 == 'xml') {
		switch ($input->urlSegment2) {
			case 'get-cat-child':
				include $config->paths->content . 'ajax/xml/get-child-of-cat.php';
				break;
			case 'login-errors-xml':
				include $config->paths->content . 'ajax/xml/login-errors-xml.php';
				break;
			case 'get-billing-custid-xml':
				include $config->paths->content . 'ajax/xml/get-billing-custid-xml.php';
				break;
			case 'get-billing-form-errors-xml':
				include $config->paths->content . 'ajax/xml/get-billing-form-errors-xml.php';
				break;
			case 'item-search':
				include $config->paths->content . 'ajax/json/item-search.php';
				break;
		}
	} else if ($input->urlSegment1 == 'load') {
		switch ($input->urlSegment2) {
			case 'item-search-results':
				include $config->paths->content . 'ajax/load/add-item-search-results.php';
				break;
		}
	} else {
		echo $input->urlSegment1;
		throw new Wire404Exception();
	}

	?>
