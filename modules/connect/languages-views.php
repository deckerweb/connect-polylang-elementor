<?php

// modules/connect/languages-views

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'views_edit-elementor_library', 'ddw_cpel_elementor_templates_view_languages' );
/**
 * Extend Elementor "My Templates" post type list table with views for every
 *   language defined in Polylang.
 *
 * @since 1.1.0
 *
 * @uses pll_languages_list()
 * @uses pll_count_posts()
 *
 * @param array $views Holds all views filters for this post type.
 * @return array Filtered array of views.
 */
function ddw_cpel_elementor_templates_view_languages( $views ) {

	/** Bail early if needed Polylang functions aren't available */
	if ( ! function_exists( 'pll_languages_list' ) || ! function_exists( 'pll_count_posts' ) ) {
		return;
	}

	/** Get Polylang languages */
	$languages = pll_languages_list( array( 'fields' => FALSE ) );

	/** Loop through all languages */
	foreach ( $languages as $language ) {
		
		$args = array( 'post_type' => 'elementor_library' );

		/** Get posts per languages */
		$count = pll_count_posts( $language->slug, $args );

		/** Extend the views for Elementor Templates */
		$views[ 'elementor-polylang-' . $language->slug ] = sprintf(
			'<a href="%s" title="%s">%s <span class="count">(%s)</span></a>',
			esc_url( admin_url( 'edit.php?post_type=elementor_library&lang=' . $language->slug ) ),
			/* translators: %s - Name of a language (Espanol, Deutsch, English, Francais, etc.) */
			sprintf( esc_html__( 'All Elementor Templates for language: %s', 'connect-polylang-elementor' ), $language->name ),
			esc_html( $language->name ),
			absint( $count )
		);

	}  // end foreach

	/** Return the filtered views */
	return $views;

}  // end function