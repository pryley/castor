<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= get_bloginfo('name'); ?> | <?= Theme::pageTitle(); ?></title>
<link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo('name'); ?> Feed" href="<?= esc_url(get_feed_link()); ?>">
<?php Template::load('globals/head-favicon'); ?>
<?php Template::load('globals/head-seo'); ?>
<?php wp_head(); ?>
