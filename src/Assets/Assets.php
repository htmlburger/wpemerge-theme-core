<?php

namespace WPEmergeTheme\Assets;

use WPEmerge\Helpers\MixedType;

class Assets {
	/**
	 * Manifest.
	 *
	 * @var Manifest
	 */
	protected $manifest = null;

	/**
	 * Constructor.
	 *
	 * @param Manifest $manifest
	 */
	public function __construct( Manifest $manifest ) {
		$this->manifest = $manifest;
	}

	/**
	 * Remove the protocol from an http/https url.
	 *
	 * @param  string $url
	 * @return string
	 */
	protected function removeProtocol( $url ) {
		return preg_replace( '~^https?:~i', '', $url );
	}

	/**
	 * Get if a url is external or not.
	 *
	 * @param  string  $url
	 * @param  string  $home_url
	 * @return boolean
	 */
	protected function isExternalUrl( $url, $home_url ) {
		$delimiter = '~';
		$pattern_home_url = preg_quote( $home_url, $delimiter );
		$pattern = $delimiter . '^' . $pattern_home_url . $delimiter . 'i';
		return ! preg_match( $pattern, $url );
	}

	/**
	 * Generate a version for a given asset src.
	 *
	 * @param  string          $src
	 * @return integer|boolean
	 */
	protected function generateFileVersion( $src ) {
		// Normalize both URLs in order to avoid problems with http, https
		// and protocol-less cases.
		$src = $this->removeProtocol( $src );
		$home_url = $this->removeProtocol( WP_CONTENT_URL );
		$version = false;

		if ( ! $this->isExternalUrl( $src, $home_url ) ) {
			// Generate the absolute path to the file.
			$file_path = MixedType::normalizePath( str_replace(
				[$home_url, '/'],
				[WP_CONTENT_DIR, DIRECTORY_SEPARATOR],
				$src
			) );

			if ( file_exists( $file_path ) ) {
				// Use the last modified time of the file as a version.
				$version = filemtime( $file_path );
			}
		}

		return $version;
	}

	/**
	 * Get the public URI to the current theme directory root.
	 *
	 * @return string
	 */
	public function getThemeUri() {
		$template_uri = get_template_directory_uri();
		$template_uri = preg_replace( '~/' . preg_quote( APP_THEME_DIR_NAME, '~' ) . '/?$~', '', $template_uri );
		return $template_uri;
	}

	/**
	 * Get the public URI to a generated asset based on manifest.json.
	 *
	 * @param string $asset
	 *
	 * @return string
	 */
	public function getAssetUri( $asset ) {
		// Path with unix-style slashes.
		$path = $this->manifest->get( $asset, '' );

		if ( ! $path ) {
			return '';
		}

		return $this->getThemeUri() . '/' . APP_DIST_DIR_NAME . '/' . $path;
	}

	/**
	 * Enqueue a style, dynamically generating a version for it.
	 *
	 * @param  string        $handle
	 * @param  string        $src
	 * @param  array<string> $dependencies
	 * @param  string        $media
	 * @return void
	 */
	public function enqueueStyle( $handle, $src, $dependencies = [], $media = 'all' ) {
		wp_enqueue_style( $handle, $src, $dependencies, $this->generateFileVersion( $src ), $media );
	}

	/**
	 * Enqueue a script, dynamically generating a version for it.
	 *
	 * @param  string        $handle
	 * @param  string        $src
	 * @param  array<string> $dependencies
	 * @param  boolean       $in_footer
	 * @return void
	 */
	public function enqueueScript( $handle, $src, $dependencies = [], $in_footer = false ) {
		wp_enqueue_script( $handle, $src, $dependencies, $this->generateFileVersion( $src ), $in_footer );
	}

	/**
	 * Add favicon meta.
	 *
	 * @return void
	 */
	public function addFavicon() {
		if ( function_exists( 'has_site_icon' ) && has_site_icon() ) {
			// allow users to override the favicon using the WordPress Customizer
			return;
		}

		$favicon_uri = apply_filters( 'app_favicon_uri', $this->getAssetUri( 'images/favicon.ico' ) );

		echo '<link rel="shortcut icon" href="' . $favicon_uri . '" />' . "\n";
	}
}
