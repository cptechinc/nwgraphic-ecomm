<nav class="text-center">
    <ul class="pagination">
        <?php if ($this_page == 1) : ?>
            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <?php else : ?>
            <li><a href="<?php echo $pagination_link.($this_page - 1); ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <?php endif; ?>
        
        <?php for ($i = 1; $i < $total_pages; $i++) : ?>
            <?php if ($this_page == $i) : ?>
                <li class="active"><a href="<?php echo $pagination_link.$i; ?>"><?php echo $i; ?></a></li>
            <?php else : ?>
                <li><a href="<?php echo $pagination_link.$i; ?>"><?php echo $i; ?></a></li>
            <?php endif; ?>      
        <?php endfor; ?>
    
        <?php if ($this_page == $total_pages) : ?>
            <li class="disabled"> <a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
        <?php else : ?>
            <li> <a href="<?php echo $pagination_link.($this_page + 1); ?>" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
        <?php endif; ?>
    </ul>
</nav>