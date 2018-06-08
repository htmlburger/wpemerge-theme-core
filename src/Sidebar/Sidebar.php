<?php

namespace WPEmergeTheme\Sidebar;

class Sidebar {
	/**
	 * Check if the current page is part of the blog structure.
	 *
	 * @return boolean
	 */
	protected function isBlog() {
		return ( is_home() || is_archive() || is_search() || ( is_single() && get_post_type() === 'post' ) );
	}

	/**
	 * Get the post id that should be checked for a custom sidebar for the current request.
	 *
	 * @return int
	 */
	protected function getSidebarPostId() {
		$post_id = intval( get_the_ID() );

		if ( $this->isBlog() ) {
			$post_id = intval( get_option( 'page_for_posts' ) );
		}

		$post_id = intval( apply_filters( 'app_sidebar_context_post_id', $post_id ) );

		return $post_id;
	}

	/**
	 * Get the current sidebar id.
	 *
	 * @param  string $default Default sidebar to use if a custom one is not specified.
	 * @param  string $meta_key Meta key to check for a custom sidebar id.
	 * @return string
	 */
	public function getCurrentSidebarId( $default = 'default-sidebar', $meta_key = '_app_custom_sidebar' ) {
		$post_id = $this->getSidebarPostId();
		$sidebar = $default;

		if ( $post_id ) {
			$sidebar = get_post_meta( $post_id, $meta_key, true );
		}

		if ( empty( $sidebar ) ) {
			$sidebar = $default;
		}

		return $sidebar;
	}
}
