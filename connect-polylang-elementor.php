<?php # -*- coding: utf-8 -*-
/**
 * Main plugin file.
 * @package           Connect Polylang to Elementor
 * @author            David Decker
 * @copyright         Copyright (c) 2018, David Decker - DECKERWEB
 * @license           GPL-2.0-or-later
 * @link              https://deckerweb.de/twitter
 *
 * @wordpress-plugin
 * Plugin Name:       Connect Polylang to Elementor
 * Plugin URI:        https://github.com/deckerweb/connect-polylang-elementor
 * Description:       Connect Polylang multilingual plugin with Elementor Page Builder: Use languages as conditions in Elementor Pro Theme Builder. Plus: Polylang links added to the Elementor Finder feature.
 * Version:           1.0.0
 * Author:            David Decker - DECKERWEB
 * Author URI:        https://deckerweb.de/
 * License:           GPL-2.0-or-later
 * License URI:       https://opensource.org/licenses/GPL-2.0
 * Text Domain:       connect-polylang-elementor
 * Domain Path:       /languages/
 * Requires WP:       4.7
 * Requires PHP:      5.6
 * GitHub Plugin URI: https://github.com/deckerweb/connect-polylang-elementor
 * GitHub Branch:     master
 *
 * Copyright (c) 2018 David Decker - DECKERWEB
 */

/**
 * Exit if called directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Setting constants.
 *
 * @since 1.0.0
 */
/** Plugin version */
define( 'CPEL_PLUGIN_VERSION', '1.0.0' );

/** Plugin directory */
define( 'CPEL_PLUGIN_DIR', trailingslashit( dirname( __FILE__ ) ) );

/** Plugin base directory */
define( 'CPEL_PLUGIN_BASEDIR', trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );


add_action( 'init', 'ddw_cpel_load_translations', 1 );
/**
 * Load the text domain for translation of the plugin.
 *
 * @since 1.0.0
 *
 * @uses  get_user_locale()
 * @uses  load_textdomain() Load translations first from WP_LANG_DIR sub folder.
 * @uses  load_plugin_textdomain() Additionally load default translations from
 *                                 plugin folder (default).
 */
function ddw_cpel_load_translations() {

	/** Set unique textdomain string */
	$cpel_textdomain = 'connect-polylang-elementor';

	/** The 'plugin_locale' filter is also used by default in load_plugin_textdomain() */
	$locale = esc_attr(
		apply_filters(
			'plugin_locale',
			get_user_locale(),
			$cpel_textdomain
		)
	);

	/**
	 * WordPress languages directory
	 *   Will default to: wp-content/languages/connect-polylang-elementor/connect-polylang-elementor-{locale}.mo
	 */
	$cpel_wp_lang_dir = trailingslashit( WP_LANG_DIR ) . trailingslashit( $cpel_textdomain ) . $cpel_textdomain . '-' . $locale . '.mo';

	/** Translations: First, look in WordPress' "languages" folder = custom & update-safe! */
	load_textdomain(
		$cpel_textdomain,
		$cpel_wp_lang_dir
	);

	/** Translations: Secondly, look in 'wp-content/languages/plugins/' for the proper .mo file (= default) */
	load_plugin_textdomain(
		$cpel_textdomain,
		FALSE,
		CPEL_PLUGIN_BASEDIR . 'languages'
	);

}  // end function


/** Include global functions */
require_once( CPEL_PLUGIN_DIR . 'includes/functions-global.php' );

/** Include (global) conditionals functions */
require_once( CPEL_PLUGIN_DIR . 'includes/functions-conditionals.php' );


add_action( 'init', 'ddw_cpel_setup_plugin' );
/**
 * Finally setup the plugin for the main tasks.
 *
 * @since 1.0.0
 */
function ddw_cpel_setup_plugin() {

	/** Include Elementor Finder functions */
	if ( ddw_cpel_is_elementor_active() ) {
		require_once( CPEL_PLUGIN_DIR . 'includes/items-elementor-finder.php' );
	}

	/** Include Polylang/Elementor tweaks */
	if ( ddw_cpel_is_polylang_active()
		&& ddw_cpel_is_elementor_pro_active()
		&& ddw_cpel_is_elementor_active()
	) {
		require_once( CPEL_PLUGIN_DIR . 'includes/tweaks-polylang-elementor.php' );
	}

	/** Include admin helper functions */
	if ( is_admin() ) {
		require_once( CPEL_PLUGIN_DIR . 'includes/admin-extras.php' );
	}

	/** Add links to Settings and Menu pages to Plugins page */
	if ( ( is_admin() || is_network_admin() ) ) {

		add_filter(
			'plugin_action_links_' . plugin_basename( __FILE__ ),
			'ddw_cpel_custom_settings_links'
		);

		add_filter(
			'network_admin_plugin_action_links_' . plugin_basename( __FILE__ ),
			'ddw_cpel_custom_settings_links'
		);

	}  // end if

}  // end function
