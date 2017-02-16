<?php Development::storeTemplatePath( __FILE__ );

get_template_part( 'partials/title' );

while( have_posts() ) :
	the_post();
	get_template_part( 'sections/content', get_post_type() !== 'post' ? get_post_type() : get_post_format() );
endwhile;

if( !have_posts() ) :
	printf( '<div class="alert alert-warning">%s</div>', __( 'Sorry, no results were found.', 'castor' ));
	get_search_form( true );
endif;

get_template_part( 'partials/pagination' );
