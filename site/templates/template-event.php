<?php include('./_head.php'); // include header markup ?>
    <div class="container page" itemscope itemtype="http://schema.org/Event">
        <div class="page-header"> 
        	<h1 class="blog-title" itemprop="name"> 
			<?php foreach ($page->images as $image) : ?>
				<img src="<?php echo $page->filesManager->url.$image; ?>" alt="<?php echo $image->description; ?>" height="100">
			<?php endforeach; ?>
			<?php echo $page->get('pagetitle|headline|title') ; ?></h1> 
        </div>
        <div>
			<table class="table table-bordered">
				<tr>
					<td><b>Start Date:</b></td>
					<td>
						<?php echo date('l, F dS (m/d/Y)', strtotime($page->startdate)); ?>
					</td>
				</tr>
				<tr>
					<td><b>End Date:</b></td>
					<td itemprop="endDate"><?php echo (!empty($page->throughdate)) ? date('l, F dS (m/d/Y)', strtotime($page->throughdate)) : date('l, F dS (m/d/Y)', strtotime($page->startdate)); ?></td>
				</tr>
				<tr>
					<td><b>Where:</b></td>
					<td itemprop="location">
						<?php echo $page->address; ?><br>
						<iframe src="<?php echo $page->gmapembed; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
					</td>
				</tr>
				<tr>
					<td><b>Description:</b></td>
					<td itemprop="decription"><?php echo $page->body; ?></td>
				</tr>
				<tr>
					<td><b>Web Site: </b></td>
					<td><a href="<?php echo $page->link; ?>" target="_blank" rel="nofollow"><?php echo $page->link; ?></a></td>
				</tr>
			</table>


			<div class="row form-group">
				<div class="col-sm-6">
					<form action="http://nwgraphic.us1.list-manage1.com/subscribe/post?u=0d4f6c8b72e606862d1d9d6e3&amp;id=aa031a79d1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<div class="form-group">
							<label for="mce-EMAIL">Subscribe to e-mail updates about trade events:</label>
							<input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="email address" required>
						</div>

						<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div class="hidden"><input type="text" name="b_0d4f6c8b72e606862d1d9d6e3_aa031a79d1" tabindex="-1" value=""></div>
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-success">
					</form>
				</div>
			</div>
        </div>
        
		
	</div>
<?php include('./_foot.php'); // include footer markup ?>