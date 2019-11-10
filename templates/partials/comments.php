<?php if (post_password_required()) return; ?>

<section id="comments">
    <div>
    <?php if (have_comments()) : ?>
        <h2><?= sprintf(
            _nx('One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'castor'),
            number_format_i18n(get_comments_number()),
            '<span>'.get_the_title().'</span>'
        ); ?></h2>
        <ol class="comment-list">
            <?php wp_list_comments([
                'style' => 'ol',
                'short_ping' => true,
            ]); ?>
        </ol>
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
        <nav>
            <ul class="pager">
            <?php if (get_previous_comments_link()) : ?>
                <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'castor')); ?></li>
            <?php endif; ?>
            <?php if (get_next_comments_link()) : ?>
                <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'castor')); ?></li>
            <?php endif; ?>
            </ul>
        </nav>
        <?php endif; ?>
    <?php endif; ?>
    <?php if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <?= wpautop(__('Comments are closed.', 'castor')); ?>
    <?php endif; ?>
    <?php comment_form(); ?>
    </div>
</section>
