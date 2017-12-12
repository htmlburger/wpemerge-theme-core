<?php

namespace WPEmergeTheme\Path;

use WPEmerge;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide path dependencies
 *
 * @codeCoverageIgnore
 */
class PathServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		$container['wpemerge_theme.path.path'] = function() {
			return new Path();
		};

		WPEmerge::facade( 'Theme\Path', PathFacade::class );
	}

	/**
	 * {@inheritDoc}
	 */
	public function boot( $container ) {
		// nothing to boot
	}
}
