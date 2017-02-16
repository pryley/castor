<?php Development::storeTemplatePath( __FILE__ ); ?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= get_bloginfo( 'name' ); ?></title>
	<link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo( 'name' ); ?> Feed" href="<?= esc_url( get_feed_link() ); ?>">
	<?php get_template_part( 'partials/head-seo' ); ?>
	<?php get_template_part( 'partials/head-favicon' ); ?>
	<?php wp_head(); ?>
</head>
