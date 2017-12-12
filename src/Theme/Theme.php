<?php

namespace WPEmergeTheme\Theme;

use WPEmerge;
use WPEmergeTheme\Assets\AssetsServiceProvider;
use WPEmergeTheme\Avatar\AvatarServiceProvider;
use WPEmergeTheme\Image\ImageServiceProvider;
use WPEmergeTheme\Path\PathServiceProvider;
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
		PathServiceProvider::class,
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
	 * Throw an exception if the theme has not been booted.
	 *
	 * @throws Exception
	 * @return void
	 */
	protected function verifyBoot() {
		if ( ! $this->isBooted() ) {
			throw new Exception( static::class . ' must be booted first.' );
		}
	}

	/**
	 * Bootstrap WPEmerge.
	 *
	 * @return void
	 */
	protected function bootFramework() {
		$config = require_once WPMT_THEME_APP_DIR . 'config.php';

		if ( ! isset( $config['providers'] ) ) {
			$config['providers'] = [];
		}

		$config['providers'] = array_merge(
			$config['providers'],
			$this->service_providers
		);

		WPEmerge::boot( $config );

		require_once WPMT_THEME_APP_DIR . 'routes.php';
	}

	/**
	 * Boot the theme.
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

		$this->globRequire( WPEMERGETHEME_HELPERS_DIR . '*.php' );

		$this->bootFramework( $config );

		add_action( 'after_setup_theme', 'wpmt_boot_textdomain',    22 );
		add_action( 'after_setup_theme', 'wpmt_boot_helpers',       24 );
		add_action( 'after_setup_theme', 'wpmt_boot_hooks',         26 );
		add_action( 'after_setup_theme', 'wpmt_boot_theme_support', 28 );
		add_action( 'after_setup_theme', 'wpmt_boot_menus',         30 );
		add_action( 'init',              'wpmt_boot_content_types', 0  );
		add_action( 'widgets_init',      'wpmt_boot_widgets',       10 );
		add_action( 'widgets_init',      'wpmt_boot_sidebars',      10 );

		$this->booted = true;

		do_action( 'wpemerge_theme.booted' );
	}

	/**
	 * Require all files matching a glob once.
	 *
	 * @param  string  $glob
	 * @param  boolean $once
	 * @return void
	 */
	public function globRequire( $glob, $once = true ) {
		$includes = glob( $glob );
		foreach ( $includes as $include ) {
			if ( $once ) {
				require_once $include;
			} else {
				require $include;
			}
		}
	}

	/**
	 * Render a template partial.
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

		$templates = apply_filters( 'wpemerge_theme.view.partial.templates', $templates, $partial, $child, $context );
		$template = locate_template( $templates, false );

		if ( ! $template ) {
			return;
		}

		$renderer = function( $__template, $__context ) {
			extract( $__context );
			require $__template;
		};
		$renderer( $template, $context );
	}
}
