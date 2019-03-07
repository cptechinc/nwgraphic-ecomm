<?php header('Content-Type: text/xml'); ?>
<?php $error = get_billing_form_error(session_id()); ?>

<form>
	
	<error><![CDATA[<?php echo $error['ermes']; ?>]]></error>
    
</form>