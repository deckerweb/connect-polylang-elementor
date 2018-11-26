<?php

// modules/widget/polylang-language-switcher

namespace DDW_Connect_Polylang_Elementor;

use DDW_Connect_Polylang_Elementor\Widgets\Polylang_Language_Switcher;

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Register_Widget {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		$this->add_actions();

	}  // end method


	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );

		add_action( 'elementor/preview/enqueue_styles', function() {
			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

			wp_enqueue_style(
				'plsfe-editor',
				plugins_url( '/assets/css/plsfe-editor' . $suffix . '.css', CPEL__FILE__ ),
				'',
				CPEL_PLUGIN_VERSION
			);
		} );

		add_action( 'elementor/frontend/after_enqueue_styles', function() {
			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

			wp_register_style(
				'plsfe-frontend',
				plugins_url( '/assets/css/plsfe-frontend' . $suffix . '.css', CPEL__FILE__ ),
				'',
				CPEL_PLUGIN_VERSION
			);
		} );

	}  // end method


	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {

		$this->includes();
		$this->register_widget();

	}  // end method


	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {

		require_once( CPEL_PLUGIN_DIR . 'modules/widgets/polylang-language-switcher.php' );

	}  // end method


	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Polylang_Language_Switcher() );

	}  // end method

}  // end of class
