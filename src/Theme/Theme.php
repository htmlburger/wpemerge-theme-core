<?php

namespace WPEmergeTheme\Theme;

use Exception;
use WPEmerge;
use WPEmerge\Facades\Framework;
use WPEmergeTheme\Assets\AssetsServiceProvider;
use WPEmergeTheme\Avatar\AvatarServiceProvider;
use WPEmergeTheme\Config\ConfigServiceProvider;
use WPEmergeTheme\Image\ImageServiceProvider;
use WPEmergeTheme\Sidebar\SidebarServiceProvider;

/**
 * Main communication channel with the theme.
 */
class Theme {
	/**
	 * Flag whether the theme has been bootstrapped.
	 *
	 * @var boolean
	 */
	protected $bootstrapped = false;

	/**
	 * Array of theme service providers.
	 *
	 * @var string[]
	 */
	protected $service_providers = [
		AssetsServiceProvider::class,
		AvatarServiceProvider::class,
		ConfigServiceProvider::class,
		ImageServiceProvider::class,
		SidebarServiceProvider::class,
	];

	/**
	 * Get whether the theme has been bootstrapped.
	 *
	 * @return boolean
	 */
	public function isBootstrapped() {
		return $this->bootstrapped;
	}

	/**
	 * Bootstrap WPEmerge.
	 *
	 * @param  array $config
	 * @return void
	 */
	protected function bootstrapFramework( $config ) {
		if ( ! isset( $config['providers'] ) ) {
			$config['providers'] = [];
		}

		$config['providers'] = array_merge(
			$config['providers'],
			$this->service_providers
		);

		Framework::bootstrap( $config );
	}

	/**
	 * Bootstrap the theme.
	 *
	 * @param  array     $config
	 * @throws Exception
	 * @return void
	 */
	public function bootstrap( $config = [] ) {
		if ( $this->isBootstrapped() ) {
			throw new Exception( static::class . ' already bootstrapped.' );
		}

		$this->bootstrapFramework( $config );
		$this->bootstrapped = true;
	}

	/**
	 * Render a template partial using app_render().
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
			$templates[] = "partials/${partial}-${child}.php";
		}

		$templates[] = "partials/${partial}.php";

		app_render( $templates, $context );
	}

	/**
	 * Alias of WPEmergeTheme\Assets\Assets::getThemeUri
	 *
	 * @see WPEmergeTheme\Assets\Assets::getThemeUri
	 * @return string
	 */
	public function uri() {
		return \Theme\Assets::getThemeUri();
	}
}
