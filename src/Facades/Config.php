<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the assets service
 *
 * @codeCoverageIgnore
 */
class Config extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme.config.config';
	}
}
