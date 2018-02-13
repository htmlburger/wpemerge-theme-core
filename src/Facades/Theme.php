<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the framework instance.
 *
 * @codeCoverageIgnore
 */
class ThemeFacade extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme';
	}
}
