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
            <div class="container hidden-xs">
            	<br>
            	<div class="row">
            		<div class="col-sm-6">
                    	<div class="nav-address-block">
                        	<a href="<?php echo $config->pages->index; ?>"><img src="<?php echo $config->urls->files; ?>images/logo.png" class="img-responsive" alt="Northwest Graphic Logo"></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    	<div class="login-navbar pull-right">
                        	<?php if ($user->loggedin) : ?>
                            	<p>
                                	Welcome, <?php echo $user->fullname; ?>
                                	<a href="<?php echo $config->pages->account."redir/?action=logout"; ?>" class="btn btn-danger btn-sm"> Logout </a>
                                </p>
                                <a href="<?php echo $config->pages->orders; ?>" class="btn btn-primary btn-sm"> View Orders </a>
                                <a href="<?php echo $config->pages->account; ?>" class="btn btn-primary btn-sm"> My Account </a>
                            <?php else : ?>
	                        	<form action="<?php echo $config->pages->account; ?>redir/" method="post">
	                                <input type="hidden" name="action" value="login">
	                                <div class="row">
	                                    <div class="col-sm-6">
	                                        <div class="input-group form-group">
	                                            <span class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></span>
	                                            <input type="text" class="form-control input-sm" name="email" value="" autofocus placeholder="Email">
	                                        </div>
	                                        <div class="input-group form-group">
	                                            <span class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></span>
	                                            <input type="password" class="form-control input-sm" name="password" placeholder="Password">
	                                        </div>
	                                    </div>
	                                    <div class="col-sm-6">
	                                        <button type="submit" class="btn btn-success btn-sm">Sign in</button>
	                                        <a href="<?php echo $config->pages->register; ?>" class="btn btn-primary btn-sm"> Register </a>
	                                    </div>
	                                </div>
	                            </form>
                        	<?php endif; ?>
                        </div>
                	</div>
            	</div><br>
            </div>
        	<?php include ($config->paths->content.'nav/nav.php'); ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <?php include ($config->paths->content."common/search-form.php"); ?>
                    </div>
                </div>
            </div>
         </div>
