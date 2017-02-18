<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php Template::load( 'partials/head' ); ?>
<body <?php body_class( Development::className() ); ?>>

	<?php Template::load( 'partials/outdated' ); ?>

	<div class="full-height">

		<?php Template::load( 'sections/header' ); ?>

		<div class="wrapper" role="document">
			<main class="main" role="main">
				<?php Template::main(); ?>
			</main>
			<?php Template::load( 'sections/sidebar' ); ?>
		</div>

		<?php Template::load( 'sections/footer' ); ?>

	</div>

	<?php Template::load( 'partials/analytics' ); ?>

	<?php Development::printTemplatePaths(); ?>
	<?php wp_footer(); ?>

</body>
</html>
