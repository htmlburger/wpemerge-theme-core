<?php

namespace WPEmergeTheme\Sidebar;

class Sidebar {
	/**
	 * Get the current sidebar id.
	 *
	 * @param  string $meta_key Meta key to check for a sidebar id.
	 * @return string
	 */
	public function getCurrentSidebarId( $meta_key = '_crb_custom_sidebar' ) {
		$page_id = 0;
		$sidebar = '';

		if (is_page()) {
			$page_id = get_the_ID();
		} elseif ( is_home() || is_archive() || is_search() || ( is_single() && get_post_type() === 'post' ) ) {
			$page_id = intval( get_option( 'page_for_posts' ) );
		}

		$page_id = apply_filters( 'wpmt_sidebar_context_page_id', $page_id );

		if ( $page_id ) {
			$sidebar = get_post_meta( $page_id, $meta_key );
		}

		if ( empty( $sidebar ) ) {
			$sidebar = 'default-sidebar';
		}

		return $sidebar;
	}
}
