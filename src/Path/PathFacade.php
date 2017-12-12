<?php

namespace WPEmergeTheme\Path;

use WPEmerge\Support\Facade;

/**
 * Provide access to the path service
 *
 * @codeCoverageIgnore
 */
class PathFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'wpemerge_theme.path.path';
    }
}
