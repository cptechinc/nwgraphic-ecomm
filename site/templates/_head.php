<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<title><?php echo strip_tags(html_entity_decode($page->get('title|pagetitle|headline|title'))); ?></title>
        <link rel="shortcut icon" href="<?php echo $config->urls->files; ?>images/favicon.ico">
        <link rel="icon" href="<?php echo $config->urls->files; ?>images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" href="<?php echo $config->urls->files; ?>images/apple-icon.png">
		<meta name="description" content="<?php //echo $page->summary; ?>" />
       <meta name="google-site-verification" content="GS4jOltDMwB9TnZC0fTteJJHB3by7qtOCb2QGfIOKD0" />
        <script src="<?php echo $config->urls->templates; ?>scripts/jquery-2.1.4.min.js"></script>
        <?php foreach($config->styles->unique() as $css) : ?>
        	<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>" />
        <?php endforeach; ?>
	</head>
    <body>
    	<div class="welcome-callout hidden-xs">
    		<div class="container ">
    			<strong>Have any questions? We'd love to help.</strong> Give us a call at <?php echo $site->phone800; ?>
			</div>
    	</div>

		<div>
            <div class="container">
            	<br>
            	<div class="row">
            		<div class="col-xs-9 col-sm-6">
                    	<div class="nav-address-block">
                        	<a href="<?php echo $config->pages->index; ?>"><img src="<?php echo $config->urls->files; ?>images/logo.png" class="img-responsive" alt="Northwest Graphic Logo"></a>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-6">
                    	<div class="pull-right visible-xs-inline-block">

                    			<a href="<?php echo $config->pages->account; ?>" class="navbar-brand account-link visible-xs-inline-block">
									<span class="h3"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
								</a>


                    	</div>
                    	<div class="login-navbar pull-right hidden-xs">
                        	<?php if ($user->loggedin) : ?>
                           		<h3>Welcome, <?php echo $user->fullname; ?></h3>
								<form action="<?php echo $config->pages->cart."redir/?action=promo"; ?>" method="POST" >
									<input type="hidden" name="page" value="<?= $config->filename; ?>">
									<div class="form-group">
										<div class="input-group input-group-sm mb-3">
									        <input type="text" class="form-control" name="promo" placeholder="Enter Promo Code Here">
									        <span class="input-group-btn">
									        	<button class="btn btn-sm btn-primary" type="submit">Submit</button>
									        </span>
									    </div>
									</div>
								</form>
								<!-- TODO: fix error message with correct if statement  -->
								<?php if ($user->loggedin) : ?>
									<div class="alert alert-danger alert-dismissible" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  <strong>Warning!</strong> Please enter a valid promo code
									</div>
								<?php else : ?>
									<br>
								<?php endif; ?>
                               	<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                               		<a href="<?php echo $config->pages->orders; ?>" class="btn btn-default">
                               			<i class="glyphicon glyphicon-th-list " aria-hidden="true"></i> View My Orders
                               		</a>
									<a href="<?php echo $config->pages->account; ?>"  class="btn btn-default">
										<i class="glyphicon glyphicon-user" aria-hidden="true"></i> My Account
									</a>
									<a href="<?php echo $config->pages->account."redir/?action=logout"; ?>" class="btn btn-danger">
										<i class="material-icons md-18">&#xE879;</i> Logout
									</a>
                               	</div>

                            <?php else : ?>
	                     		<h3>Welcome To Northwest Graphic</h3>
								Have a Promo Code?
								<form action="<?php echo $config->pages->cart."redir/?action=promo"; ?>" method="POST" >
									<input type="hidden" name="page" value="<?= $config->filename; ?>">
									<div class="form-group">
										<div class="input-group input-group-sm mb-3">
									        <input type="text" class="form-control" name="promo" placeholder="Enter Promo Code Here">
									        <span class="input-group-btn">
									        	<button class="btn btn-sm btn-primary" type="submit">Submit</button>
									        </span>
									    </div>
									</div>
								</form>
								<!-- TODO: fix error message with correct if statement  -->
								<?php if ($user->loggedin) : ?>
									<div class="alert alert-danger alert-dismissible" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  <strong>Warning!</strong> Please enter a valid promo code
									</div>
								<?php else : ?>
									<br>
								<?php endif; ?>
	                     		<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                               		<a href="<?php echo $config->pages->orders; ?>" class="btn btn-default">
                               			<i class="glyphicon glyphicon-th-list " aria-hidden="true"></i> View My Orders
                               		</a>
									<a href="<?php echo $config->pages->account; ?>"  class="btn btn-default">
										<i class="glyphicon glyphicon-user" aria-hidden="true"></i> My Account
									</a>
									<a href="<?php echo $config->pages->login; ?>" class="btn btn-success btn-sm">
										<i class="material-icons md-18">&#xE890;</i> Login
									</a>
                               	</div>

                        	<?php endif; ?>
                        </div>
                	</div>
            	</div><br>
            </div>
        	<?php include ($config->paths->content.'nav/nav.php'); ?>

         </div>
