<?php

// includes/tweaks-polylang-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'parse_query', 'ddw_cpel_polylang_elementor_library_conditions_parse_query', 1 );
/**
 * Fix for Elementor template conditions not compatible with Polylang (you need
 *   to save again one of your templates conditions to make it work, after
 *   putting this function in your plugin/theme).
 *   Note: Needs to be priority 1, since Polylang uses the action parse_query
 *         which is fired before 'pre_get_posts'.
 *
 * @link  https://github.com/polylang/polylang/issues/152#issuecomment-320602328
 * @link  https://github.com/pojome/elementor/issues/4839
 *
 * @since 1.0.0
 *
 * @param WP_Query $query
 */
function ddw_cpel_polylang_elementor_library_conditions_parse_query( $query ) {

	if ( is_admin() && ! empty( $query->query_vars[ 'post_type' ] ) && 'elementor_library' === $query->query_vars[ 'post_type' ]
	     && ! empty( $query->query_vars[ 'meta_key' ] )
	     && '_elementor_conditions' === $query->query_vars[ 'meta_key' ]
	) {
		$query->set( 'lang', '' );
	}

}  // end function


add_filter( 'elementor/theme/get_location_templates/template_id', 'ddw_cpel_change_template_based_on_language' );
/**
 * Filter Elementor conditions system: Change Elementor template based on a set
 *   language in Polylang plugin.
 *
 * @link   https://github.com/pojome/elementor/issues/4839
 *
 * @since  1.0.0
 *
 * @param  string $post_id
 * @return string Based translation, the translation ID, or the original Post ID.
 */
function ddw_cpel_change_template_based_on_language( $post_id ) {

	if ( function_exists( 'pll_get_post' ) ) {

		$translation_post_id = pll_get_post( $post_id );

		if ( null === $translation_post_id ) {

			/** The current language is not defined yet */
			return $post_id;

		} elseif ( false === $translation_post_id ) {

			/** No translation yet */
			return $post_id;

		} elseif ( $translation_post_id > 0 ) {

			/** Return translated post ID */
			return $translation_post_id;

		}  // end if

	}  // end if

	return $post_id;

}  // end function
