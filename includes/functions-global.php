<?php

// includes/functions-global

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'wp_head', 'ddw_cpel_prepare_render_polylang_switcher' );
/**
 * Prepare for tweaks to the rendering of the Polylang Switcher widget.
 *   Note: Using in-between step via action hook 'wp_head' to enforce the
 *         rendering tweaks only on frontend - where only we want them to happen.
 *
 * @since 1.0.0
 *
 * @see   ddw_cpel_render_polylang_switcher()
 */
function ddw_cpel_prepare_render_polylang_switcher() {

	if ( function_exists( 'pll_current_language' ) ) {
		add_filter( 'elementor/widget/render_content', 'ddw_cpel_render_polylang_switcher', 10, 2 );
	}

}  // end function


//add_filter( 'elementor/widget/render_content', 'ddw_cpel_render_polylang_switcher', 10, 2 );
/**
 * Render the Polylang Switcher widget only on the frontend when the display
 *   conditions of the widget's settings are met:
 *   1) Display for "All languages"
 *     or
 *   2) Display only for the chosen language (which then must also the be current
 *      language of the browser content)
 *
 * @since  1.0.0
 *
 * @uses   pll_current_language() Provides slug current language.
 *
 * @param  string                 $widget_content  The content of the widget.
 * @param  \Elementor\Widget_Base $widget_instance The instance of the widget.
 * @return string Tweaked content of the widget.
 */
function ddw_cpel_render_polylang_switcher( $widget_content, $widget_instance ) {

	/** Bail early if no rendering tweaks wanted */
	if ( 'polylang-language-switcher' !== $widget_instance->get_name()
		|| \Elementor\Plugin::$instance->editor->is_edit_mode()
		|| is_admin()
	) {
		return $widget_content;
	}

	/** Get the widget settings */
	$display = sanitize_key( $widget_instance->get_settings_for_display( 'plsfe_widget_display' ) );

	/** Get current language */
	$current_lang = sanitize_key( pll_current_language( 'slug' ) );

	/**
	 * Only render the widget on the frontend if "All languages" is set, or if
	 *   the current language matches the chosen language from the setting.
	 */
	if ( 'all' === $display || $current_lang === $display ) {

		return $widget_content;

	} elseif ( $current_lang !== $display ) {

		return '<!-- hidden widget -->';

	}  // end if

}  // end function


/**
 * Setting internal plugin helper values.
 *
 * @since  1.0.0
 *
 * @return array $cpel_info Array of info values.
 */
function ddw_cpel_info_values() {

	$cpel_info = array(

		'url_translate'     => 'https://translate.wordpress.org/projects/wp-plugins/connect-polylang-elementor',
		'url_wporg_faq'     => 'https://wordpress.org/plugins/connect-polylang-elementor/#faq',
		'url_wporg_forum'   => 'https://wordpress.org/support/plugin/connect-polylang-elementor',
		'url_wporg_review'  => 'https://wordpress.org/support/plugin/connect-polylang-elementor/reviews/?filter=5/#new-post',
		'url_wporg_profile' => 'https://profiles.wordpress.org/daveshine/',
		'url_fb_group'      => 'https://www.facebook.com/groups/deckerweb.wordpress.plugins/',
		//'url_snippets'      => 'https://github.com/deckerweb/connect-polylang-elementor/wiki/Code-Snippets',
		'author'            => __( 'David Decker - DECKERWEB', 'connect-polylang-elementor' ),
		'author_uri'        => 'https://deckerweb.de/',
		'license'           => 'GPL-2.0-or-later',
		'url_license'       => 'https://opensource.org/licenses/GPL-2.0',
		'first_code'        => '2018',
		'url_donate'        => 'https://www.paypal.me/deckerweb',
		'url_plugin'        => 'https://github.com/deckerweb/connect-polylang-elementor',
		//'url_plugin_docs'   => 'https://github.com/deckerweb/connect-polylang-elementor/wiki',
		//'url_plugin_faq'    => 'https://wordpress.org/plugins/connect-polylang-elementor/#faq',
		'url_github'        => 'https://github.com/deckerweb/connect-polylang-elementor',
		'url_github_issues' => 'https://github.com/deckerweb/connect-polylang-elementor/issues',
		'url_twitter'       => 'https://twitter.com/deckerweb',
		'url_github_follow' => 'https://github.com/deckerweb',

	);  // end of array

	return $cpel_info;

}  // end function


/**
 * Get URL of specific BTC info value.
 *
 * @since  1.0.0
 *
 * @uses   ddw_cpel_info_values()
 *
 * @param  string $url_key String of value key from array of ddw_cpel_info_values()
 * @param  bool   $raw     If raw escaping or regular escaping of URL gets used
 * @return string URL for info value.
 */
function ddw_cpel_get_info_url( $url_key = '', $raw = FALSE ) {

	$cpel_info = (array) ddw_cpel_info_values();

	$output = esc_url( $cpel_info[ sanitize_key( $url_key ) ] );

	if ( TRUE === $raw ) {
		$output = esc_url_raw( $cpel_info[ esc_attr( $url_key ) ] );
	}

	return $output;

}  // end function


/**
 * Get link with complete markup for a specific BTC info value.
 *
 * @since  1.0.0
 *
 * @uses   ddw_cpel_get_info_url()
 *
 * @param  string $url_key String of value key
 * @param  string $text    String of text and link attribute
 * @param  string $class   String of CSS class
 * @return string HTML markup for linked URL.
 */
function ddw_cpel_get_info_link( $url_key = '', $text = '', $class = '' ) {

	$link = sprintf(
		'<a class="%1$s" href="%2$s" target="_blank" rel="nofollow noopener noreferrer" title="%3$s">%3$s</a>',
		strtolower( esc_attr( $class ) ),	//sanitize_html_class( $class ),
		ddw_cpel_get_info_url( $url_key ),
		esc_html( $text )
	);

	return $link;

}  // end function


/**
 * Get timespan of coding years for this plugin.
 *
 * @since  1.0.0
 *
 * @uses   ddw_cpel_info_values()
 *
 * @param  int $first_year Integer number of first year
 * @return string Timespan of years.
 */
function ddw_cpel_coding_years( $first_year = '' ) {

	$cpel_info = (array) ddw_cpel_info_values();

	$first_year = ( empty( $first_year ) ) ? absint( $cpel_info[ 'first_code' ] ) : absint( $first_year );

	/** Set year of first released code */
	$code_first_year = ( date( 'Y' ) == $first_year || 0 === $first_year ) ? '' : $first_year . '&#x02013;';

	return $code_first_year . date( 'Y' );

}  // end function
