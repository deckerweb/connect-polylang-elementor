<?php

// modules/connect/frontend

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'body_class', 'ddw_cpel_pll_frontend_body_class' );
/**
 * On frontend: Add the current active language's locale as (prefixed and
 *   sanitized) body class. This can help styling projects more easily.
 *
 * @since 1.1.0
 *
 * @uses PLL()
 *
 * @param array $classes An array of body classes.
 * @return array Modified array of body classes.
 */
function ddw_cpel_pll_frontend_body_class( $classes ) {

    if ( function_exists( 'PLL' ) && $language = PLL()->model->get_language( get_locale() ) ) {
        $classes[] = 'pll-' . str_replace( '_', '-', sanitize_title_with_dashes( $language->get_locale( 'raw' ) ) );
    }

    return $classes;

}  // end function