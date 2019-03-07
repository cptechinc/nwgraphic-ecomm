<?php
	$ordering_rule = "";
	if ($input->get->{'ordering-rule'}) { 
		$input->get->text('ordering-rule');
	} else {
		$ordering_rule = "ASC";
	}
	
	$nextOrder = "";
	if ($ordering_rule == "ASC") {
		$nextorder = "DESC";
	} else if ($ordering_rule == "DESC") {
		$nextorder = "ASC";
	}
	
	$order_by = "";
	if ($input->get->orderby) {
		$order_by = $input->get->text('orderby'); 
	} 

	$orderno_sym = get_symbols($order_by, "orderno", $input->get->text('ordering-rule'));
	$custpo_sym =  get_symbols($order_by, "custpo", $input->get->text('ordering-rule'));
	$orderdate_sym = get_symbols($order_by, "orderdate", $input->get->text('ordering-rule'));
	$status_sym =  get_symbols($order_by, "status", $input->get->text('ordering-rule'));
	$url_no_sort = replace_and_get_url($config->filename, 'orderby', 'delete-404', '');
	$url_no_sort = replace_and_get_url($url_no_sort, 'ordering-rule', 'delete-404', '');
	
	$with_sort_addon = '';
	if ($input->get->orderby) {
		$with_sort_addon = '&orderby=' . $input->get->orderby . '&ordering-rule=' . $input->get->{'ordering-rule'};
	}
	$page_addon = '';
	if ($input->get->page) {
		$page_addon = '&page=' . $input->get->page;
	}
	
	$link_addon = $page_addon . $with_sort_addon; 
	
	if ($input->get->show) { } else { $input->get->show = ''; }
	
?>

<div class="table-responsive" id="table-holder">
	<table class="table table-striped table-condensed" id="recent-orders">
    	<thead>             
            <tr>
                <th>Detail</th> 
                <th><a href="<?php get_order_url($config->filename, "orderno", $nextorder, $order_by); ?>#recent-orders">Order Number <?php echo $orderno_sym; ?></a></th> 
                <th colspan="2"><a href="<?php get_order_url($config->filename, "custpo", $nextorder, $order_by); ?>#recent-orders">Customer PO <?php echo $custpo_sym; ?></a></th>  
                <th><a href="<?php get_order_url($config->filename, "orderdate", $nextorder, $order_by); ?>#recent-orders">Order Date <?php echo $orderdate_sym; ?></a></th>
                <th><a href="<?php get_order_url($config->filename, "status", $nextorder, $order_by); ?>#recent-orders">Status <?php echo $status_sym ; ?></a></th>
                <th colspan="4"><a href="<?php echo $url_no_sort; ?>">Clear Sort</a></th>
            </tr>
        </thead>
        <tbody>
        	<?php 
				if ($order_by != "") {
					if ($order_by == "orderdate") {
						$orders = get_orders_orderdate(session_id(), $config->showonpage, $this_page, $ordering_rule, false);
						$sql = get_orders_orderdate(session_id(), $config->showonpage, $this_page, $ordering_rule, true);
					} else {
						$orders = get_orders_orderby(session_id(), $config->showonpage, $this_page, $ordering_rule, $order_by, false);
						$sql = get_orders_orderby(session_id(), $config->showonpage, $this_page, $ordering_rule, $order_by, true);
					}
				} else {
					$orders = get_orders(session_id(), $config->showonpage, $this_page, false);
					$sql = get_orders(session_id(), $config->showonpage, $this_page, true);
				}
			?>
            <?php foreach($orders as $order) : 
				$on = $order['orderno'];
				$custpo = $order['custpo'];
				$status = $order['status'];
				$orderdate = $order['orderdate'];
				$invdate = $order['invdate'];
				$shipdate = $order['shipdate'];
				$havedoc = $order['havedoc'];
				$havetrk = $order['havetrk'];
				$odrsubtot = $order['odrsubtot'];
				$odrtax = $order['odrtax'];
				$odrfrt = $order['odrfrt'];
				$misc = $order['odrmis'];
				$odrtotal = $order['odrtotal'];
				$havehednote = $order['havenote'];
				$can_edit_order = $order['editord'];
				$error = $order['error'];
				$errorMsg = $order['errormsg'];
				$detail_sym = "+";
				
				if ($on == $ordn) {
					$oni = "";
					$detail_sym = "-";
					$order_link = $config->pages->orders."?loaded=y&ordn=" .$link_addon."#".$on;
					
					$detail_sym = "<a href='".$order_link."' class='btn btn-primary'>-</a>";
					$row_id = 'id="selected"'; 
				} else {
					$oni = $on;
					$order_link = "redir/?action=get-order-details&ordn=" . $oni.$link_addon;
					$detail_sym = "<a href='".$order_link."' class='btn btn-primary'>+</a>";
					$row_id = ''; 
				}
				
				
				
				$order_link .= "#".$oni;
				$track_url = "redir/?action=showtracking&ordn=" . $on.$link_addon; 
				if ($havetrk == 'Y') {
					$tracklink = '
								<a href="'.$track_url.'">
									<span class="sr-only">View Tracking</span>
									<span class="glyphicon glyphicon-plane hover" title="Click to view Tracking"></span>
								</a>';
					
				} else {
					$tracklink = '<a class="greyed-out">
										<span class="sr-only">View Tracking</span>
										<span class="glyphicon glyphicon-plane hover" title="There are no tracking numbers for this order"></span>
								  </a>';
								  $tracklink = '';
				}
				$doc_url = "redir/?action=get-documents&ordn=" . $on . $link_addon; 
				
				if ($havedoc == 'Y') {
					$doclink = '<a href="'.$doc_url.'"> 
									<span class="sr-only">View Documents</span> 
									<span class="glyphicon glyphicon-folder-open" title="Click to view Documents"></span>				
								</a>';
				} else {
					$doclink = '<a class="greyed-out">
									<span class="sr-only">View Documents</span>
									<span class="glyphicon glyphicon-folder-open" title="There are no documents for this order"></span>				
								</a>';
					$doclink = '';
				}
			?>
            	<tr <?php echo $row_id; ?>>
                    <td><?php echo $detail_sym; ?></td> 
                    <td><?php echo $on; ?></td> 
                    <td colspan="2"><?php echo $custpo; ?></td>  
                    <td><?php echo $orderdate; ?></td>
                    <td><?php echo $status; ?></td>
                    <td colspan="4" class="order-actions"><?php echo $tracklink; ?> <?php echo $doclink; ?></td>
                </tr>
                <?php if (($on == $ordn)) : ?>
                	<?php if ($input->get->text('show') == 'documents') : ?>
                    	<tr id="show-docs-header" class="order-details">
                            <td colspan="2"></td> <td>Document Type</td>  <td>Date</td> <td>Time</td> <td colspan="5"></td>
                        </tr>
                        <?php $orderdocs = get_order_docs(session_id(), $on, false); ?>
                        <?php foreach ($orderdocs as $orderdoc) : ?>
                        	<?php $title = $orderdoc['title']; $time = get_time($orderdoc['createtime']); $file = $orderdoc['pathname'];?>
                        	<tr class="order-details">
                                <td></td> <td></td> 
                                <td><a href="<?php echo $config->filepath.$file; ?>" title="Click to View Document" target="_blank" ><?php echo $title; ?></a></td>  
                                <td><?php echo $orderdoc['createdate']; ?></td> <td><?php echo $time; ?></td> <td colspan="5"></td>
                            </tr>
                        <?php endforeach; // END SHOW ORDERDOCS ?>
                    <?php endif; //END SHOW DOCUMENTS ?>
                    <tr class="item-header">
                        <td></td> <td>Item ID / Cust Item ID</td>  <td>Description</td>  <td>Price </td>  <td><abbr title="Unit of Measurement">UoM</abbr></td> 
                        <td>Ordered</td> <td>Shipped</td> <td>Back Order</td> <td>Order Total</td> <td>Reorder</td>
                    </tr>
                    <?php $details = get_order_details(session_id(), $on, false); ?>
                    <?php foreach($details as $detail) : ?>
                    	<?php 
							$lnbr = $detail['linenbr'];  $itemid = $detail['itemid'];  $desc = $detail['desc1']; $descb = $detail['desc2'];  
							$qtyo = $detail['qtyordered'] + 0;  $qtys = $detail['qtyshipped'] + 0; $bo = $detail['qtybackord'] + 0;  
							$itemhavedoc = $detail['haveitemdoc']; $price = format_money($detail['price']); $havedetnote = $detail['havenote']; 
							$extended_amt = format_money($detail['extamt']);

							if ($itemhavedoc == 'Y') {
								$item_doc_link = $config->pages->orders."redir/?action=get-documents&ordn=" . $on . "itemid=" . $itemid . $link_addon;
								$itmdoclink = '<a class="btn btn-primary" href="'.$item_doc_link.'"><span class="sr-only">View Documents</span>
												<span class="glyphicon glyphicon-folder-open" title="Click to view Documents"></span>				
							</a>';
							} else { $itmdoclink = ''; }
							
							if ($itemid != "") {
								$reorder = '
											<form method="post" action="'.$config->pages->cart.'redir/">
												<input type="hidden" name="itemid" value="'.$itemid .'"> <input type="hidden" name="ordn" value="'.$ordn .'">
												<input type="hidden" name="qty" value="'.$qtyo .'"> <input type="hidden" name="page" value="'.$config->filename.'">
												<input type="hidden" name="action" value="reorder">
												<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-shopping-cart"></span>
												</button>
											</form>';
							} else { $reorder = ""; }
						?>
                        <tr class="item-details">
                            <td><?php echo $itmdoclink; ?></td>
                            <td><b><a href="<?php echo $config->pages->products; ?>redir/?action=itempage&id=<?php echo urlencode($itemid); ?>"><?php echo $itemid; ?></a></b></td> 
                            <td><?php echo $desc . ' ' . $descb; ?></td> <td class="text-right">$ <?php echo $price; ?></td> 
                            <td><?php echo $detail['uom']; ?></td> <td class="text-right"><?php echo $qtyo; ?></td>
                            <td class="text-right"><?php echo  $qtys; ?></td> <td class="text-right"><?php echo $bo; ?></td> 
                            <td class="text-right">$ <?php echo $extended_amt; ?></td> <td class="text-center"><?php echo $reorder; ?></td>
                        </tr>
                    <?php endforeach; //END SHOW ORDER DETAILS ?>
                    <?php if ($input->get->show) : ?>
						<?php if ($input->get->text('show') == 'tracking') : ?>
							<?php $trackings = get_order_tracking(session_id(), $on, false); ?>
							<?php foreach($trackings as $tracking) : ?>
								<?php $carrier = $tracking['servtype']; $link = ""; $link = get_track_link($carrier, $tracking['tracknbr']); ?>
								<tr class="order-details tracking">
									<td colspan="2"><strong>Shipped:</strong>  <?php echo $carrier; ?></td> 
									<td>
										<strong>Tracking No.: </strong>
										<?php if ($link == "#$on" ): ?>
											<?php echo $tracking['tracknbr']; ?>
										<?php else : ?>
											<a class="table-hdr" href="<?php echo $link; ?>"target="_blank" title="Click To Track"><?php echo $tracking['tracknbr']; ?> </a>
										<?php endif; ?>
									</td> 
									<td colspan"2"><strong> Weight: </strong><?php echo $tracking['weight'];; ?></td> 
									<td colspan="2"><strong>Ship Date: </strong><?php echo $tracking['shipdate']; ?></td> <td></td> <td></td> <td></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; //END SHOW TRACKING ?>
                    <?php endif; //END SHOW TRACKING ?>
                    <tr class="order-details">
                        <td colspan="4"></td>  <td><b>Subtotal</b></td> 
                        <td colspan="2"></td><td colspan="2" class="text-right">$ <?php echo $odrsubtot; ?></td><td></td>
                    </tr>
                    <tr class="order-details">
                        <td colspan="4"></td> <td><b>Tax</b></td> 
                        <td colspan="2"></td><td colspan="2" class="text-right">$ <?php echo $odrtax; ?></td><td></td>
                    </tr>
                    <tr class="order-details">
                       <td colspan="4"></td> <td><b>Misc.</b></td> 
                       <td colspan="2"></td><td colspan="2" class="text-right">$ <?php echo $misc; ?></td><td></td>
                    </tr>
                    <tr class="order-details">
                        <td colspan="4"></td> <td><b>Total</b></td> 
                        <td colspan="2"></td><td colspan="2" class="text-right">$ <?php echo $odrtotal; ?></td><td></td>
                    </tr>
                    <tr id="last" class="order-details">
                        <td colspan="5"></td>
                        <td colspan="2"></td><td colspan="2" class="text-right"><a href="<?php echo $order_link; ?>" class="btn btn-danger">Close</a></td><td></td>
                    </tr>
                <?php endif; // END SHOW ORDR ?>
            <?php endforeach; //END FOREACH ORDER ?>
        </tbody>
    </table>
    <?php $total_pages = ceil($number_of_orders / $config->showonpage); ?>
    <?php $pagination_link = replace_and_get_url($config->filename, 'page', 'delete-404', ''); $pagination_link .= '&page='; ?>
    <?php include $config->paths->content.'pagination/pagination-links.php'; ?>
</div>