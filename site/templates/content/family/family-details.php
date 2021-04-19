<?php $pagefamily = get_family($familyID, false); ?>
<?php
	$speca = $pagefamily['speca']; $specb = $pagefamily['specb']; $specc = $pagefamily['specc']; $specd = $pagefamily['specd'];
	$spece = $pagefamily['spece']; $specf = $pagefamily['specf']; $specg = $pagefamily['specg']; $spech = $pagefamily['spech'];
?>
<div class="content-wrapper">
    <div class="item-container">
    	<div class="row">
        	<div class="col-xs-12"><?php include $config->paths->content.'category/bread-crumbs.php'; ?></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <div class="product text-center"> <img id="item-display" src="<?php echo $config->img_location.$pagefamily['image']; ?>" alt=""> </div>
            </div>
            <div class="visible-xs-block"><br><br></div>
            <div class="col-sm-6">
                <h2 class="product-title"><?php echo $pagefamily["name1"]; ?> <?php echo $pagefamily["name2"]; ?></h2>

                <div class="product-desc">
					<?php if ($speca != "") : ?><h4 class="text-primary">Features:</h4><?php endif; ?>
                    <?php include $config->paths->content.'product/show-product-features.php'; ?>
                </div>
                <h4 class="text-primary">Description:</h4>
                <div class="product-desc"> <?php echo $pagefamily['shortdesc']; ?> </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-12">
				<div class="panel panel-primary not-round" id="desc-panel">
					<a href="#desc-div" data-toggle="collapse" class="list-group-item panel-heading">
						<h3 class="panel-title">Read More <span class="caret"></span></h3>
					</a>
					<div id="desc-div" class="collapse" aria-expanded="true">
						<div>
							<div class="panel-body">
								<?php if ($pagefamily['longdesc'] == '<iframe src=info/whichtape.php width=600px height=340px scrolling=no frameborder=0></iframe>') : ?>
									<?= $pages->get('template=template-topicitem,name=which-tape-is-right-for-me')->body; ?>
								<?php else : ?>
									<?php echo $pagefamily['longdesc']; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
        	</div>

        </div>
    </div>
</div>
