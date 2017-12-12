<?php
/**
 * Gravity Forms utilities.
 */

/**
 * Add additional classes to Gravity Forms fields.
 *
 * @param  string $classes The classes that will be applied.
 * @param  array  $field   The Field, whose classes can be modified.
 * @return string $classes
 */
function wpmt_decorate_gforms_classes( $classes, $field ) {
	$classes .= ' gfield-' . $field['type'] . ' gfield-' . $field['size'];

	return $classes;
}

/**
 * Return all available Gravity Forms
 *
 * @return array $forms_ids
 */
function wpmt_get_forms() {
	$forms_ids = array();

	if ( class_exists( 'RGFormsModel' ) ) {
		$forms = RGFormsModel::get_forms( null, 'title' );
		foreach ( $forms as $form ) {
			$forms_ids[ $form->id ] = $form->title;
		}
	}

	/**
	 * Filters the form list.
	 *
	 * @param array $forms_ids The IDs of the Gravity Forms in the list.
	 */
	$form_ids = apply_filters( 'wpmt_gravity_form_options', $forms_ids );

	return $forms_ids;
}

/**
 * Render a gravity form.
 *
 * This is just a shortcut for `gravity_form()` function without the crazy
 * arguments list and all available options.
 *
 * @uses gravity_form()
 *
 * @see  https://www.gravityhelp.com/documentation/article/embedding-a-form/#function-call
 *
 * @param  integer $id      The ID of the Gravity Form to be rendered.
 * @param  boolean $is_ajax Optional. Whether the submission should be processed.
 *                         via AJAX. Defaults to false.
 * @param  array   $args    Optional. An array of arguments.
 * @return void
 */
function wpmt_render_gform( $id, $is_ajax = false, $args = array() ) {
	if ( ! function_exists( 'gravity_form' ) || empty( $id ) ) {
		return;
	}

	// Using a shared auto-increment tabindex.
	static $gform_tabindex;
	if ( empty( $gform_tabindex ) ) {
		$gform_tabindex = 1;
	}

	/**
	 * Filters the TabIndex applied on Gravity Forms, if such is not explicitly set.
	 *
	 * @param integer $step The Step with which the global tabindex is increased each time.
	 */
	$step = apply_filters( 'wpmt_gform_tabindex_step', 500 );

	// Tabindex backward compatibility.
	if ( is_numeric( $args ) ) {
		$args = array(
			'tabindex' => $args,
		);
	}

	$args = wp_parse_args( $args, array(
		'display_title'       => false,
		'display_description' => false,
		'display_inactive'    => false,
		'field_values'        => null,
		'tabindex'            => $gform_tabindex,
	) );

	$gform_tabindex += $step;

	// Render the form.
	gravity_form(
		$id,
		$args['display_title'],
		$args['display_description'],
		$args['display_inactive'],
		$args['field_values'],
		$is_ajax,
		$args['tabindex']
	);
}

/**
 * Return path to spinner gif
 *
 * @param  string $image_src The spinner image URL to be filtered.
 * @param  object $form      Current form.
 * @return string
 */
function wpmt_gform_ajax_spinner_url( $image_src, $form ) {
	return get_bloginfo( 'stylesheet_directory' ) . '/dist/images/spinner.gif';
}
