<?php $features = $pages->find("parent=/content/home/features/, template=template-features"); ?>
<?php $count = 1; ?>
<?php foreach ($features as $feature) : ?>
    <hr class="featurette-divider">
    <?php if ($count % 2 == 0) : ?>
        <div class="row featurette">
            <div class="col-sm-5">
                <img class="featurette-image img-responsive center-block" alt="500x500" src="<?php echo $feature->filesManager->url.$feature->images; ?>">
            </div>
            <div class="col-sm-7">
                <h2 class="featurette-heading"><?php echo $feature->title; ?>. <span class="text-muted"><?php echo $feature->headline; ?></span></h2>
                <p class="lead"><?php echo $feature->body; ?></p>
            </div>
        </div>
    <?php else : ?>
        <div class="row featurette">
        	<div class="visible-xs-block">
                <img class="featurette-image img-responsive pull-right" alt="500x500" src="<?php echo $feature->filesManager->url.$feature->images; ?>">
            </div>
            <div class="col-sm-7">
                <h2 class="featurette-heading"><?php echo $feature->title; ?>. <span class="text-muted"><?php echo $feature->headline; ?></span></h2>
                <p class="lead"><?php echo $feature->body; ?></p>
            </div>
            <div class="col-sm-5 hidden-xs">
                <img class="featurette-image img-responsive pull-right" alt="500x500" src="<?php echo $feature->filesManager->url.$feature->images; ?>">
            </div>
        </div>
    <?php endif; ?>
	<?php $count++; ?>
<?php endforeach; ?>