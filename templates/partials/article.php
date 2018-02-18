<article <?php post_class(); ?>>
	<?php Template::load( 'partials/article-header', get_post_type() ); ?>
	<?php Template::load( 'partials/article-featured', get_post_type() ); ?>
	<?php Template::load( 'partials/article-content', get_post_type() ); ?>
	<?php Template::load( 'partials/article-footer', get_post_type() ); ?>
</article>
