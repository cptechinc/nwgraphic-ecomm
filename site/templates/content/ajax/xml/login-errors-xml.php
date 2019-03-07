<?php header('Content-Type: text/xml'); ?>
<?php $login = get_login_record(session_id()); ?>

<logins>
	
        <login>
            <ermes><![CDATA[<?php echo $login['ermes']; ?>]]></ermes>
            <valid><![CDATA[<?php echo $login['validlogin']; ?>]]></valid>
        </login>
 
</logins>