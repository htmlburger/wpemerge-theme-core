<?php

namespace WPEmergeTheme\Image;

use WPEmerge\Support\Facade;

/**
 * Provide access to the image service
 *
 * @codeCoverageIgnore
 */
class ImageFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'wpemerge_theme.image.image';
    }
}
