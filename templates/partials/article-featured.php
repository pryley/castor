<?php if (empty(get_post_thumbnail_id())) {
    return;
} ?>

<div class="article-featured">
	<?php Render::featured([
        'class' => trim('featured '.PostMeta::get('background_position')),
    ]); ?>
</div>
