<?php

define('DEV', WP_ENV == 'development');

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/vendor/pryley/castor-framework/castor.php';

/**
 * Setup theme
 * @return void
 */
add_action('after_setup_theme', function () {
    // Google Analytics
    if (Development::isProduction() && $analyticsId = SiteMeta::services('google_analytics')) {
        add_theme_support('soil-google-analytics', $analyticsId, 'wp_footer');
    }
});

/**
 * Disable Black Bar for non-administrators
 * @return bool
 */
add_filter('blackbar/enabled', function () {
    return !Development::isProduction() || current_user_can('administrator');
});

/**
 * Disable two-factor auth for development and staging environments
 * @return string|null
 */
add_filter('two_factor_primary_provider_for_user', function ($provider) {
    return Development::isProduction()
        ? $provider
        : 'disable_2fa';
});
