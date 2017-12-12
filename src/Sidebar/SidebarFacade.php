<?php

namespace WPEmergeTheme\Sidebar;

use WPEmerge\Support\Facade;

/**
 * Provide access to the sidebar service
 *
 * @codeCoverageIgnore
 */
class SidebarFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'wpemerge_theme.sidebar.sidebar';
    }
}
