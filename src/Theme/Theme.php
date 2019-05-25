<?php

namespace WPEmergeTheme\Theme;

use WPEmerge;
use WPEmerge\Exceptions\ConfigurationException;
use WPEmerge\Facades\Application;
use WPEmergeTheme\Assets\AssetsServiceProvider;
use WPEmergeTheme\Avatar\AvatarServiceProvider;
use WPEmergeTheme\Config\ConfigServiceProvider;
use WPEmergeTheme\Facades\Assets;
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
	protected function bootstrapApplication( $config ) {
		if ( ! isset( $config['providers'] ) ) {
			$config['providers'] = [];
		}

		$config['providers'] = array_merge(
			$config['providers'],
			$this->service_providers
		);

		Application::bootstrap( $config );
	}

	/**
	 * Bootstrap the theme.
	 *
	 * @param  array $config
	 * @return void
	 */
	public function bootstrap( $config = [] ) {
		if ( $this->isBootstrapped() ) {
			throw new ConfigurationException( static::class . ' already bootstrapped.' );
		}

		$this->bootstrapped = true;
		$this->bootstrapApplication( $config );
	}

	/**
	 * Render a template partial using WPEmerge\render().
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

		WPEmerge\render( $templates, $context );
	}

	/**
	 * Alias for WPEmergeTheme\Assets\Assets::getThemeUri().
	 *
	 * @see \WPEmergeTheme\Assets\Assets::getThemeUri
	 * @return string
	 */
	public function uri() {
		return Assets::getThemeUri();
	}
}
