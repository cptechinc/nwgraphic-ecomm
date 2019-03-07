<?php 
	if (!$user->loggedin) {
		header('location: '.$config->pages->login);
		exit;	
	}

	if (!$input->get->loaded) {
		header('location: '.$config->pages->orders."redir/");
		exit;	
	} else {
		$number_of_orders = get_number_of_orders(session_id(), false); 	
	}
	
	if ($input->get->ordn) {
		$ordn = $input->get->text('ordn');
	} else {
		$ordn = '';	
	}
?>
<?php $email = get_email_from_login(session_id()); ?>
<?php include('./_head.php'); // include header markup ?>
	<div class="container page">
		<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
		<div class="panel panel-primary">
			<?php if ($session->ordersearch) : ?>
				<div class="panel-heading"><h3 class="panel-title"><?php echo $session->ordersearch; ?> (<?php echo $number_of_orders; ?>)</h3></div>
			<?php else : ?>
				<div class="panel-heading"><h3 class="panel-title">Your Current Orders (<?php echo $number_of_orders; ?>)</h3></div>
			<?php endif; ?>
			<div class="panel-body">
				<?php include $config->paths->content.'orders/pagination-start.php'; ?>
			</div>
			<?php include $config->paths->content.'orders/orders-table.php'; ?>
		</div>
	</div>
	<?php include $config->paths->content.'orders/order-search-modal.php'; ?>
<?php include('./_foot.php'); // include footer markup ?>
