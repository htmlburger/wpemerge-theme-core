<?php
/**
 * @package   WPEmerge
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2019 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeTheme\Application;

use WPEmergeTheme\Theme\Theme;

/**
 * Can be applied to your App class via a "@mixin" annotation for better IDE support.
 *
 * @codeCoverageIgnore
 */
class PortalMixin {
	/**
	 * Get the Theme service instance.
	 *
	 * @return Theme
	 */
	public static function theme() {}
}
