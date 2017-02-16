<?php Development::storeTemplatePath( __FILE__ );

while( have_posts() ) :
	the_post();
	get_template_part( 'partials/title', 'single' );
	get_template_part( 'sections/content-single', get_post_type() );
endwhile;
