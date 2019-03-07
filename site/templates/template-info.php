<?php include("./_head.php"); ?>
<div class="container page">
    <div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
    <?php foreach ($page->children('name!=safety-data-sheets,name!=privacy-policy,name!=return-policy') as $topic) : ?>
    	<h2><?php echo $topic->title; ?></h2>
        <?php if ($topic->hasChildren()) : ?>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php foreach ($topic->children() as $subtopic) : ?>

                <div class="panel panel-primary">

				   <div class="panel-heading" role="tab" id="<?php echo 'subtopic'.$subtopic->id.'-heading'; ?>" role="button" data-toggle="collapse" data- href="#<?php echo 'subtopic'.$subtopic->id; ?>" aria-expanded="true" aria-controls="collapseOne">
						<h4 class="panel-title">
							<?php echo $subtopic->title; ?>
						</h4>
					</div>

                    <div id="<?php echo 'subtopic'.$subtopic->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo 'subtopic'.$subtopic->id.'-heading'; ?>">
                        <div class="panel-body faq-body">
                            <?php echo $subtopic->body; ?>
                            <?php if (isset($subtopic->files)) : ?>
                                <?php foreach ($subtopic->files as $file) : ?>
                                    <a href="<?php echo $subtopic->filesManager->url.$file; ?>" target="_blank"><?php echo $file->description; ?> </a> <br>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if ($subtopic->hasChildren()) : ?>
                                <?php foreach ($subtopic->children() as $topicitem) : ?>
                                    <?php if ($topicitem != $subtopic->child()) { echo '<br>';} ?>
                                    <h4><?php echo $topicitem->title; ?></h4>
                                    <?php echo $topicitem->body; ?>
                                    <?php if (isset($topicitem->files)) : ?>
                                        <?php foreach ($topicitem->files as $file) : ?>
                                            <a href="<?php echo $topicitem->filesManager->url.$file; ?>" target="_blank"><?php echo $file->description; ?> </a> <br>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<?php include("./_foot.php"); ?>
