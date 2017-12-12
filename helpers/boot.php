<?php
/**
 * Bootstrap textdomain
 *
 * @return void
 */
function wpmt_boot_textdomain() {
	load_theme_textdomain( 'wmpt', WPMT_DIR . 'languages' );
}

/**
 * Bootstrap helpers
 *
 * @return void
 */
function wpmt_boot_helpers() {
	WPEmergeTheme::globRequire( WPMT_APP_DIR . 'helpers' . DIRECTORY_SEPARATOR . '*.php' );
}

/**
 * Bootstrap hooks
 *
 * @return void
 */
function wpmt_boot_hooks() {
	require_once WPMT_APP_DIR . 'hooks.php';
}

/**
 * Bootstrap theme support
 *
 * @return void
 */
function wpmt_boot_theme_support() {
	require_once WPMT_APP_SETUP_DIR . 'theme-support.php';
}

/**
 * Bootstrap menus
 *
 * @return void
 */
function wpmt_boot_menus() {
	require_once WPMT_APP_SETUP_DIR . 'menus.php';
}

/**
 * Bootstrap custom post types and taxonomies
 *
 * @return void
 */
function wpmt_boot_content_types() {
	require_once WPMT_APP_SETUP_DIR . 'post-types.php';
	require_once WPMT_APP_SETUP_DIR . 'taxonomies.php';
}

/**
 * Bootstrap widgets
 *
 * @return void
 */
function wpmt_boot_widgets() {
	require_once WPMT_APP_SETUP_DIR . 'widgets.php';
}

/**
 * Bootstrap sidebars
 *
 * @return void
 */
function wpmt_boot_sidebars() {
	require_once WPMT_APP_SETUP_DIR . 'sidebars.php';
}
