<?php
    $categoriesList = get_the_category_list(', ');
    $hasCategories = is_object_in_taxonomy(get_post_type(), 'category') && !empty($categoriesList);
    $tagsList = get_the_tag_list('', ', ');
    $hasTags = is_object_in_taxonomy(get_post_type(), 'post_tag') && !empty($tagsList);
?>

<footer>
    <?php if ($hasCategories) : ?>
    <div>
        <span class="screen-reader-text"><?= __('Categories', 'castor'); ?></span>
        <?= $categoriesList; ?>
    </div>
    <?php endif; ?>
    <?php if ($hasTags) : ?>
    <div>
        <span class="screen-reader-text"><?= __('Tags', 'castor'); ?></span>
        <?= $tagsList; ?>
    </div>
    <?php endif; ?>
</footer>
