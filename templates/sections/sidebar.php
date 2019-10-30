<?php if (!Theme::displaySidebar()) {
    return;
} ?>

<aside class="sidebar">
	<?php dynamic_sidebar('sidebar-primary'); ?>
</aside>
