<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the theme core instance.
 *
 * @codeCoverageIgnore
 * @see \WPEmergeTheme\Theme\Theme
 *
 * @method static boolean isBootstrapped()
 * @method static void bootstrap( array $config = [] )
 * @method static void partial( string $partial, string $child = '', array $context = [] )
 * @method static string uri()
 */
class Theme extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme';
	}
}
