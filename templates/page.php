<?php Development::storeTemplatePath( __FILE__ );

while( have_posts() ) :
	the_post();
	get_template_part( 'partials/title', 'page' );
	get_template_part( 'sections/content-page' );
endwhile;
