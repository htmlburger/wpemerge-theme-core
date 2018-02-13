<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the image service
 *
 * @codeCoverageIgnore
 */
class Image extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme.image.image';
	}
}
