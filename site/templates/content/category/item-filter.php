<?php $sidebar_item_count = count_sidebar_items(session_id(), false); ?>

<?php if ($sidebar_item_count > 0) : ?>

    <div class="list-group item-filter">
    	<?php $familyheading = get_sidebar_type(session_id(), '01', true, false); // FAMILY ?> <a href="#" class="list-group-item heading"><?php echo $familyheading; ?></a>
        <?php $families = get_sidebar_type(session_id(), '01', false, false); ?>
        <?php foreach($families as $family) : ?>
        	<?php if ($input->get->fam) : ?>
            	<?php if ($input->get->text('fam') == $family['code']) : ?>
                	<a href="<?php echo replace_and_get_url($config->filename, 'fam', urlencode($family['code'])); ?>" class="list-group-item">
						<?php echo $family['description']; ?>
                    </a>
                <?php endif; ?>
            <?php else : ?>
                <a href="<?php echo replace_and_get_url($config->filename, 'fam', urlencode($family['code'])); ?>" class="list-group-item">
                    <?php echo $family['description']; ?>
                </a>
            <?php endif; ?>
        <?php endforeach;  ?>

        <?php if ($input->get->fam) : ?>
        	<a href="<?php echo replace_and_get_url($config->filename, 'fam', 'delete-404'); ?>" class="list-group-item">
				Clear filter
            </a>
        <?php endif; ?>

        <?php $priceheading = get_sidebar_type(session_id(), '02', true, false); // Price ?> <a href="#" class="list-group-item heading"><?php echo $priceheading; ?></a>
        <?php $prices = get_sidebar_type(session_id(), '02', false, false); ?>
        <?php foreach($prices as $price) : ?>
            <?php if ($input->get->price) : ?>
            	<?php if ($input->get->text('price') == $price['code']) : ?>
                	<a href="<?php echo replace_and_get_url($config->filename, 'price', urlencode($price['code'])); ?>" class="list-group-item">
						<?php echo $price['description']; ?>
                    </a>
                <?php endif; ?>
            <?php else : ?>
                <a href="<?php echo replace_and_get_url($config->filename, 'price', urlencode($price['code'])); ?>" class="list-group-item">
					<?php echo $price['description']; ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($input->get->price) : ?>
        	<a href="<?php echo replace_and_get_url($config->filename, 'price', 'delete-404'); ?>" class="list-group-item">
				Clear filter
            </a>
        <?php endif; ?>

        <?php $manfheading = get_sidebar_type(session_id(), '03', true, false); // Manufacturer?> <a href="#" class="list-group-item heading"><?php echo $manfheading; ?></a>
        <?php $manufacturers = get_sidebar_type(session_id(), '03', false, false); ?>
        <?php foreach($manufacturers as $manufacturer) : ?>
            <?php if ($input->get->manf) : ?>
            	<?php if ($input->get->text('manf') == $price['code']) : ?>
                	<a href="<?php echo replace_and_get_url($config->filename, 'manf', urlencode($manufacturer['code'])); ?>" class="list-group-item">
					<?php echo $manufacturer['description']; ?>
                </a>
                <?php endif; ?>
            <?php else : ?>
                <a href="<?php echo replace_and_get_url($config->filename, 'manf', urlencode($manufacturer['code'])); ?>" class="list-group-item">
					<?php echo $manufacturer['description']; ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($input->get->manf) : ?>
        	<a href="<?php echo replace_and_get_url($config->filename, 'manf', 'delete-404'); ?>" class="list-group-item">
				Clear filter
            </a>
        <?php endif; ?>

    </div>
<?php endif; ?>

<?php unset($family); unset($price); ?>
