<?php
	// top navigation consists of homepage and its visible children
	$homepage = $pages->get('/');
	$children = $homepage->children();

	// make 'home' the first item in the navigation
	$children->prepend($homepage);

	if ($TESTING) { $navbar = 'navbar-inverse';  } else { $navbar = 'navbar-default'; }

?>
<nav class="navbar <?php echo $navbar; ?> navbar-static-top navbar-condensed" id="site-nav">
	<div class="container">
		<div class="navbar-header">
			<a href="#" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<i class="material-icons">&#xE5D2;</i>
			</a>
            <?php if ($TESTING) : ?>
            	<a class="navbar-brand" href="<?php echo $config->pages->index; ?>">TESTING - DEBUG</a>
            <?php else : ?>

            <?php endif; ?>
            <a href="<?php echo $config->pages->cart; ?>" class="navbar-brand account-link visible-xs-inline-block">
            	<span class="sr-only">Cart</span>
				<span class="h3"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> </span>
			</a>

		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<?php foreach($homepage->and($homepage->children) as $item) : ?>
                	<?php if ($item->show_in_navbar == 1) : ?>
						<?php if ($item->id == $page->rootParent->id) : ?>
                            <li class="active"><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
                        <?php else : ?>
							<?php if (strtolower($item->title) == "financing") : ?>
								<li><a href="https://www.cit.com/northwest-graphic-supply" target="_blank"><?php echo $item->title; ?></a></li>
							<?php else : ?>
								<li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
							<?php endif; ?>
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
					<?php if (100 == 1) : ?>
						<?php $servicepage = $pages->get('/services/'); ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		                    	<?php echo $servicepage->title; ?> <span class="caret"></span>
		                    </a>
							<ul class="dropdown-menu">
		                        <?php foreach ($servicepage->children() as $service) : ?>
		                        	<li>
		                           		<?php if (strtolower($service->title) == "financing") : ?>
		                           			<a href="https://www.gogc.com/northwestgraphicsupply" target="_blank"><?php echo $service->title; ?></a>
		                           		<?php else : ?>
		                           			<a href="<?php echo $service->url; ?>"><?php echo $service->title; ?></a>
		                           		<?php endif; ?>
		                            </li>
		                        <?php endforeach; ?>
							</ul>
						</li>
					<?php endif; ?>


				</li>
				<li><a href="<?php echo $config->pages->info; ?>">Info</a></li>
				<li><a href="<?php echo $config->pages->sds; ?>">Safety Data Sheets</a></li>
				<li><a href="<?php echo $config->pages->categories."?cat=USED"; ?>">Used Equipment</a></li>
                <li><a href="<?php echo $config->pages->events; ?>">Events</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="cart-li">
					<a href="<?= $config->pages->cart; ?>">
						<span class="glyphicon glyphicon-shopping-cart"></span> Cart : $ <?= get_cart_subtotal(session_id()); ?>
					</a>
				</li>
			</ul>
		</div>
	</div>

</nav>
<div class="search-container">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php include ($config->paths->content."common/search-form.php"); ?>
			</div>
		</div>
	</div>
</div>
