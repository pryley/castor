<?php if (empty(get_previous_post_link()) && empty(get_next_post_link())) return; ?>

<nav>
    <div>
        <?php previous_post_link(); ?>
        <?php next_post_link(); ?>
    </div>
</nav>
