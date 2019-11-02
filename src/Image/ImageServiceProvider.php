<?php

namespace WPEmergeTheme\Image;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide image dependencies.
 *
 * @codeCoverageIgnore
 */
class ImageServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		$container['wpemerge_theme.image.image'] = function() {
			return new Image();
		};
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		// Nothing to bootstrap.
	}
}
