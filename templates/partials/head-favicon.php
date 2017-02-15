<?php Development::storeTemplatePath( __FILE__ ); ?>
<?php $assets_img = sprintf( '%s/assets/img/favicon/', get_stylesheet_directory_uri() ); ?>

<link rel="apple-touch-icon" sizes="180x180" href="<?= $assets_img; ?>apple-touch-icon.png">
<link rel="icon" type="image/png" href="<?= $assets_img; ?>favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?= $assets_img; ?>favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?= $assets_img; ?>manifest.json">
<link rel="mask-icon" href="<?= $assets_img; ?>safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#263238">
