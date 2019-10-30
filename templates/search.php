<?php

Template::load('partials/title', 'search');

while (have_posts()) :
    the_post();
    Template::load('partials/entry-search', get_post_type());
endwhile;

Template::load('partials/pagination', 'search');

if (!have_posts()) :
    echo wpautop(__('Sorry, no results were found.', 'castor'));
    get_search_form(true);
endif;
