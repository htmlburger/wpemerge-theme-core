<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the sidebar service
 *
 * @codeCoverageIgnore
 * @see \WPEmergeTheme\Sidebar\Sidebar
 */
class Sidebar extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme.sidebar.sidebar';
	}
}
