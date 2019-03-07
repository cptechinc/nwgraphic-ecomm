<?php 
	if ($user->loggedin) {
		header('location: ' . $config->pages->index); 
	}
?>
   <?php include('./_head.php'); // include header markup ?>
    <div class="container page">
        <!-- <div class="page-header"> <h1 class="blog-title"><?php //echo $page->get('pagetitle|headline|title') ; ?></h1> </div> -->
        <br><br>
        <?php include $config->paths->content.'login/login-form.php'; ?>
    </div>
<?php include('./_foot.php'); // include footer markup ?>