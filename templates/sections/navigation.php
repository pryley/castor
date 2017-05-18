<div class="navigation">
	<div class="container">

	<?php Template::load( 'partials/logo' ); ?>

	<?php if( has_nav_menu( 'main_menu' )) : ?>

		<a href="#" class="toggle-main-menu" data-toggle="<?= __( 'Close', 'castor' ); ?>">
			<span><?= __( 'Menu', 'castor' ); ?></span>
		</a>

		<nav id="main-menu" role="navigation"><?php
			wp_nav_menu( [
				'theme_location' => 'main_menu',
				'menu_class' => 'menu-primary'
			]);
		?></nav>

	<?php endif; ?>

	</div>
</div>
