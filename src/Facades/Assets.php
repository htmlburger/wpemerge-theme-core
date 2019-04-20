<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the assets service
 *
 * @codeCoverageIgnore
 * @see \WPEmergeTheme\Assets\Assets
 *
 * @method static string getThemeUri()
 * @method static string getAssetUri( string $asset )
 * @method static void enqueueStyle( string $handle, string $src, array $dependencies = [], string $media = 'all' )
 * @method static void enqueueScript( string $handle, string $src, array $dependencies = [], boolean $in_footer = false )
 * @method static void addFavicon()
 */
class Assets extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme.assets.assets';
	}
}
