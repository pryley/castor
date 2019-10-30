<span class="byline">
	<?= __('by', 'castor'); ?>
	<span class="author vcard">
		<a href="<?= esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
			<?= get_the_author(); ?>
		</a>
	</span>
</span>
