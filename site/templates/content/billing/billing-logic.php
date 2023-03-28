<?php $billing = get_billing_information(session_id()); ?>
<?php
	if ($billing['paymenttype'] != 'bill' && $billing['cc'] == '' && $billing['termtype'] == 'STD') {
		$billing['paymenttype'] = 'bill';
	}
?>
