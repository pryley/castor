<div class="navigation">
	<?php Template::load( 'partials/logo' ); ?>
	<?php if( has_nav_menu( 'main_menu' )) : ?>
	<div class="toggle-main-menu">
		<span class="screen-reader-text"><?= __( 'Menu', 'castor' ); ?></span>
	</div>
	<nav role="navigation">
		<?php wp_nav_menu([
			'theme_location' => 'main_menu',
			'menu_class' => 'menu-primary',
		]); ?>
	</nav>
	<?php endif; ?>
</nav>
