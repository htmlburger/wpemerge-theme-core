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
			throw new JsonFileNotFoundException( $e->getMessage() . ' Please run one of the build commands to generate it.' );
		}
	}
}
