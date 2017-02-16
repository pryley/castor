<?php Development::storeTemplatePath( __FILE__ );

if( !have_posts() ) :
	get_template_part( 'partials/title', '404' );
	printf( '<div class="alert alert-warning">%s</div>', __( 'Sorry, but the page you were trying to view does not exist.', 'castor' ));
	get_search_form( true );
endif;
