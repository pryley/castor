<?php Development::storeTemplatePath( __FILE__ ); ?>

<nav role="navigation">
	<div class="wrapper">

	<?php get_template_part( 'partials/logo' ); ?>

	<?php if( has_nav_menu( 'primary_navigation' )) : ?>

		<div class="nav-toggle">
			<div id="nav-toggle"><?= __( 'Menu', 'castor' ); ?></div>
		</div>

		<div class="nav-collapse">
			<?php
				// wp_nav_menu( [
				// 	'theme_location' => 'primary_navigation',
				// 	'walker'         => new NavWalker(),
				// 	'menu_class'     => 'nav horiz'
				// ]);
			?>
		</div>

	<?php endif; ?>

	</div>
</nav>
