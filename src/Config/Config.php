<?php

namespace WPEmergeTheme\Config;

use RuntimeException;
use WPEmerge\Support\Arr;

class Config {
	/**
	 * Config cache.
	 *
	 * @var array|null
	 */
	protected $config = null;

	/**
	 * Load the config.
	 */
	protected function load() {
		$file = APP_DIR . 'config.json';

		if ( ! file_exists( $file ) ) {
			throw new RuntimeException( 'The required theme config.json file is missing.' );
		}

		$contents = file_get_contents( $file );
		$config = json_decode( $contents, true );
		$json_error = json_last_error();

		if ( $json_error !== JSON_ERROR_NONE ) {
			throw new RuntimeException( 'The required theme config.json file is not valid JSON (error code ' . $json_error . ').' );
		}

		return $config;
	}

	/**
	 * Get the entire config array.
	 *
	 * @return array
	 */
	protected function getAll() {
		if ($this->config === null) {
			$this->config = $this->load();
		}

		return $this->config;
	}

	/**
	 * Get a config value.
	 *
	 * @param  string $key
	 * @param  mixed  $default
	 * @return mixed
	 */
	public function get( $key, $default = null ) {
		return Arr::get( $this->getAll(), $key, $default );
	}
}
