<?php
/**
 * @package   WPEmergeThemeCore
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2020 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeThemeCore\Theme;

use WPEmerge\Application\Application;

/**
 * Main communication channel with the theme.
 */
class Theme {
	/**
	 * Application instance.
	 *
	 * @var Application
	 */
	protected $app = null;

	/**
	 * Constructor.
	 *
	 * @param Application $app
	 */
	public function __construct( $app ) {
		$this->app = $app;
	}

	/**
	 * Shortcut to \WPEmergeThemeCore\Assets\Assets.
	 *
	 * @return \WPEmergeThemeCore\Assets\Assets
	 */
	public function assets() {
		return $this->app->resolve( 'wpemerge_theme_core.assets.assets' );
	}

	/**
	 * Shortcut to \WPEmergeThemeCore\Avatar\Avatar.
	 *
	 * @return \WPEmergeThemeCore\Avatar\Avatar
	 */
	public function avatar() {
		return $this->app->resolve( 'wpemerge_theme_core.avatar.avatar' );
	}

	/**
	 * Shortcut to \WPEmergeThemeCore\Config\Config.
	 *
	 * @return \WPEmergeThemeCore\Config\Config
	 */
	public function config() {
		return $this->app->resolve( 'wpemerge_theme_core.config.config' );
	}

	/**
	 * Shortcut to \WPEmergeThemeCore\Image\Image.
	 *
	 * @return \WPEmergeThemeCore\Image\Image
	 */
	public function image() {
		return $this->app->resolve( 'wpemerge_theme_core.image.image' );
	}

	/**
	 * Shortcut to \WPEmergeThemeCore\Sidebar\Sidebar.
	 *
	 * @return \WPEmergeThemeCore\Sidebar\Sidebar
	 */
	public function sidebar() {
		return $this->app->resolve( 'wpemerge_theme_core.sidebar.sidebar' );
	}
}
