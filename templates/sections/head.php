<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= get_bloginfo( 'name' ); ?> | <?= Theme::pageTitle(); ?></title>
	<link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo( 'name' ); ?> Feed" href="<?= esc_url( get_feed_link() ); ?>">
	<?php Template::load( 'partials/head-seo' ); ?>
	<?php Template::load( 'partials/head-favicon' ); ?>
	<?php wp_head(); ?>
</head>
