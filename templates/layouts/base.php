<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<?php get_template_part( 'partials/head' ); ?>

<body <?php body_class( Development::className() ); ?>>

	<?php get_template_part( 'partials/outdated' ); ?>

	<?php do_action( 'get_header' ); ?>

	<div class="full-height">

		<?php get_template_part( 'partials/header' ); ?>

		<div class="wrapper" role="document">
			<main class="main" role="main">
				<?php get_template_part( 'partials/hero' ); ?>
				<?php Template::main(); ?>
			</main>
		</div>

		<?php get_template_part( 'partials/footer' ); ?>

		<?php Development::printTemplatePaths(); ?>

	</div>

	<?php wp_footer(); ?>

</body>

</html>
