<?php

// modules/dynamic-tags/manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'elementor/dynamic_tags/register_tags', 'ddw_cpel_register_dynamic_tags_polylang_languages', 10, 1 );
/**
 * Register new Dynamic Tags for Elementor, including a new Tag Group.
 *
 * @since 1.0.0
 *
 * @uses  \Elementor\Plugin()
 */
function ddw_cpel_register_dynamic_tags_polylang_languages( $dynamic_tags ) {

	/** Register our tag groups before the tags */
	\Elementor\Plugin::$instance->dynamic_tags->register_group( 'polylang-languages', [
		'title' => _x( 'Polylang Languages', 'Elementor Dynamic Tags group title', 'connect-polylang-elementor' ) 
	] );

	/** Load the Dynamic tags class files */
	require_once( CPEL_PLUGIN_DIR . 'modules/dynamic-tags/polylang-language-names.php' );
	require_once( CPEL_PLUGIN_DIR . 'modules/dynamic-tags/polylang-current-language-name.php' );
	require_once( CPEL_PLUGIN_DIR . 'modules/dynamic-tags/polylang-current-language-code.php' );
	require_once( CPEL_PLUGIN_DIR . 'modules/dynamic-tags/polylang-current-language-url.php' );
	require_once( CPEL_PLUGIN_DIR . 'modules/dynamic-tags/polylang-current-language-flag.php' );

	/** Register the tags */
	$dynamic_tags->register_tag( 'DDW_Polylang_Language_Names_Elementor_Dynamic_Tag' );
	$dynamic_tags->register_tag( 'DDW_Polylang_Current_Language_Name_Elementor_Dynamic_Tag' );
	$dynamic_tags->register_tag( 'DDW_Polylang_Current_Language_Code_Elementor_Dynamic_Tag' );
	$dynamic_tags->register_tag( 'DDW_Polylang_Current_Language_URL_Elementor_Dynamic_Tag' );
	$dynamic_tags->register_tag( 'DDW_Polylang_Current_Language_Flag_Elementor_Dynamic_Tag' );

}  // end function
