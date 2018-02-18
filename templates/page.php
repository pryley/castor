<?php

while( have_posts() ) :
	the_post();
	Template::load( 'partials/article', get_post_type() );
endwhile;
