<?php

namespace WPEmergeTheme\Config;

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
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		// Nothing to bootstrap.
	}
}
