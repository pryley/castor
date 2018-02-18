<?php

while( have_posts() ) :
	the_post();
	Template::load( 'partials/article', get_post_type() );
	Template::load( 'partials/prev-next', get_post_type() );
	comments_template( '/templates/sections/comments.php' );
endwhile;
