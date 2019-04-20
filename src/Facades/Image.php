<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the image service
 *
 * @codeCoverageIgnore
 * @see \WPEmergeTheme\Image\Image
 *
 * @method static string thumbnail( integer $attachment_id, integer $width, integer $height, boolean $crop = true )
 */
class Image extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme.image.image';
	}
}
