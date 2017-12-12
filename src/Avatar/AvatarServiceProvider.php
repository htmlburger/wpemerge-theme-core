<?php

namespace WPEmergeTheme\Avatar;

use WPEmerge;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provide avatar dependencies
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

		WPEmerge::facade( 'Theme\\Avatar', AvatarFacade::class );
	}

	/**
	 * {@inheritDoc}
	 */
	public function boot( $container ) {
		\Theme\Avatar::boot(); // facade
	}
}
