<?php

namespace WPEmergeTheme\Sidebar;

use WPEmerge\Facades\Application;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide sidebar dependencies.
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

		Application::alias( 'Theme\\Sidebar', \WPEmergeTheme\Facades\Sidebar::class );
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		// Nothing to bootstrap.
	}
}
