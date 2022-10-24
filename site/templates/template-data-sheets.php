<?php include("./_head.php"); ?>
<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
    <?php $brands = $pages->get('/brands/'); ?>
    <div class="row">
        <?php foreach ($brands->children('sort=name') as $brand) : ?>
            <div class="col-sm-3 brand">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="h4"><?php echo $brand->title; ?></span>
                    </div>
                    <div class="panel-body text-center">
						<?php if ($brand->images) : ?>
							<div>
								<img class="" src="<?php echo $brand->filesManager->url.$brand->images->first(); ?>" alt="<?php echo $brand->title." logo"; ?>"  width="150" height="100">
							</div> <br>
						<?php endif; ?>

                        <?php $files = array_filter(glob($config->sdspath.strtolower($brand->name)."/*"), 'is_file'); ?>
                        <?php if (sizeof($files) > 0 ) : ?>
                            <select name="" id="" class="form-control form-group load-datasheet">
                                <option value="n/a">Choose One</option>
                                <?php foreach ($files as $file) : ?>
                                    <option value="<?php echo $config->sdshref . strtolower($brand->name)."/".  ltrim($file, $config->sdspath.strtolower($brand->name)); ?>">
                                        <?php echo rtrim(ltrim($file, $config->sdspath.strtolower($brand->title)), '.pdf'); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <a href="#" class="btn btn-default view-datasheet disabled" target="_blank" >View </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>
<script>
    $(function() {
        $('.load-datasheet').change(function() {
            var href = $(this).val();
            if (href !== 'n/a') {
                $('.view-datasheet').addClass('disabled btn-default').removeClass('btn-primary');
                var target = $(this).parent().find('.view-datasheet');
                var name = $(this).find('option:selected').text().trim();
                target.attr('href', href);
                target.removeClass('disabled btn-default').addClass('btn-primary');
            }
        });
    });
</script>
<?php $setequalheights = array('.brand .panel'); ?>
<?php include("./_foot.php"); ?>
