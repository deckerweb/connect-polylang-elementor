<?php

// modules/finder/manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'elementor/finder/categories/init', 'ddw_cpel_elementor_finder_add_items' );
/**
 * Add categories to the Elementor Finder (Elementor v2.3.0+).
 *   - Polylang Plugin
 *   - CPEL (this plugin)
 *
 * @since 1.0.0
 *
 * @param object $categories_manager
 */
function ddw_cpel_elementor_finder_add_items( $categories_manager ) {

	/** Include the Finder Category class files */
	require_once( CPEL_PLUGIN_DIR . 'modules/finder/plugin-polylang.php' );
	require_once( CPEL_PLUGIN_DIR . 'modules/finder/plugin-cpel.php' );

	/** Add the Polyang Plugin category */
	$categories_manager->add_category( 'polylang-plugin', new DDW_Polylang_Plugin_Finder_Category() );

	/** Add the our own CPEL Plugin category */
	$categories_manager->add_category( 'connect-polylang-elementor', new DDW_CPEL_Plugin_Finder_Category() );

}  // end function
