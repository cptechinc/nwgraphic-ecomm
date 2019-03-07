<?php 
	header('Content-Type: application/json'); 
	include $config->paths->libraries."ReCaptcha/ReCaptcha.php";
	include $config->paths->libraries."ReCaptcha/RequestMethod.php";
	include $config->paths->libraries."ReCaptcha/RequestParameters.php";
	include $config->paths->libraries."ReCaptcha/Response.php";
	include $config->paths->libraries."ReCaptcha/RequestMethod/Curl.php";
	include $config->paths->libraries."ReCaptcha/RequestMethod/CurlPost.php";
	include $config->paths->libraries."ReCaptcha/RequestMethod/Post.php";
	include $config->paths->libraries."ReCaptcha/RequestMethod/Socket.php";
	include $config->paths->libraries."ReCaptcha/RequestMethod/SocketPost.php";
		
	// Register API keys at https://www.google.com/recaptcha/admin
	$siteKey = '6Lf7aCgTAAAAAGOt48Ca7NHkPESWn18Cj5x5yhcw';
	$secret = '6Lf7aCgTAAAAALRFmY3-3gvJSBUYeVPiYOz9NTtF';
	// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
	$lang = 'en';
	
	$result = '';
	
	if ($siteKey === '' || $secret === '') {
		$result = array('success' => 'false', 'errorcodes' => rtrim($codes, ","));
		
	} elseif ($input->post->{'g-recaptcha-response'}) {
		$captcharesponse = $sanitizer->text($input->post["g-recaptcha-response"]);
		$userip = $input->post->text("user-ip");
		if ($userip != $session->ipaddress) {
			$result = array('success' => 'false', 'errorcodes' => "IP ADDRESS MISMATCH");
		} else {
			$recaptcha = new \ReCaptcha\ReCaptcha($secret);
			$resp = $recaptcha->verify($input->post->text('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);
			if ($resp->isSuccess()) {
				$result = array('success' => 'true', 'errorcodes' => '');
			} else {
				$codes = '';
				foreach ($resp->getErrorCodes() as $code) {
					$codes .= $code.",";
					$result = array('success' => 'false', 'errorcodes' => rtrim($codes, ","));
				}	
			}
		}
	}
	
	$response = array('response' => $result);
	
	echo json_encode($response);
?>