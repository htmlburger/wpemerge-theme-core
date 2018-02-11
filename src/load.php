<?php

use WPEmergeTheme\Theme\Theme;
use WPEmergeTheme\Theme\ThemeFacade;
use WPEmerge\Facades\Framework;

// @codeCoverageIgnoreStart
$container = Framework::getContainer();
$container['wpemerge_theme'] = function() {
	return new Theme();
};
Framework::facade( 'WPEmergeTheme', ThemeFacade::class );
// @codeCoverageIgnoreEnd
