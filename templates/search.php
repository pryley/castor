<?php Development::storeTemplatePath( __FILE__ );

Template::load( 'partials/title', 'search' );

while( have_posts() ) :
	the_post();
	Template::load( 'sections/content', 'search' );
endwhile;

if( !have_posts() ) :
	printf( '<div class="alert alert-warning">%s</div>', __( 'Sorry, no results were found.', 'castor' ));
	get_search_form( true );
endif;

Template::load( 'partials/pagination' );
