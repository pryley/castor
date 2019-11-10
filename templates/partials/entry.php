<article <?php post_class(); ?>>
    <div>
        <?php Template::load('partials/entry-featured', get_post_type()); ?>
    </div>
    <div>
        <?php Template::load('partials/entry-header', get_post_type()); ?>
        <?php Template::load('partials/entry-content', get_post_type()); ?>
        <?php Template::load('partials/entry-footer', get_post_type()); ?>
    </div>
</article>
