<?php

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
		return APP_DIR . 'config.json';
	}
}
