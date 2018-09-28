<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the assets service
 *
 * @codeCoverageIgnore
 * @see \WPEmergeTheme\Assets\Assets
 */
class Assets extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme.assets.assets';
	}
}
