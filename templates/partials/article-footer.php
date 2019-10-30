<?php
$separator = ', ';
$categoriesList = get_the_category_list($separator);
$tagsList = get_the_tag_list('', $separator);
$hasCategories = is_object_in_taxonomy(get_post_type(), 'category') && castorHasCategories() && !empty($categoriesList);
$hasTags = is_object_in_taxonomy(get_post_type(), 'post_tag') && !empty($tagsList);

if (!$hasCategories && !$hasTags) {
    return;
} ?>

<footer class="article-footer">
	<span class="cat-tags-links">
		<?php if ($hasCategories) : ?>
			<span class="cat-links">
				<span class="screen-reader-text"><?= __('Categories', 'castor'); ?></span>
				<?= $categoriesList; ?>
			</span>
		<?php endif; ?>
		<?php if ($hasTags) : ?>
			<span class="tags-links">
				<span class="screen-reader-text"><?= __('Tags', 'castor'); ?></span>
				<?= $tagsList; ?>
			</span>
		<?php endif; ?>
	</span>
</footer>
