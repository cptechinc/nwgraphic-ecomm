		<br>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a id="back-to-top" href="#" class="btn btn-default btn-lg back-to-top" role="button"><span class="glyphicon glyphicon-chevron-up"></span></a>

                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                	<div class="col-sm-4">
                    	<p> &copy; <?php echo date('Y'); ?> <?php echo $site->companytitle; ?> All Rights Reserved. </p>
                        Having trouble? Looking for an item and can't find it on our site?
                        Call us, we'd love to help! <a href="tel:<?php echo $site->phone800; ?>"><?php echo $site->phone800; ?></a><p></p>
                    </div>
                    <div class="col-sm-4">
                    	<h4>About <?php echo $site->displayname; ?></h4>
						<ul class="list-inline">
							<li><a href="<?php echo $config->pages->about; ?>">About</a></li>
	                        <li><a href="<?php echo $config->pages->contact; ?>">Contact</a></li>
	                        <li><a href="<?php echo $config->pages->faqs; ?>">FAQs</a></li>
	                        <li><a href="<?php echo $config->pages->info; ?>">Info</a></li>
							<li><a href="<?php echo $config->pages->sds; ?>">Safety Data Sheets</a></li>
							<li><a href="<?php echo $config->pages->privacypolicy; ?>">Privacy Policy</a></li>
							<li><a href="<?php echo $config->pages->returnpolicy; ?>">Return Policy</a></li>
						</ul>
						<p>
							4200 East Lake Street <br>
							Minneapolis, MN 55406
                   		</p>
                    </div>
					<div class="col-sm-4">
						<?php $servicepage = $pages->get('/services/'); ?>
                    	<h4><?php echo $servicepage->title; ?></h4>
						<ul class="list-inline">
							<?php foreach ($servicepage->children() as $service) : ?>
								<li><a href="<?php echo $service->url; ?>"><?php echo $service->title; ?></a></li>
	                        <?php endforeach; ?>
						</ul>
                    </div>
                </div>
                <?php if (100 == 1) : ?>
                <p class="visible-xs-inline-block"> XS </p> <p class="visible-sm-inline-block"> SM </p>
                <p class="visible-md-inline-block"> MD </p> <p class="visible-lg-inline-block"> LG </p>
                <?php endif; ?>
            </div>
        </footer>
        <?php //include $config->paths->content."login/login-modal.php"; ?>

        <?php foreach($config->scripts->unique() as $script) : ?>
        	<script src="<?php echo $script; ?>"></script>
        <?php endforeach; ?>

        <?php include $config->paths->content."common/js-add-cart-msg.php"; ?>
        <?php include $config->paths->content."common/js-set-equal-height.php"; ?>
        <?php if(isset($showsidebar)) {if ($showsidebar) { include $config->paths->content.'common/js-show-nav.php'; }} ?>
        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-96181182-1', 'auto');
		  ga('send', 'pageview');

		</script>
    </body>
</html>
