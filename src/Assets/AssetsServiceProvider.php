<?php

namespace WPEmergeTheme\Assets;

use WPEmerge\Facades\Application;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide assets dependencies.
 *
 * @codeCoverageIgnore
 */
class AssetsServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		$container['wpemerge_theme.assets.manifest'] = function() {
			return new Manifest();
		};

		$container['wpemerge_theme.assets.assets'] = function( $container ) {
			return new Assets( $container['wpemerge_theme.assets.manifest'] );
		};

		Application::alias( 'Theme\\Assets', \WPEmergeTheme\Facades\Assets::class );
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		// Nothing to bootstrap.
	}
}
