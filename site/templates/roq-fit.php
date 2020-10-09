<?php include('./_head.php'); // include header markup ?>

	<div class="container page">
		<div class="bg-black">
			<div class="row">
				<div class="col-sm-12">
					<div class="image-container">
						<img src="<?= $page->images->last()->url; ?>" alt="">
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-sm-5">
					<?php include $config->paths->content.'roqfit/form.php'; ?>
				</div>
				<div class="col-sm-7" >
					<div class="image-container">
						<img src="<?= $page->images->first()->url; ?>" alt="">
					</div>
					<div style="background-image: url('<?= $page->images->first()->url; ?>');">

					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	// select the target node
var target = document.getElementById('mce-success-response');

// create an observer instance
var observer = new MutationObserver(function(mutations) {
mutations.forEach(function(mutation) {
if (target.innerHTML === "Thank you for subscribing!") {
  target.innerHTML = "Thanks!";
}
});
});

// configuration of the observer:
var config = { attributes: true, childList: true, characterData: true };

// pass in the target node, as well as the observer options
observer.observe(target, config);

	</script>
<?php include('./_foot.php'); // include footer markup ?>
