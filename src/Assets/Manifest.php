<?php
/**
 * @package   WPEmergeTheme
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2019 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

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
		return get_template_directory() . DIRECTORY_SEPARATOR . 'dist' . DIRECTORY_SEPARATOR . 'manifest.json';
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

		return [];
	}
}
