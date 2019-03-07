<?php header('Content-Type: text/xml'); ?>
<?php $billing = get_billing_information(session_id()); ?>

<form>
	
    <custid><![CDATA[<?php echo $billing['custid']; ?>]]></custid>
    
</form>