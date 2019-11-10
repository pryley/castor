<article <?php post_class(); ?>>
    <div>
        <?php Template::load('partials/single-header', get_post_type()); ?>
        <?php Template::load('partials/single-content', get_post_type()); ?>
        <?php Template::load('partials/single-footer', get_post_type()); ?>
    </div>
</article>
