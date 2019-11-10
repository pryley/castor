<!doctype html>
<html class="<?= Development::className('debug'); ?>" <?php language_attributes(); ?>>
    <head>
        <?php Template::load('globals/head'); ?>
    </head>
    <body <?php body_class(Development::className()); ?>>
        <?php Template::load('globals/header'); ?>
        <div>
            <main>
                <?php Template::main(); ?>
            </main>
            <?php Template::load('globals/sidebar'); ?>
        </div>
        <?php Template::load('globals/footer'); ?>
        <?php wp_footer(); ?>
    </body>
</html>
