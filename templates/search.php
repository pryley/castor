<?php Development::storeTemplatePath( __FILE__ );

get_template_part( 'partials/title', 'search' );

while( have_posts() ) :
	the_post();
	get_template_part( 'sections/content', 'search' );
endwhile;

if( !have_posts() ) :
	printf( '<div class="alert alert-warning">%s</div>', __( 'Sorry, no results were found.', 'castor' ));
	get_search_form( true );
endif;

get_template_part( 'partials/pagination' );
