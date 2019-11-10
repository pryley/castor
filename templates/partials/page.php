<section <?php post_class(); ?>>
    <div>
        <?php Template::load('partials/page-header', get_post_type()); ?>
        <?php Template::load('partials/page-content', get_post_type()); ?>
        <?php Template::load('partials/page-footer', get_post_type()); ?>
    </div>
</section>
