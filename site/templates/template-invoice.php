<?php $ordn = $input->get->text('ordn');	?>
<?php include('./_head-bare.php'); // include header markup ?>
<div class="container invoice">
	<br class="no-print">
	<div class="row">
		<div class="col-xs-12">
        	<button class="btn btn-default no-print" onclick="history.back(-1)"><i class="material-icons">&#xE15E;</i> Go Back</button>
        </div>
	</div>
	<?php $order = get_order(session_id(), $ordn, false); ?> 

    	<div class="row">
            <div class="col-xs-6"> <h1> <img src="<?php echo $config->urls->files; ?>images/invoice-logo.png" style="max-width: 100;"> </h1> </div>
            <div class="col-xs-6 text-right non-mono">
                <h1>INVOICE</h1>
                <h1><small>Invoice #<?php echo $ordn; ?></small></h1>
                <h1><small>Order Date: <?php echo $order['orderdate']; ?></small></h1>
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-5">
            	<div class="panel panel-default">
                    <div class="panel-heading"><b>Bill To</b></div>
                    <div class="panel-body">
                        <address>
                            <strong><?php echo $order['sconame']; ?></strong><br>
                            <?php echo $order['sname']; ?><br>
                            <?php echo $order['saddress']; ?><br>
                            <abbr title="Phone">P:</abbr> <?php echo $order['phone']; ?>
                        </address>
                    </div>
                </div>
            </div>
            <div class="col-xs-2"></div>
            <div class="col-xs-5">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Ship To</b></div>
                    <div class="panel-body">
                        <address>
                            <strong><?php echo $order['sconame']; ?></strong><br>
                            <?php echo $order['sname']; ?><br>
                            <?php echo $order['saddress']; ?><br>
                            <abbr title="Phone">P:</abbr> <?php echo $order['phone']; ?>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    	
        <table class="table">
        	<thead>
                <tr>
                    <th> <h4>ITEM ID</h4> </th> <th> <h4>DESCRIPTION</h4> </th> <th> <h4>PRICE</h4></th> <th> <h4>QTY ORDERED</h4> </th>  <th> <h4>SUB TOTAL</h4></th>
                </tr>
            </thead>
            <tbody>
            	<?php $details = get_order_details(session_id(), $ordn, false); ?>
                <?php foreach($details as $detail) : ?>
                	<tr>
                    	<td><?php echo $detail['itemid']; ?></td> <td><?php echo $detail['desc1'] . ' ' . $detail['desc2']; ?></td>
                    	<td><?php echo "$".format_money($detail['price']); ?></td> <td><?php echo ($detail['qtyordered'] + 0); ?></td>
                    	<td class="text-right"><?php echo "$".format_money($detail['extamt']); ?></td>
                    </tr>
                <?php endforeach; ?>    
            	<tr>
                    <td></td> <td></td> <td></td> <td><b>Sub total</b></td> <td class="text-right"><?php echo "$".format_money($order['odrsubtot']); ?></td>
                </tr>
                <tr>
                    <td></td> <td></td> <td></td> <td><b>Tax</b></td> <td class="text-right"><?php echo "$".format_money($order['odrtax']); ?></td>
                </tr>
                <tr>
                    <td></td> <td></td> <td></td> <td><b>Freight</b></td> <td class="text-right"><?php echo "$".format_money($order['odrfrt']); ?></td>
                </tr>
                <tr>
                    <td></td> <td></td> <td></td> <td><b>Total</b></td> <td class="text-right"><?php echo "$".format_money($order['odrtotal']); ?></td>
                </tr>
            </tbody>
        </table>
    
    

    
     
<?php include('./_foot-bare.php'); // include footer markup ?>