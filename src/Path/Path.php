<?php

namespace WPEmergeTheme\Path;

class Path {
	/**
	 * Normalize a path's slashes according to the current OS.
	 * Solves mixed slashes that are sometimes returned by WordPress core functions.
	 *
	 * @param  string $path
	 * @return string
	 */
	public function normalize( $path ) {
		return preg_replace( '~[/' . preg_quote( '\\', '~' ) . ']~', DIRECTORY_SEPARATOR, $path );
	}
}
