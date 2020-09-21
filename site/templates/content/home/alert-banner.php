<div data-notify="container" class="col-xs-12 alert alert-<?= $bannerpage->bannertype->value; ?>" role="alert" >
	<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 2147483647;">×</button>
	<span class="h3"><span data-notify="icon" class="glyphicon glyphicon glyphicon-info-sign"></span></span>
	<span data-notify="title" class="h2"><?= $bannerpage->title; ?></span> <br>
	<?= $bannerpage->body; ?>
	<?php if ($bannerpage->files->count()) : ?>
		<h4>Files: <br></h4>
		<?php foreach ($bannerpage->files as $file) : ?>
			<a href="<?= $file->url; ?>" target="_blank" class=""><b><?= $file->description; ?></b> <span data-notify="icon" class="glyphicon glyphicon-share"></span></a>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
