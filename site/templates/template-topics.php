<?php include("./_head.php"); ?>
<div class="container page">
    <div class="page-header"> <h1 class="blog-title"><?php echo $page->get('pagetitle|headline|title') ; ?></h1> </div>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php $faqs = $page->children(); $count = 1; ?>
        <?php foreach ($faqs as $topic) : ?>
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="<?php echo 'topic'.$count."-heading"; ?>">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo 'topic'.$count; ?>" aria-expanded="true" aria-controls="collapseOne">
                          <?php echo $topic->title; ?>
                        </a>
                    </h4>
                </div>
                <div id="<?php echo 'topic'.$count; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo 'topic'.$count."-heading"; ?>">
                    <div class="panel-body faq-body">
                        <?php echo $topic->body; ?>
                        <?php if (isset($topic->files)) : ?>
                            <?php foreach ($topic->files as $file) : ?>
                                <a href="<?php echo $topic->filesManager->url.$file; ?>" target="_blank"><?php echo $file->description; ?> </a> <br>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if ($topic->hasChildren()) : ?>
                            <?php foreach ($topic->children() as $subtopic) : ?>
                                <?php if ($subtopic != $topic->child()) { echo '<br>';} ?>
                                <h4><?php echo $subtopic->title; ?></h4>
                                <?= $subtopic->body; ?>
                                <?php if (isset($subtopic->files)) : ?>
                                    <?php foreach ($subtopic->files as $file) : ?>
                                        <a href="<?php echo $subtopic->filesManager->url.$file; ?>" target="_blank"><?php echo $file->description; ?> </a> <br>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
    </div>
</div>
<?php include("./_foot.php"); ?>
