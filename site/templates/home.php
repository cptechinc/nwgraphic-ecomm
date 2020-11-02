<?php include('./_head.php'); ?>
	<div class="container page">
		<?php if ($user->loggedin) : ?>
			<?php $page->title = 'Welcome, '. $user->fullname; ?>
			<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('title') ; ?></h1> </div>
		<?php endif; ?>

		<div class="row">
			<div class="col-sm-3"> <?php include $config->paths->content."category/side-nav.php"; ?> </div>
			<div class="col-sm-9">
				<?php if ($page->splashimage) : ?>
					<div class="text-center">
						<img src="<?= $page->splashimage->url; ?>" class="img-fluid" alt="">
					</div>
				<?php endif; ?>
				<?php $bannerpage = $pages->get('template=home-banner'); ?>
				<?php if ($bannerpage->id) : ?>
					<?php if ($bannerpage->islive) : ?>
						<?php include $config->paths->content.'home/alert-banner.php'; ?>
					<?php endif; ?>
				<?php endif; ?>
				<h2>Featured Items</h2>
				<div class="text-center form-group">
					<?php include $config->paths->content.'home/slideshow.php'; ?>
				</div>

				<?php if ($page->storehoursbanner) : ?>
					<div class="text-center">
						<img src="<?php echo $page->filesManager->url.$page->storehoursbanner; ?>" alt="Seasonal Hours " class="img-responsive">
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php $setequalheights = array('.featured-item .panel-body', '.featured-item .panel-header'); ?>
	<script>
		var collapsesidenav = false;
		<?php if ($page->collapsesidenav == 1) : ?>
			collapsesidenav = true;
		<?php endif; ?>
		$(function() {

			if ($(window).width() < 768) {
				$('#cat-nav').collapse();
			} else if (collapsesidenav) {
				$('#cat-nav').collapse();
			}
		});
	</script>

<?php include('./_foot.php'); // include footer markup ?>
