<?php 

if (empty(get_the_content())) {
    return;
}

the_content();
