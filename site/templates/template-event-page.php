<?php include('./_head.php'); // include header markup ?>
    <div class="container page">
        <div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
		<div class="row form-group">
			<div class="col-sm-6">
				<form action="http://nwgraphic.us1.list-manage1.com/subscribe/post?u=0d4f6c8b72e606862d1d9d6e3&amp;id=aa031a79d1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div class="form-group">
						<label for="mce-EMAIL">Subscribe to e-mail updates about trade events:</label>
						<input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="email address" required>
					</div>

					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div class="hidden"><input type="text" name="b_0d4f6c8b72e606862d1d9d6e3_aa031a79d1" tabindex="-1" value=""></div>
					<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-success">
				</form>
			</div>
		</div>
		
		<?php if ($page->numChildren() > 0) : ?>
			<?php $events = $page->children('sort=startdate'); ?>
			<?php foreach ($events as $event) : ?>
				<a href="<?= $event->url; ?>">
					<div class="event">
						<div class="row">
							<div class="col-sm-2 col-xs-4">
								<div class="date text-center">
									<div class="month">
										<?php echo date('M', strtotime($event->startdate)); ?>
									</div>
									<div class="day">
										<?php echo date('d', strtotime($event->startdate)); ?>
									</div>
								</div>
							</div>
							<div class="col-sm-10 col-xs-8">
								<h4><?php echo $event->title; ?></h4>
								<?php echo $event->body; ?>
							</div>
						</div>
					</div>
				</a>			
			<?php endforeach; ?>
		<?php else : ?>
			<h3>There are no upcoming events</h3>
		<?php endif; ?>
	</div>
<?php include('./_foot.php'); // include footer markup ?>