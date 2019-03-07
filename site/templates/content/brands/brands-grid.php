
<?php foreach($page->brand_repeater as $brand) : ?>

   	<div class="col-xs-6 col-sm-3 brand">
    	<div class="panel panel-default">
            <div class="panel-body text-center">
                <a href="/store/products/categories/?cat=SecurityFixtures">
                    <img class="group list-group-image" src="<?php echo $config->urls->files; ?>images/brands/<?php echo str_replace(' ', '', $brand->brand); ?>.png" alt="">
                </a>
            </div>
            <div class="panel-footer">
                <span class="h4">
                    <a href="/store/products/categories/?cat=SecurityFixtures"> <?php echo $brand->brand; ?> </a> <i class="material-icons"></i>
                </span>
            </div>
        </div>
    </div>

<?php endforeach; ?>
