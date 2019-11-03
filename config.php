<?php
/**
 * @package   WPEmergeTheme
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2019 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

/**
 * Absolute path to theme core's directory
 */
if ( ! defined( 'WPEMERGE_THEME_CORE_DIR' ) ) {
	define( 'WPEMERGE_THEME_CORE_DIR', __DIR__ );
}

/**
 * Absolute path to theme core's src directory
 */
if ( ! defined( 'WPEMERGE_THEME_CORE_SRC_DIR' ) ) {
	define( 'WPEMERGE_THEME_CORE_SRC_DIR', WPEMERGE_THEME_CORE_DIR . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR );
}
