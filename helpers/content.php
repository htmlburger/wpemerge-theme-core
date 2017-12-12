<?php
/**
 * Filter excerpt more
 *
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_more/
 * @return string
 */
function wpmt_filter_excerpt_more() {
	return '...';
}

/**
 * Filter excerpt length
 *
 * @see https://developer.wordpress.org/reference/hooks/excerpt_length/
 * @return integer
 */
function wpmt_filter_excerpt_length() {
	return 55;
}

/**
 * Filter shortcode usage leading to empty paragraps around it.
 *
 * @param  string $content
 * @return string
 */
function wpmt_fix_shortcode_empty_paragraphs($content) {
	$replacements = [
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']',
		']<br>'   => ']',
	];

	$content = strtr( $content, $replacements );

	return $content;
}

/**
 * Filter bloginfo description to omit the default tagline.
 *
 * @param  string $output
 * @param  string $show
 * @return string
 */
function wpmt_filter_remove_default_tagline( $output, $show ) {
	if ( $show !== 'description' ) {
		return $output;
	}

	$output = str_replace( 'Just another WordPress site', '', $output );

	return $output;
}

/**
 * Escape user input from WYSIWYG editors.
 *
 * Calls all filters usually executed on `the_content`.
 *
 * @param  string $content The content that needs to be escaped.
 * @return string The escaped content.
 */
function wpmt_content( $content ) {
	return apply_filters( 'wpmt_content', $content );
}
