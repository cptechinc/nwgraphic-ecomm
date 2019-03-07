<div id="slideshow-carousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php for ($i = 0; $i < sizeof($page->slideshowimages); $i++) : ?>
            <li data-target="#slideshow-carousel" data-slide-to="<?php echo $i; ?>" class="<?php if ($i == 0) {echo 'active'; } ?>"></li>
        <?php endfor; ?>
    </ol>
    
    <div class="carousel-inner" role="listbox">
		<?php $f = 0; ?>
        <?php foreach ($page->slideshow as $image) : ?>
            <div class="item <?php if ($f == 0) {echo 'active'; } ?>">
              	<?php if ($image->link > 1) : ?>
              		<?php 
						switch($pages->get($image->link)->name) {
							case 'categories':
								$url = $pages->get($image->link)->url."?cat=".$image->id; 
								break;
							case 'family':
								$url = $pages->get($image->link)->url."?fam=".$image->id; 
								$url = $config->pages->products."redir/?action=showfamily&fam=$image->id";
								break;
							case 'products':
								$url = $pages->get($image->link)->url."?id=".$image->id; 
								$url = $config->pages->products."redir/?action=itempagey&id=$image->id";
								break;
						}
					?>
					<a href="<?php echo $url; ?>">
						<img src="<?php echo $page->filesManager->url.$image; ?>" alt="<?php echo $image->description; ?>" >
						<?php if (strlen($image->linkdesc) > 0) : ?>
							<div class="carousel-caption"><?php echo $image->linkdesc; ?></div>
						<?php endif; ?>
					</a>
              	<?php else : ?>
              		<img src="<?php echo $page->filesManager->url.$image; ?>" alt="<?php echo $image->description; ?>" >
              		<?php if (strlen($image->description) > 0) : ?>
						<div class="carousel-caption"><?php echo $image->description; ?></div>
          			<?php endif; ?>
           		<?php endif; ?>
            </div>
            <?php $f++; ?>
        <?php endforeach; ?>
    </div>
	 <a class="left carousel-control" href="#slideshow-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#slideshow-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span>
    </a>
</div>