<?php 
	$session->ipaddress = $_SERVER['REMOTE_ADDR'];
	
	if (isset($input->urlSegment1)) {
		
		switch ($input->urlSegment1) {
			case 'thanks':
				break;
			case 'consumer':
				$page->title = 'Register for a consumer Account';
				$includefile = $config->paths->content.'register/consumer-register-outline.php';
				break;	
			case 'existing':
				$page->title = 'Existing Customer Account Registration';
				$includefile = $config->paths->content.'register/existing-customer-form.php';
				break;
			case 'business':
				break;
			default:
				$page->title = 'Register for an Account'; 
				$includefile = $config->paths->content.'register/nw-graphic-form.php';
				break;
			
		}
	} else {
		$page->title = 'Register for an Account'; 
		$includefile = $config->paths->content.'register/nw-graphic-form.php';
	}

	$config->scripts->append($config->urls->templates.'scripts/register.js');

?>


<?php include("./_head.php"); ?>

<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
    <?php include $includefile; ?>
</div>


<?php include("./_foot.php"); ?>