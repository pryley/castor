<?php Development::storeTemplatePath( __FILE__ ); ?>

<article <?php post_class(); ?>>
	<header>
		<h2 class="entry-title"><a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a></h2>
		<?php if( get_post_type() === 'post' ) :
			get_template_part( 'partials/entry-meta' );
		endif; ?>
	</header>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
