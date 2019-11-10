<?php
    $description = get_bloginfo('description');
    $image = Theme::imageUri('share.jpg');
    $title = get_bloginfo('name');
    $url = esc_url(home_url());
?>

<?php if (!Development::isProduction()) : ?>
<meta name="robots" content="noindex, nofollow">
<?php endif; ?>

<!-- SEO -->
<meta name="author" content="Gemini Labs">
<meta name="copyright" content="<?= __('Copyright', 'castor').' &copy; '.date('Y').', '.$title; ?>" />
<meta name="description" content="<?= $description; ?>">

<!-- Google+ -->
<meta itemprop="description" content="<?= $description; ?>">
<meta itemprop="image" content="<?= $image; ?>">
<meta itemprop="name" content="<?= $title; ?>">

<!-- Opengraph -->
<meta property="og:description" content="<?= $description; ?>">
<meta property="og:image" content="<?= $image; ?>" />
<meta property="og:site_name" content="<?= $title; ?>"/>
<meta property="og:title" content="<?= $title; ?>" />
<meta property="og:url" content="<?= $url; ?>" />
