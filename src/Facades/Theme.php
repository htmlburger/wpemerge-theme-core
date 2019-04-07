<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the theme core instance.
 *
 * @codeCoverageIgnore
 * @see \WPEmergeTheme\Theme\Theme
 */
class Theme extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme';
	}
}
