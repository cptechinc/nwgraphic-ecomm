<?php $ordn = get_ordn(session_id()); ?>
<?php include('./_head.php'); // include header markup ?>
	<div class="container page">
		<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
        <div class="row">
        	<div class="col-xs-12">
            	<?php if ($user->loggedin) : ?>
        			<p>Thank you, <?php echo $user->fullname; ?></p>
				<?php else : ?>
                    <p>Thank you, Guest</p>
                <?php endif; ?>
            	<p> 
                    Your order # <b><?php echo $ordn; ?></b> has been placed. You will be receiving an order confirmation email soon, 
                    but if you have any questions, please call <a href="<?php echo  $site->phone800; ?>"><?php echo  $site->phone800; ?></a>
                    or email us at <b><a href="mailto:<?php echo  $site->email; ?>"><?php echo  $site->email; ?></a></b>
                </p>
                <?php if ($user->loggedin) : ?>
        			<p> Wish to check your order history/status? Click <a href="<?php echo $config->pages->orders; ?>">HERE </a></p>
				<?php else : ?>
                    <p>Wish to register for an account? Click <a href="<?php echo $config->pages->register; ?>">HERE</a></p>
                <?php endif; ?>
            </div>
        </div>
	</div>
<?php include('./_foot.php'); // include footer markup ?>
