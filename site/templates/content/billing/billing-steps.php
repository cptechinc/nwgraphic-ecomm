<?php $billing_steps = array("cart" => "Cart", "billing" => "Shipping / Payment", "confirmation" => "Review / Confirmation", "done" => "Done"); ?>
<?php $links = array('', $config->pages->cart, $config->pages->billing, $config->pages->confirmation , '#'); $count = 1; $on_step = 1000; ?>


<?php foreach ($billing_steps as $key => $value) : ?>
	<?php if ($key == $page_step) : ?>
        <?php $on_step = $count; ?>
    <?php endif; ?>
    <?php $count++; ?>
<?php endforeach; ?>
<?php $percent = $on_step * 25; $count = 1; ?>
<div class="progress" id="progress">
  <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent; ?>%">
    <span ><?php echo $percent; ?>% Complete</span>
  </div>
</div>

<table class="table table-bordered">
    <?php foreach ($billing_steps as $key => $value) : ?>
        <?php if ($key == $page_step) : ?>
            <td class="process-step text-center active">
            	<a>
                    <span class="btn btn-primary btn-circle"><?php echo $count; ?></span>
                    <p><?php echo $value; ?></p>
                </a>
            </td>
            <?php $on_step = $count; ?>
        <?php elseif ($count > $on_step) : ?>
            <td class="process-step text-center">
            	<a href="<?php echo $links[$count]; ?>">
                    <span class="btn btn-default btn-circle"><?php echo $count; ?></span>
                    <p><?php echo $value; ?></p>
                </a>
            </td>
        <?php else : ?>
            <td class="process-step text-center">
            	<a href="<?php echo $links[$count]; ?>">
                    <span class="btn btn-default btn-circle"><?php echo $count; ?></span>
                    <p><?php echo $value; ?></p>
                </a>
            </td>
        <?php endif; ?>
        <?php $count++; ?>
    <?php endforeach; ?>
</table>

