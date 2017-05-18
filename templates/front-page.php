<?php

while( have_posts() ) :
	the_post();
	Template::load( 'partials/title', 'page' );
	Template::load( 'sections/content-page' );
endwhile;
