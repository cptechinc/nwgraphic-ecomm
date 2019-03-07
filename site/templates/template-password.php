<?php 
	if ($input->urlSegment1 == 'forgot') {
		$page->title = 'Forgot Password'; 	 
	} elseif ($input->urlSegment1 == 'change') {
		$page->title = 'Change Password'; 
	} elseif ($input->urlSegment1 == 'first-login') {
		$page->title = 'Answer Recovery Questions'; 
	} else {
		throw new Wire404Exception(); 
	}
?>
<?php include("./_head.php"); ?>

<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
    <?php 
		if ($input->urlSegment1 == 'forgot') {
			include $config->paths->content.'password/forgot-password.php';
		} elseif ($input->urlSegment1 == 'change') {
			include $config->paths->content.'password/change-password.php';
		} elseif ($input->urlSegment1 == 'first-login') {
			include $config->paths->content.'password/recovery-password.php';
		}
	?>
</div>

<?php include("./_foot.php"); ?>