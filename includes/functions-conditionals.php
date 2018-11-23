<?php

// includes/functions-conditionals

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Is Elementor (free) plugin active or not?
 *
 * @since  1.0.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_cpel_is_elementor_active() {

	return defined( 'ELEMENTOR_VERSION' );

}  // end function


/**
 * Is Elementor Pro plugin active or not?
 *
 * @since  1.0.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_cpel_is_elementor_pro_active() {

	return defined( 'ELEMENTOR_PRO_VERSION' );

}  // end function


/**
 * Is Polylang (free) plugin active or not?
 *
 * @since  1.0.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_cpel_is_polylang_active() {

	return defined( 'ELEMENTOR_VERSION' );

}  // end function
