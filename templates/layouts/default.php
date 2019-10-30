<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php Template::load('sections/head'); ?>
<body <?php body_class(Development::className()); ?>>
	<?php Template::load('sections/outdated'); ?>
	<?php Template::load('sections/header'); ?>
	<div class="wrapper" role="document">
		<main class="main" role="main">
			<?php Template::main(); ?>
		</main>
		<?php Template::load('sections/sidebar'); ?>
	</div>
	<?php Template::load('sections/footer'); ?>
	<?php Template::load('sections/debug'); ?>
	<?php wp_footer(); ?>
</body>
</html>
