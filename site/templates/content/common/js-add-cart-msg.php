<?php if ($session->addtocart) : ?>
	<script>
        $(function() {
            $.notify({
                icon: "glyphicon glyphicon-shopping-cart",
                message: "<?php echo $session->addtocart; ?> <br> (Click this message to go to the cart.)" ,
                url: "<?php echo $config->pages->cart; ?>",
                target: '_self'
            },{
                type: "success",
                url_target: '_self'
            });
        });
    </script>
    <?php $session->remove('addtocart'); ?>
<?php endif; ?>
