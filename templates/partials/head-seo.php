<?php Development::storeTemplatePath( __FILE__ ); ?>
<?php
	$title = get_bloginfo( 'name' );
	$description = get_bloginfo( 'description' );
?>

<!-- SEO -->
<meta name="description" content="<?= $description; ?>">
<meta name="copyright" content="<?= sprintf( 'Copyright © %s, %s', date( 'Y' ), $title ); ?>" />
<meta name="author" content="Gemini Labs">

<?php if( !Development::isProduction() ) : ?>
<!-- Robots -->
<meta name="robots" content="noindex, nofollow">
<?php endif; ?>

<!-- Google+ -->
<meta itemprop="name" content="<?= $title; ?>">
<meta itemprop="description" content="<?= $description; ?>">
<meta itemprop="image" content="assets/img/logo.png">

<!-- Opengraph -->
<meta property="og:title" content="<?= $title; ?>" />
<meta property="og:site_name" content="<?= $title; ?>"/>
<meta property="og:url" content="http://dioscuri.dev" />
<meta property="og:description" content="<?= $description; ?>">
<meta property="og:image" content="assets/img/logo.jpg" />
