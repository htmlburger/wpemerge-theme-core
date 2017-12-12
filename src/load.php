<?php

use WPEmergeTheme\Theme\Theme;
use WPEmergeTheme\Theme\ThemeFacade;

// @codeCoverageIgnoreStart
$container = WPEmerge::getContainer();
$container['wpemerge_theme'] = function() {
	return new Theme();
};
WPEmerge::facade( 'WPEmergeTheme', ThemeFacade::class );
// @codeCoverageIgnoreEnd
