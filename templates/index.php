<?php

Template::load('partials/page-header', get_post_type());

while (have_posts()) :
    the_post();
    Template::load('partials/entry', get_post_type());
endwhile;

Template::load('partials/pagination', get_post_type());

if (!have_posts()) :
    echo wpautop(get_post_type_object(get_post_type())->labels->not_found);
    get_search_form(true);
endif;
