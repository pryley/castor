<?php

Template::load('partials/title', 'archive');

while (have_posts()) :
    the_post();
    Template::load('partials/entry-archive', get_post_type());
endwhile;

Template::load('partials/pagination', 'archive');

if (!have_posts()) :
    echo wpautop(get_post_type_object(get_query_var('post_type'))->labels->not_found);
    get_search_form(true);
endif;
