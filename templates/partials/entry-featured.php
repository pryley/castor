<?php

if ($imageId = get_post_thumbnail_id()) {
    echo Media::image($imageId, 'medium');
}
