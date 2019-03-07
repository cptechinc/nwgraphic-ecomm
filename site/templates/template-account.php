<?php include('./_head.php'); // include header markup ?>
	<div class="container page">
		<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
		<section class="row">
			<article class="col-sm-3 col-md-3 col-lg-3 account">
				<div class="profile bg-primary">
					<h1 class="text-center"><span class="glyphicon glyphicon-user"></span></h1>
					<p><?php echo $user->fullname; ?></p>
                    <p><?php echo $user->custID.' - '. $user->custname; ?></p>
					<p><?php echo $user->email; ?></p>
				</div>
				<ul class="list-group">
					<a href="<?php echo $config->pages->password; ?>change/" class="list-group-item">Change Password</a>
					<a href="<?php echo $config->pages->orders; ?>" class="list-group-item">View My Orders</a>
					<a href="<?php echo $config->pages->account; ?>redir/?action=logout" class="list-group-item logout">
						<span class="glyphicon glyphicon-log-out"></span> Log Out
					</a>
				</ul>
			</article>
		</section>
	</div>
<?php include('./_foot.php'); // include footer markup ?>

