<?php

namespace WPEmergeTheme\Sidebar;

use WPEmerge;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide sidebar dependencies
 *
 * @codeCoverageIgnore
 */
class SidebarServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		$container['wpemerge_theme.sidebar.sidebar'] = function() {
			return new Sidebar();
		};

		WPEmerge::facade( 'Theme\Sidebar', SidebarFacade::class );
	}

	/**
	 * {@inheritDoc}
	 */
	public function boot( $container ) {
		// nothing to boot
	}
}
