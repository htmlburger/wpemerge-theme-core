<?php

namespace WPEmergeTheme\Theme;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide theme dependencies.
 *
 * @codeCoverageIgnore
 */
class ThemeServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		$container['wpemerge_theme.theme.theme'] = function( $c ) {
			return new Theme( $c[ WPEMERGE_APPLICATION_KEY ] );
		};

		$app = $container[ WPEMERGE_APPLICATION_KEY ];
		$app->alias( 'theme', 'wpemerge_theme.theme.theme' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		// Nothing to bootstrap.
	}
}
