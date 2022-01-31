<?php $num_of_items = get_tview_count(session_id()); ?>
<h4><?php echo $num_of_items; ?> results </h4>
<div class="form-group"> <?php include $config->paths->content.'pagination/pw/pagination-start.php'; ?> </div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
    	<?php $table_headings = get_family_headings(session_id(), false); ?>
        <thead>
			<?php foreach ($table_headings as $table_heading) : ?>
            	<?php $tt = 1; ?>
                <?php $has_values = array(); ?>
                <tr>
                    <?php for ($i = 1; $i < 11; $i++) : ?>
                    	<?php if ($i > 0) : ?>
							<?php if ($table_heading['c' . $i] != '') : ?>
                            	<?php $has_values[$i] = true; ?>
                                <th><?php echo $table_heading['c' . $i]; ?></th>
                                <?php $tt = $i; ?>
                            <?php else : ?>
                                <?php $has_values[$i] = false; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                </tr>
            <?php endforeach; ?>
        </thead>
        <tbody>
        	<?php $rows = get_tview_limit(session_id(), 25, $this_page, false); ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <?php for ($f = 1; $f < 11; $f++) : ?>
                    	<?php if ($f > 0) : ?>
							<?php if ($has_values[$f]) : ?>
                                <?php if ($f == 1) : ?>
                                    <td>
                                        <b>
                                        	<?php if (strlen($row['famid']) > 0) : ?>
                                        		<a href="<?php echo $config->pages->products.'redir/?action=showfamily&fam='.urlencode($row['famid']); ?>"><?php echo $row['c' . $f]; ?></a>
                                        	<?php else : ?>
                                        		<a href="<?php echo $config->pages->products.'?id='.urlencode($row['itemid']); ?>"><?php echo $row['c' . $f]; ?></a>
                    						<?php endif; ?>
                                        </b>
                                    </td>
                                <?php else : ?>
                                    <td><?php echo latin_to_utf($row['c' . $f]); ?></td>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        	<tr>
				<?php for ($i = 1; $i < 11; $i++) : ?>
                    <?php if ($table_heading['c' . $i] != '') : ?> <th><?php echo $table_heading['c' . $i]; ?></th> <?php endif; ?>
                <?php endfor; ?>
            </tr>
		</tfoot>
    </table>
	<?php $total_pages = ceil($num_of_items / 25); ?>

	<?php include $config->paths->content.'pagination/pw/pagination-links.php'; ?>
</div>
