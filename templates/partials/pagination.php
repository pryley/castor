<?php

if (!have_posts()) {
    return;
}

global $pagedQuery, $wp_query;

$query = $pagedQuery instanceof WP_Query
    ? $pagedQuery
    : $wp_query;

$totalPages = intval($query->max_num_pages);
$currentPage = intval($query->query_vars[is_front_page() ? 'page' : 'paged']) ?: 1;

if ($totalPages < 2) {
    return;
}

$prevPageText = __('Previous page', 'castor');
$prevPageLink = $currentPage > 1
    ? sprintf('<a href="%s" class="prev">%s</a>', get_pagenum_link($currentPage - 1), $prevPageText)
    : sprintf('<span class="disabled prev">%s</span>', $prevPageText);

$nextPageText = __('Next page', 'castor');
$nextPageLink = $currentPage < $totalPages
    ? sprintf('<a href="%s" class="next">%s</a>', get_pagenum_link($currentPage + 1), $nextPageText)
    : sprintf('<span class="disabled next">%s</span>', $nextPageText);

$pageNumbers = paginate_links([
    'current' => $currentPage,
    'mid_size' => 1,
    'prev_next' => false,
    'total' => $totalPages,
]);
?>
<div class="pagination">
    <div class="row">
        <div class="column">
            <div class="nav-previous">
                <?= $prevPageLink; ?>
            </div>
            <div class="nav-next">
                <?= $nextPageLink; ?>
            </div>
            <?= $pageNumbers; ?>
        </div>
    </div>
</div>
