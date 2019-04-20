<?php

namespace WPEmergeTheme\Config;

use WPEmerge\Facades\Application;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide assets dependencies.
 *
 * @codeCoverageIgnore
 */
class ConfigServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		$container['wpemerge_theme.config.config'] = function() {
			return new Config();
		};

		Application::alias( 'Theme\\Config', \WPEmergeTheme\Facades\Config::class );
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		// Nothing to bootstrap.
	}
}
