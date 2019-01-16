<?php

namespace WPEmergeTheme\Assets;

use WPEmergeTheme\Concerns\JsonFileNotFoundException;
use WPEmergeTheme\Concerns\ReadsJsonTrait;

class Manifest {
	use ReadsJsonTrait {
		load as traitLoad;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getJsonPath() {
		return APP_DIST_DIR . 'manifest.json';
	}

	/**
	 * {@inheritDoc}
	 */
	protected function load( $file ) {
		try {
			return $this->traitLoad( $file );
		} catch ( JsonFileNotFoundException $e ) {
			// We used to throw an exception here but it just causes confusion for new users.
		}
	}
}
