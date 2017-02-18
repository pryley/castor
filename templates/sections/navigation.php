<?php Development::storeTemplatePath( __FILE__ ); ?>

<div class="navigation">
	<div class="container">

	<?php Template::load( 'partials/logo' ); ?>

	<?php if( has_nav_menu( 'main_menu' )) : ?>

		<div class="nav-toggle">
			<div id="nav-toggle"><?= __( 'Menu', 'castor' ); ?></div>
		</div>

		<nav class="nav-primary nav-collapse" role="navigation"><?php
			wp_nav_menu( [
				'theme_location' => 'main_menu',
				'menu_class'     => 'nav horiz'
			]);
		?></nav>

	<?php endif; ?>

	</div>
</div>
