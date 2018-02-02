<?php

use WPEmerge\Facades\Framework;
use WPEmergeTheme\Theme\Theme;
use WPEmergeTheme\Theme\ThemeFacade;

// @codeCoverageIgnoreStart
$container = Framework::getContainer();
$container['wpemerge_theme'] = function() {
	return new Theme();
};
Framework::facade( 'WPEmergeTheme', ThemeFacade::class );
// @codeCoverageIgnoreEnd
