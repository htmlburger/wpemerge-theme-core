<?php
/**
 * @package   WPEmergeTheme
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2019 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeTheme\Theme;

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
	 * Shortcut to \WPEmergeTheme\Assets\Assets.
	 *
	 * @return \WPEmergeTheme\Assets\Assets
	 */
	public function assets() {
		return $this->app->resolve( 'wpemerge_theme.assets.assets' );
	}

	/**
	 * Shortcut to \WPEmergeTheme\Avatar\Avatar.
	 *
	 * @return \WPEmergeTheme\Avatar\Avatar
	 */
	public function avatar() {
		return $this->app->resolve( 'wpemerge_theme.avatar.avatar' );
	}

	/**
	 * Shortcut to \WPEmergeTheme\Config\Config.
	 *
	 * @return \WPEmergeTheme\Config\Config
	 */
	public function config() {
		return $this->app->resolve( 'wpemerge_theme.config.config' );
	}

	/**
	 * Shortcut to \WPEmergeTheme\Image\Image.
	 *
	 * @return \WPEmergeTheme\Image\Image
	 */
	public function image() {
		return $this->app->resolve( 'wpemerge_theme.image.image' );
	}

	/**
	 * Shortcut to \WPEmergeTheme\Sidebar\Sidebar.
	 *
	 * @return \WPEmergeTheme\Sidebar\Sidebar
	 */
	public function sidebar() {
		return $this->app->resolve( 'wpemerge_theme.sidebar.sidebar' );
	}

	/**
	 * Render a template partial using \App::render().
	 * Interface matches get_template_part() with the addition of $context.
	 *
	 * @param  string $partial
	 * @param  string $child
	 * @param  array  $context
	 * @return void
	 */
	public function partial( $partial, $child = '', $context = [] ) {
		if ( is_array( $child ) ) {
			// Optional argument $child not specified, flip input around.
			$context = $child;
			$child = '';
		}

		$templates = [];

		if ( $child ) {
			$templates[] = "views/partials/${partial}-${child}";
		}

		$templates[] = "views/partials/${partial}";

		$this->app->render( $templates, $context );
	}

	/**
	 * Alias for WPEmergeTheme\Assets\Assets::getThemeUri().
	 *
	 * @see \WPEmergeTheme\Assets\Assets::getThemeUri
	 * @return string
	 */
	public function uri() {
		return $this->app->resolve( 'wpemerge_theme.assets.assets' )->getThemeUri();
	}
}
