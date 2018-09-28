<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the image service
 *
 * @codeCoverageIgnore
 * @see \WPEmergeTheme\Image\Image
 */
class Image extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme.image.image';
	}
}
