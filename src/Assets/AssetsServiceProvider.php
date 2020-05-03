<?php
/**
 * @package   WPEmergeThemeCore
 * @author    Atanas Angelov <hi@atanas.dev>
 * @copyright 2017-2020 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmergeThemeCore\Assets;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide assets dependencies.
 *
 * @codeCoverageIgnore
 */
class AssetsServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		$container['wpemerge_theme.assets.manifest'] = function() {
			return new Manifest();
		};

		$container['wpemerge_theme.assets.assets'] = function( $container ) {
			return new Assets( $container['wpemerge_theme.assets.manifest'] );
		};
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		// Nothing to bootstrap.
	}
}
