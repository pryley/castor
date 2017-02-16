<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php get_template_part( 'partials/head' ); ?>
<body <?php body_class( Development::className() ); ?>>

	<?php get_template_part( 'partials/outdated' ); ?>

	<div class="full-height">

		<?php get_template_part( 'sections/header' ); ?>

		<div class="wrapper" role="document">
			<main class="main" role="main">
				<?php Template::main(); ?>
			</main>
			<?php get_template_part( 'sections/sidebar' ); ?>
		</div>

		<?php get_template_part( 'sections/footer' ); ?>

	</div>

	<?php get_template_part( 'partials/analytics' ); ?>

	<?php Development::printTemplatePaths(); ?>
	<?php wp_footer(); ?>

</body>
</html>
