<?php

namespace WPEmergeTheme\Concerns;

use WPEmerge\Support\Arr;

trait ReadsJsonTrait {
	/**
	 * Cache.
	 *
	 * @var array|null
	 */
	protected $cache = null;

	/**
	 * Get the path to the JSON that should be read.
	 *
	 * @return string
	 */
	abstract protected function getJsonPath();

	/**
	 * Load the json file.
	 *
	 * @param string $file
	 *
	 * @return array
	 */
	protected function load( $file ) {
		if ( ! file_exists( $file ) ) {
			throw new JsonFileNotFoundException( 'The required ' . basename( $file ) . ' file is missing.' );
		}

		$contents = file_get_contents( $file );
		$json = json_decode( $contents, true );
		$json_error = json_last_error();

		if ( $json_error !== JSON_ERROR_NONE ) {
			throw new JsonFileInvalidException( 'The required ' . basename( $file ) . ' file is not valid JSON (error code ' . $json_error . ').' );
		}

		return $json;
	}

	/**
	 * Get the entire json array.
	 *
	 * @return array
	 */
	protected function getAll() {
		if ($this->cache === null) {
			$this->cache = $this->load( $this->getJsonPath() );
		}

		return $this->cache;
	}

	/**
	 * Get a json value.
	 *
	 * @param  string $key
	 * @param  mixed  $default
	 * @return mixed
	 */
	public function get( $key, $default = null ) {
		return Arr::get( $this->getAll(), $key, $default );
	}
}
