<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the sidebar service
 *
 * @codeCoverageIgnore
 * @see \WPEmergeTheme\Sidebar\Sidebar
 *
 * @method static string getCurrentSidebarId( string $default = 'default-sidebar', string $meta_key = '_app_custom_sidebar' )
 */
class Sidebar extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme.sidebar.sidebar';
	}
}
