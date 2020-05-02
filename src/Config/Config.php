<?php
/**
 * @package   WPEmergeTheme
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2019 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeTheme\Config;

use WPEmergeTheme\Concerns\ReadsJsonTrait;

class Config {
	use ReadsJsonTrait {
		load as traitLoad;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getJsonPath() {
		return get_template_directory() . DIRECTORY_SEPARATOR . 'config.json';
	}
}
