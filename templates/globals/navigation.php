<nav id="nav">
    <div>
        <div id="logo">
            <a href="<?= get_bloginfo('url'); ?>" title="<?= get_bloginfo('name'); ?>"> 
                <?= Theme::svg('logo.svg'); ?>
            </a>
        </div>
        <button id="nav-toggle">
            <svg id="nav-toggle-open" class="fill-current h-10 w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 12h18M3 6h18M3 18h18"/>
            </svg>
            <svg id="nav-toggle-close" class="hidden fill-current h-10 w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6L6 18M6 6l12 12"/>
            </svg>
        </button>
        <div id="nav-menu">
            <?php wp_nav_menu([
                'theme_location' => 'main_menu',
                'menu_class' => 'list-reset',
            ]); ?>
        </div>
    </div>
</nav>
