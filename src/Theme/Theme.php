<?php

namespace WPEmergeTheme\Theme;

use WPEmerge;
use WPEmerge\Facades\Framework;
use WPEmerge\Helpers\MixedType;
use WPEmergeTheme\Assets\AssetsServiceProvider;
use WPEmergeTheme\Avatar\AvatarServiceProvider;
use WPEmergeTheme\Image\ImageServiceProvider;
use WPEmergeTheme\Sidebar\SidebarServiceProvider;

/**
 * Main communication channel with the theme.
 */
class Theme {
	/**
	 * Flag whether the theme has been booted.
	 *
	 * @var boolean
	 */
	protected $booted = false;

	/**
	 * Array of theme service providers
	 *
	 * @var string[]
	 */
	protected $service_providers = [
		AssetsServiceProvider::class,
		AvatarServiceProvider::class,
		ImageServiceProvider::class,
		SidebarServiceProvider::class,
	];

	/**
	 * Get whether the theme has been booted.
	 *
	 * @return boolean
	 */
	public function isBooted() {
		return $this->booted;
	}

	/**
	 * Bootstrap WPEmerge.
	 *
	 * @param  array $config
	 * @return void
	 */
	protected function bootFramework( $config ) {
		if ( ! isset( $config['providers'] ) ) {
			$config['providers'] = [];
		}

		$config['providers'] = array_merge(
			$config['providers'],
			$this->service_providers
		);

		Framework::boot( $config );
	}

	/**
	 * Bootstrap the theme.
	 *
	 * @param  array     $config
	 * @throws Exception
	 * @return void
	 */
	public function boot( $config = [] ) {
		if ( $this->isBooted() ) {
			throw new Exception( static::class . ' already booted.' );
		}

		do_action( 'wpemerge_theme.booting' );

		$this->bootFramework( $config );

		$this->booted = true;

		do_action( 'wpemerge_theme.booted' );
	}

	/**
	 * Render a template partial using app_partial().
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

		app_partial( $templates, $context );
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
