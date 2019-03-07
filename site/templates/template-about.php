<?php include('./_head.php'); // include header markup ?>
    
    <div class="container page">
    	<div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
		<div class="row">
			<div class="col-sm-9">
				<?php echo $page->body; ?>
			</div>
      		<div class="col-sm-3">
      			<?php echo $page->sidebar; ?>
      		</div>
       	</div>
        
       
        
    </div>
<?php include('./_foot.php'); // include footer markup ?>