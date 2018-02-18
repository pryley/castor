<?php
$description = get_bloginfo( 'description' );
$image = Theme::imageUri( 'share.jpg' );
$title = get_bloginfo( 'name' );
$url = esc_url( home_url() );
?>
<!-- SEO -->
<meta name="description" content="<?= $description; ?>">
<meta name="copyright" content="<?= __( 'Copyright', 'castor' ) . ' &copy; ' . date( 'Y' ) . ', ' . $title; ?>" />
<meta name="author" content="Gemini Labs">

<?php if( !Development::isProduction() ) : ?>
<!-- Robots -->
<meta name="robots" content="noindex, nofollow">
<?php endif; ?>

<!-- Google+ -->
<meta itemprop="name" content="<?= $title; ?>">
<meta itemprop="description" content="<?= $description; ?>">
<meta itemprop="image" content="<?= $image; ?>">

<!-- Opengraph -->
<meta property="og:title" content="<?= $title; ?>" />
<meta property="og:site_name" content="<?= $title; ?>"/>
<meta property="og:url" content="<?= $url; ?>" />
<meta property="og:description" content="<?= $description; ?>">
<meta property="og:image" content="<?= $image; ?>" />
