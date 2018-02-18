<?php
$timeString = '<time class="%s" datetime="%s">%s</time>';
$publishedClasses = 'entry-date published updated';
$updated = '';
if( get_the_time( 'U' ) !== get_the_modified_time( 'U' )) {
	$publishedClasses = 'entry-date published';
	$updated = sprintf( $timeString, 'updated', get_the_modified_date( DATE_W3C ), get_the_modified_date() );
}
$time = sprintf( $timeString, $publishedClasses, get_the_date( DATE_W3C ), get_the_date() );
?>

<span class="posted-on">
	<span class="screen-reader-text"><?= __( 'Posted on', 'castor' ); ?></span>
	<a href="<?= esc_url( get_permalink() ); ?>" rel="bookmark"><?= $time.$updated; ?></a>
</span>
