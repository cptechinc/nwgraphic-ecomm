<div class="panel panel-primary">
    <a href="#cat-nav" data-toggle="collapse" class="list-group-item panel-heading">
    	<h3 class="panel-title">Browse Categories</h3>
    </a>
    <div id="cat-nav" class="collapse in">
    	<div class="panel-body">
            <ul class="list-unstyled">
                <?php $categories = get_top_level_categories(); ?>
                <?php foreach ($categories as $cat) : ?> 
                    <li class="cat0" id="<?php echo $cat['catid']; ?>">
                        <a href="<?php echo $config->pages->categories .'?cat='.urlencode($cat['catid']); ?>"> <?php echo $cat['catdesc']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>  
            <br>
            <div class="image-container">
            	<a href="<?php echo $config->pages->closeouts; ?>">
            		<img src="<?php echo $config->urls->files."images/closeout-ad.png"; ?>" alt="View Close Out Items"> 
            	</a>
            </div>
        </div>
    </div>
</div>