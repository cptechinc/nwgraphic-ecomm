<?php
	// top navigation consists of homepage and its visible children
	$homepage = $pages->get('/');
	$children = $homepage->children();

	// make 'home' the first item in the navigation
	$children->prepend($homepage);

	if ($TESTING) { $navbar = 'navbar-inverse';  } else { $navbar = 'navbar-default'; }

?>
<nav class="navbar <?php echo $navbar; ?> navbar-static-top" id="site-nav">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<i class="material-icons">&#xE5D2;</i>
			</button>
            <?php if ($TESTING) : ?>
            	<a class="navbar-brand" href="<?php echo $config->pages->index; ?>">TESTING - DEBUG</a>
            <?php else : ?>
				<a class="navbar-brand hidden-sm hidden-md hidden-lg" href="<?php echo $config->pages->index; ?>"><img src="<?php echo $config->urls->files; ?>images/northw.png" height="45" id="header-logo" alt="Northwest Graphic home"> </a>
            <?php endif; ?>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<?php foreach($homepage->and($homepage->children) as $item) : ?>
                	<?php if ($item->show_in_navbar == 1) : ?>
						<?php if ($item->id == $page->rootParent->id) : ?>
                            <li class="active"><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
                        <?php else : ?>
                            <li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
                        <?php endif; ?>
                    <?php endif; ?>
				<?php endforeach; ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    	Products <span class="caret"></span>
                    </a>
					<ul class="dropdown-menu">
                    	<?php $dropdown_cats = get_top_level_categories(); ?>
                        <?php foreach ($dropdown_cats as $dropdown_cat) : ?>
                        	<li>
                            	<a href="<?php echo $config->pages->categories; ?>?cat=<?php echo $dropdown_cat['catid']; ?>"><?php echo $dropdown_cat['catdesc']; ?></a>
                            </li>
                        <?php endforeach; ?>
					</ul>
				</li>
				<li><a href="<?php echo $config->pages->categories."?cat=USED"; ?>">Used Equipment</a></li>
				<?php $servicepage = $pages->get('/services/'); ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    	<?php echo $servicepage->title; ?> <span class="caret"></span>
                    </a>
					<ul class="dropdown-menu">
                        <?php foreach ($servicepage->children() as $service) : ?>
                        	<li>
                            	<a href="<?php echo $service->url; ?>"><?php echo $service->title; ?></a>
                            </li>
                        <?php endforeach; ?>
					</ul>
				</li>
			</ul>
            <ul class="nav navbar-nav navbar-right visible-sm-block">
                <li>
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    	Me <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                    	<?php if ($user->loggedin) : ?>
                            <li> <a href="<?php echo $config->pages->account; ?>">View My Account</a> </li>
                            <li> <a href="<?php echo $config->pages->orders; ?>">View My Orders</a> </li>
                            <li> <a href="<?php echo $config->pages->password; ?>change/">Change Password</a> </li>
                        <?php endif; ?>
                        <li class="cart-li"><a href="<?php echo $config->pages->cart; ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                        <li role="separator" class="divider"></li>

						<?php if ($user->loggedin) : ?>
                            <li><a>Welcome, <?php echo $user->fullname; ?></a> </li>
                            <li class="logout"><a href="<?php echo $config->pages->account; ?>redir/?action=logout">
                            	<span class="glyphicon glyphicon-log-out"></span> Logout</a>
                            </li>
                        <?php else : ?>
                            <li><a href="<?php echo $config->pages->login; ?>"><span class="glyphicon glyphicon-user login"></span> Login</a></li>
                        <?php endif; ?>
                    </ul>

                </li>
                <li><a href="#" class="open-site-search hidden-xs" data-toggle="modal" data-target="#search-modal"><i class="material-icons">&#xE8B6;</i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right hidden-sm">
                <?php //if($page->editable()) echo "<li class='edit'><a href='$page->editUrl'>Edit</a></li>"; ?>
                <li class="cart-li"><a href="<?php echo $config->pages->cart; ?>"> <span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                <?php if ($user->loggedin) : ?>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header hidden-sm hidden-md hidden-lg"><a href="#">Welcome, <?php echo $user->fullname; ?> </a> </li>
                    <li class="visible-xs-inline "> <a href="#">View My Account</a> </li>
                    <li class="dropdown-header hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Welcome, <?php echo $user->fullname; ?>  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu hidden-xs">
                            <?php if ($user->loggedin) : ?>
                                <li> <a href="<?php echo $config->pages->account; ?>">View My Account</a> </li>
                                <li> <a href="<?php echo $config->pages->orders; ?>">View My Orders</a> </li>
                                <li> <a href="<?php echo $config->pages->password; ?>change/">Change Password</a> </li>
                            <?php endif; ?>
                            <li><a href="<?php echo $config->pages->cart; ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                            <li role="separator" class="divider"></li>
                            <?php if ($user->loggedin) : ?>
                                <li class="visible-sm-inline"><a>Welcome, <?php echo $user->fullname; ?></a> </li>
                                <li class="logout"><a href="<?php echo $config->pages->account; ?>redir/?action=logout">
                                    <span class="glyphicon glyphicon-log-out"></span> Logout</a>
                                </li>
                            <?php else : ?>
                                <li><a href="<?php echo $config->pages->login; ?>"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="logout visible-xs-inline ">
                    	<a href="<?php echo $config->pages->account; ?>redir/?action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                <?php else : ?>
                	<li><a href="<?php echo $config->pages->login; ?>" class="login"><i class="mdi mdi-account-circle"></i> Login</a></li>
                <?php endif; ?>
          	</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>
