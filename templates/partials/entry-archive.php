<article <?php post_class(); ?>>
<?php if( get_post_thumbnail_id() ) : ?>
	<div class="entry-image">
		<?= Media::image( get_post_thumbnail_id(), 'medium' ); ?>
	</div>
<?php endif; ?>
	<div class="entry-body">
		<header class="entry-title">
			<h2><a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a></h2>
		</header>
		<div class="entry-meta">
			<?php Template::load( 'partials/meta-published', get_post_type() ); ?>
			<?php Template::load( 'partials/meta-author', get_post_type() ); ?>
		</div>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>
