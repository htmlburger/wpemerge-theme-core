<?php

use WPEmergeTheme\Facades\Theme as ThemeFacade;
use WPEmergeTheme\Theme\Theme;
use WPEmerge\Facades\Framework;

if ( php_sapi_name() !== 'cli' && ! defined( 'ABSPATH' ) ) {
	exit;
}

// @codeCoverageIgnoreStart
$container = Framework::getContainer();
$container['wpemerge_theme'] = function() {
	return new Theme();
};
Framework::facade( 'WPEmergeTheme', ThemeFacade::class );
// @codeCoverageIgnoreEnd
