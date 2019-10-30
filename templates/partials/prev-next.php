<?php if (empty(get_previous_post_link()) && empty(get_next_post_link())) {
    return;
} ?>

<nav class="next-prev">
	<div class="nav-previous-link">
		<?php previous_post_link(); ?>
	</div>
	<div class="nav-next-link">
		<?php next_post_link(); ?>
	</div>
</nav>
