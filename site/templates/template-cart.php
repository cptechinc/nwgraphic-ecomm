<?php include("./_head.php"); ?>
<div class="container page">
	<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
	<?php include $config->paths->content.'cart/main/show-cart.php'; ?>
	<!-- (c) 2005, 2017. Authorize.Net is a registered trademark of CyberSource Corporation --> 
	<div class="AuthorizeNetSeal"> 
		<script type="text/javascript" language="javascript">var ANS_customer_id="c3d9919f-550f-443c-be7c-9ed96331b082";</script> 
		<script type="text/javascript" language="javascript" src="//verify.authorize.net/anetseal/seal.js" ></script> 
		<a href="http://www.authorize.net/" id="AuthorizeNetText" target="_blank">Payment Processing</a> 
	</div>
</div>
<?php include $config->paths->content.'cart/item-lookup.php'; ?>

<?php include("./_foot.php"); ?>