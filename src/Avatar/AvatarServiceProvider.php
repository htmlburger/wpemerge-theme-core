<?php

namespace WPEmergeTheme\Avatar;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide avatar dependencies.
 *
 * @codeCoverageIgnore
 */
class AvatarServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		$container['wpemerge_theme.avatar.avatar'] = function() {
			return new Avatar();
		};
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		$container['wpemerge_theme.avatar.avatar']->bootstrap();
	}
}
