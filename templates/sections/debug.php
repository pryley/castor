<?php

if (Development::isDev()) {
    printf('<div class="debug-grid">%s</div>', str_repeat('<div></div>', 12));
}
