<?php Development::storeTemplatePath( __FILE__ );

while( have_posts() ) :
	the_post();
	Template::load( 'partials/title', 'single' );
	Template::load( 'sections/content-single', get_post_type() );
endwhile;
