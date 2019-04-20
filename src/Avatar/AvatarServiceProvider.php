<?php

namespace WPEmergeTheme\Avatar;

use WPEmerge\Facades\Application;
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

		Application::alias( 'Theme\\Avatar', \WPEmergeTheme\Facades\Avatar::class );
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		\WPEmergeTheme\Facades\Avatar::bootstrap();
	}
}
