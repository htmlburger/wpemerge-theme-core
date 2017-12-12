<?php

namespace WPEmergeTheme\Assets;

use WPEmerge\Support\Facade;

/**
 * Provide access to the assets service
 *
 * @codeCoverageIgnore
 */
class AssetsFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'wpemerge_theme.assets.assets';
    }
}
