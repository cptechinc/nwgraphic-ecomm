<?php

/**
 * Shared functions used by the beginner profile
 *
 * This file is included by the _init.php file, and is here just as an example. 
 * You could place these functions in the _init.php file if you prefer, but keeping
 * them in this separate file is a better practice. 
 *
 */

/**
 * Given a group of pages, render a simple <ul> navigation
 *
 * This is here to demonstrate an example of a simple shared function.
 * Usage is completely optional.
 *
 * @param PageArray $items
 *
 */
 
 
function renderNav(PageArray $items) {

	if(!$items->count()) return;
	$content = '';
	$content .= "<ul class='list-unstyled'>";

	// cycle through all the items
	foreach($items as $item) {

		// render markup for each navigation item as an <li>
		if($item->id == wire('page')->id) {
			// if current item is the same as the page being viewed, add a "current" class to it
			$content .= "<li class='active'>";
		} else {
			// otherwise just a regular list item
			$content .= "<li>";
		}

		// markup for the link
		$content .= "<a href='$item->url'>$item->title</a> ";

		// if the item has summary text, include that too
		//if($item->summary) $content .= "<div class='summary'>$item->summary</div>";

		// close the list item
		$content .=  "</li>";
	}

	$content .= "</ul>";
	return $content;
}


/**
 * Given a group of pages render a tree of navigation
 *
 * @param Page|PageArray $items Page to start the navigation tree from or pages to render
 * @param int $maxDepth How many levels of navigation below current should it go?
 *
 */
function renderNavTree($items, $maxDepth = 3) {

	// if we've been given just one item, convert it to an array of items
	if($items instanceof Page) $items = array($items);

	// if there aren't any items to output, exit now
	if(!count($items)) return;

	// $out is where we store the markup we are creating in this function
	// start our <ul> markup
	echo "<ul class='nav nav-tree'>";

	// cycle through all the items
	foreach($items as $item) {

		// markup for the list item...
		// if current item is the same as the page being viewed, add a "current" class to it
		if($item->id == wire('page')->id) {
			echo "<li class='current'>";
		} else {
			echo "<li>";
		}

		// markup for the link
		echo "<a href='$item->url'>$item->title</a>";

		// if the item has children and we're allowed to output tree navigation (maxDepth)
		// then call this same function again for the item's children 
		if($item->hasChildren() && $maxDepth) {
			renderNavTree($item->children, $maxDepth-1);
		}

		// close the list item
		echo "</li>";
	}

	// end our <ul> markup
	echo "</ul>";
}



function check_if_user_is_logged_in($session) {
	$valid_login = get_login_status($session);
	if ($valid_login == 'Y') {
		return true;	
	} else {
		return false;	
	}

}


/* =============================================================
   URL FUNCTIONS
 ============================================================ */
 
 function return_querystring($url) {
	 if (strpos($url, '?') !== false) {
		 $url_arr = explode("?", $url); 
		 return $url_arr[1];
	 } else {
		return ''; 
	 }
 }
 
function paginate($url, $page, $insertafter, $hash) {
	if (strpos($url, 'page') !== false) {
		$regex = "((page)\d{1,3})";
		$replace = "page".$page;
		$newurl = preg_replace($regex, $replace, $url); 
	} else {
		$regex = "(($insertafter))";
		$replace = $insertafter."/page".$page."";
		$newurl = preg_replace($regex, $replace, $url);
	}
	 
	return $newurl . $hash;
 }
 

 
 function replace_and_get_whole_url($initial_url, $replace_key_arr, $replace_value_arr) {
	$counter = 0;
	for ($i = 0; $i < sizeof($replace_key_arr); $i++) {
		if ($i == 0) {
			$url = replace_and_get_url($initial_url, $replace_key_arr[$i], $replace_value_arr[$i]);
		} else {
			$url = replace_and_get_url($url, $replace_key_arr[$i], $replace_value_arr[$i]);
		}
	}
	
	return $url;
}

	function replace_and_get_url($url, $replace, $replace_value) {
		$url = clean_url($url);
		if (strpos($url, '&') !== false) {
			$url_split = explode('&', $url, 2); 
			$parameter_string = $url_split[1]; $target_location = $url_split[0];
			$parameter_array = explode('&', $parameter_string);
			$replaced_parameters = return_non_empty_arr(replace_in_query_string($parameter_array, $replace, $replace_value));
			$destination = build_me_url($replaced_parameters, $target_location);
		} else {
			$destination = $url;
		}
		
		
		return $destination;
	}
		function clean_url($url) {
			$url = str_replace('?', '&', $url);
			return $url;
		}
		
		function return_non_empty_arr($array) {
			$array_to_return = array();
			foreach ($array as $element) {
				if ($element != '') {
					array_push($array_to_return, $element);							
				}
			}
			return $array_to_return;
		}
		
		function add_to_query_string($query_string, $value_name, $value) {
			if ($value != 'delete-404') {
				array_push($query_string, ($value_name .'='.$value));
			}
			return $query_string;
		}
		
		function replace_in_query_string($query_string, $replace, $replace_value) {
			$found = false;
			for ($i = 0; $i < sizeof($query_string); $i++) {
				if (strpos($query_string[$i], $replace) !== FALSE) {
					$found = TRUE;
					if ($replace_value == 'delete-404' || $replace_value == 'DELETE-ME') {					
						$query_string[$i] = '';
						} else {
							$match = $query_string[$i];
							$matchArr = explode('=', $match);
							$matchArr[1] = $replace_value;
							$query_string[$i] = $matchArr[0] . '=' . $matchArr[1];
						}
				
				}
			}
			
			if ($found == FALSE) {
				if ($replace_value == 'delete-404' || $replace_value == 'DELETE-ME') {
					
				} else {
					array_push($query_string, ($replace . '='. $replace_value));
				}
			}
			return $query_string;
		}
		
		function build_me_url($query_string, $destination) {
			$counter = 0;
			$url_to_send = $destination;
			foreach ($query_string as $queryitem) {
				if ($counter == 0) {
					$url_to_send .= '?' . $queryitem;	
				} else {
					$url_to_send .= '&' . $queryitem;	
				}
				$counter++;
			}
			return $url_to_send;
		}

function get_order_url($url, $order_by, $ordering_rule, $page_orderby) {		
	$url = replace_and_get_url($url, 'orderby', $order_by, '');
	if ($order_by != $page_orderby) {
		$orderingRule = "ASC";
		$url = replace_and_get_url($url, 'orderpage', 'delete-404', '');
	}
	$url = replace_and_get_url($url, 'ordering-rule', $ordering_rule, '');
	echo $url;
}



/* =============================================================
   ORDERS FUNCTIONS
==============================================================*/
	function get_symbols($ordering_by, $match, $page_ordering_by) {
		$symbol = "";
		if ($ordering_by == $match) {
			if($page_ordering_by == "ASC") {
				$symbol = "&#x25B2;";
				$symbol = "<span class='glyphicon glyphicon-arrow-up'></span>";
			} else {
				$symbol = "&#x25BC;";
				$symbol = "<span class='glyphicon glyphicon-arrow-down'></span>";
			}
		} 
		return $symbol;
	}

	function format_money($amt) {
		return number_format($amt, 2, '.', ',');
	}

	function get_track_link($carrier, $tracknbr) {
		$link = '';
		if (strpos(strtolower($carrier), 'fed') !== false) {
			$link = "https://www.fedex.com/fedextrack/WTRK/index.html?action=track&trackingnumber=".$tracknbr."&cntry_code=us&fdx=1490";
		} else if (strpos(strtolower($carrier), 'ups') !== false) {
			$link = "http://wwwapps.ups.com/WebTracking/track?track=yes&trackNums=".$tracknbr."&loc=en_us";
		} else if (strpos(strtolower($carrier), 'gro') !== false) {
			$link = "http://wwwapps.ups.com/WebTracking/track?track=yes&trackNums=".$tracknbr."&loc=en_us";
		} else if ((strpos(strtolower($carrier), 'will') !== false)) {
			$link = "#$on";
		} else if ((strpos(strtolower($carrier), 'spee') !== false)) {
			$link = "http://packages.speedeedelivery.com/index.php?barcodes=".$tracknbr;
		}
		return $link;
	}

	function get_time($timeString) {
		$partofDay = "";
		$colon = ":";
		$timeAsString = substr($timeString, 0, 2) . $colon . substr($timeString, 2, 2);
		$time = explode($colon, $timeAsString, 2);
		$hour = $time[0];

		$hr = (int)$hour;

		if ($hr == 00) {
			$hr = 12;
			$partofDay = "AM";
		} else if ($hr > 12) {
			$hr = $hr - 12;
			$partofDay = "PM";
		} else {
			$partofDay = "AM";
		}

		$time = strval($hr) . $colon . $time[1].' '.$partofDay;
		return $time;
	}

	function doesitcontain($container, $needle) {
		if (is_array($container)) {
			if (in_array($needle, $container) !== false) {
				return true;
			} else {
				return false;	
			}
		} else {
			if (strpos($needle, $container) !== false) {
				return true;
			} else {
				return false;	
			}
		}
	}


	function show_requirements($field) {
		if (doesitcontain(wire('config')->required_billing_fields, $field)) {
			echo 'required';	
		}
	}

/*==============================================================
   MISC FUNCTIONS
==============================================================*/
 
 
 function latin_to_utf($string) {
	$encode = array("â€¢" => '&bull;', "â„¢" => '&trade;', "â€" => '&prime;');
	foreach ($encode as $key => $value) {
		if (strpos($string, $key) !== false) {
			$string = str_replace($key, $value, $string);
		}
	}
	return $string;
 }
 /*==============================================================
   DB FUNCTIONS
==============================================================*/
	 function returnsqlquery($sql, $oldtonew, $havequotes) {
		$i = 0;
		foreach ($oldtonew as $old => $new) {
			if ($havequotes[$i]) {
				$sql = str_replace($old, "'".$new."'", $sql);
			} else {
				$sql = str_replace($old, $new, $sql);
			}
			$i++;
		}
		return $sql;
	}
	function returnlimitstatement($limit, $page) {
		if ($limit) {
			if ($page > 1 ) {$start_point = ($page * $limit) - $limit; } else { $start_point = 0; }
			return "LIMIT ".$start_point.",".$limit;
		} else {
			return "";
		}
	}
 /*==============================================================
   USER FUNCTIONS
==============================================================*/
