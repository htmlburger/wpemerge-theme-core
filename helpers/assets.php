<?php
/**
 * Enqueue front-end assets.
 *
 * @return void
 */
function wpmt_action_enqueue_assets() {
	$template_dir = Theme\Assets::getThemeUri();

	/**
	 * Enqueue the built-in comment-reply script for singular pages.
	 */
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Enqueue scripts.
	 */
	Theme\Assets::enqueueScript(
		'theme-js-bundle',
		$template_dir . Theme\Assets::getBundlePath( 'js/bundle.js' ),
		['jquery'],
		true
	);

	/**
	 * Enqueue styles.
	 */
	Theme\Assets::enqueueStyle(
		'theme-css-bundle',
		$template_dir . Theme\Assets::getBundlePath( 'css/bundle.css' )
	);

	/**
	 * Enqueue theme's style.css file to allow overrides for the bundled styles.
	 */
	Theme\Assets::enqueueStyle( 'theme-styles', $template_dir . '/style.css' );
}

/**
 * Enqueue admin assets.
 *
 * @return void
 */
function wpmt_action_admin_enqueue_scripts() {
	$template_dir = Theme\Assets::getThemeUri();
}

/**
 * Enqueue login assets.
 *
 * @return void
 */
function wpmt_action_login_enqueue_scripts() {
	$template_dir = Theme\Assets::getThemeUri();
}

/**
 * Add favicon proxy.
 *
 * @see    WPEmergeTHeme\Assets\Assets::addFavicon()
 * @return void
 */
function wpmt_action_add_favicon() {
	Theme\Assets::addFavicon();
}
