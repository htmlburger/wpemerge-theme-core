<?php

namespace WPEmergeTheme\Facades;

use WPEmerge\Support\Facade;

/**
 * Provide access to the avatar service
 *
 * @codeCoverageIgnore
 * @see \WPEmergeTheme\Avatar\Avatar
 *
 * @method static void bootstrap()
 * @method static void setDefault( integer $attachment_id )
 * @method static void addUserMetaKey( string $user_meta_key )
 * @method static void removeUserMetaKey( string $user_meta_key )
 * @method static string filterAvatar( string $url, integer|string $id_or_email, array $args )
 */
class Avatar extends Facade {
	protected static function getFacadeAccessor() {
		return 'wpemerge_theme.avatar.avatar';
	}
}
