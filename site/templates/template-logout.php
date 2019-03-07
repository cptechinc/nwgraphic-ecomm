<?php if ($user->loggedin) { $page->title = "You are Signed-in as ".$user->fullname; } ?>
<?php include('./_head.php'); // include header markup ?>
    <div class="container page">
        <div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
        <br><br>
        <?php if ($user->loggedin) : ?>
        	<a href="<?php $config->pages->account."redir/"; ?>" class="btn btn-primary btn-lg">Click to Logout</a>
        <?php else : ?>
        	<p>You have signed out. </p>
        <?php endif; ?>
    </div>
<?php include('./_foot.php'); // include footer markup ?>