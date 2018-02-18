<?php /* Not for use on front page because we use "paged" instead of "page" from query */

if( !have_posts() )return;

global $pagedQuery, $wp_query;

$query = $pagedQuery instanceof WP_Query
	? $pagedQuery
	: $wp_query;

$totalPages = intval( $query->max_num_pages );
$currentPage = intval( $query->query_vars['paged'] ) ?: 1;

if( $totalPages < 2 )return;

$prevPageText = __( 'Previous page', 'castor' );
$nextPageText = __( 'Next page', 'castor' );

$prevPageLink = $currentPage > 1
	? sprintf( '<a href="%s" class="button prev">%s</a>', get_pagenum_link( $currentPage - 1 ), $prevPageText )
	: sprintf( '<span class="button disabled prev">%s</span>', $prevPageText );

$nextPageLink = $currentPage < $totalPages
	? sprintf( '<a href="%s" class="button next">%s</a>', get_pagenum_link( $currentPage + 1 ), $nextPageText )
	: sprintf( '<span class="button disabled next">%s</span>', $nextPageText );

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
