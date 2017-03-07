<?php Development::storeTemplatePath( __FILE__ );

if( !Theme::displaySidebar() )return; ?>

<aside class="sidebar">
	<?php dynamic_sidebar( 'sidebar-primary' ); ?>
</aside>
