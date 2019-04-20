<?php

use WPEmergeTheme\Facades\Theme as ThemeFacade;
use WPEmergeTheme\Theme\Theme;
use WPEmerge\Facades\Application;

if ( php_sapi_name() !== 'cli' && ! defined( 'ABSPATH' ) ) {
	exit;
}

// @codeCoverageIgnoreStart
$container = Application::getContainer();
$container['wpemerge_theme'] = function() {
	return new Theme();
};
Application::alias( 'WPEmergeTheme', ThemeFacade::class );
// @codeCoverageIgnoreEnd
