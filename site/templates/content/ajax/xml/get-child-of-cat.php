<?php header('Content-Type: text/xml'); ?>
<?php
	$category = $input->get->text('cat');
	$children = get_children($category, false);
?>

<categories>
	<?php foreach ($children as $child) : ?>
        <category>
            <catid><![CDATA[<?php echo $child['catid']; ?>]]></catid>
            <catdesc><![CDATA[<?php echo $child['catdesc']; ?>]]></catdesc>
            <parent><![CDATA[<?php echo $child['sub']; ?>]]></parent>
        </category>
    <?php endforeach; ?>
</categories>
