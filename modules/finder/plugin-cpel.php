<?php

// modules/finder/plugin-cpel

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Add the "Polylang Connect for Elementor" category to the Elementor Finder.
 *   - Plugin resources
 *
 * @since 1.0.0
 */
class DDW_CPEL_Plugin_Finder_Category extends \Elementor\Core\Common\Modules\Finder\Base_Category {

	/**
	 * Get title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Translateable category title.
	 */
	public function get_title() {

		return _x( 'Add-On: Polylang Connect for Elementor', 'Category title in Elementor Finder', 'connect-polylang-elementor' );

	}  // end method


	/**
	 * Get category items.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @uses ddw_cpel_get_info_url()
	 *
	 * @param array $options
	 * @return array $items Filterable array of additional Finder items.
	 */
	public function get_category_items( array $options = [] ) {

		/** Set actions */
		$action_name = 'view';
		$action_icon = 'eye';

		/** External: FAQ */
		$items[ 'plugin-faq' ] = [
			'title'       => _x( 'Plugin FAQ', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => ddw_cpel_get_info_url( 'url_wporg_faq' ),
			'icon'        => 'info',
			'keywords'    => [ 'help', 'docs', 'documentation', 'faq', 'knowledge base', 'plugin' ],
			'description' => __( 'FAQ and Documentation', 'connect-polylang-elementor' ),
			'actions'     => [
				[
					'name' => $action_name,
					'url'  => ddw_cpel_get_info_url( 'url_wporg_faq' ),
					'icon' => $action_icon,
				],
			],
		];

		/** External: WordPress.org support forum */
		$items[ 'plugin-support-forum' ] = [
			'title'       => _x( 'Plugin Support Forum', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => ddw_cpel_get_info_url( 'url_wporg_forum' ),
			'icon'        => 'comments',
			'keywords'    => [ 'support', 'forum', 'wordpress.org', 'help', 'plugin' ],
			'description' => __( 'Free support on WordPress.org', 'connect-polylang-elementor' ),
			'actions'     => [
				[
					'name' => $action_name,
					'url'  => ddw_cpel_get_info_url( 'url_wporg_forum' ),
					'icon' => $action_icon,
				],
			],
		];

		/** External: WordPress.org translation platform */
		$items[ 'plugin-translations' ] = [
			'title'       => _x( 'Plugin Translations', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => ddw_cpel_get_info_url( 'url_translate' ),
			'icon'        => 'exchange',
			'keywords'    => [ 'translate', 'translations', 'wordpress.org', 'glotpress', 'plugin' ],
			'description' => __( 'Translate this plugin on WordPress.org', 'connect-polylang-elementor' ),
			'actions'     => [
				[
					'name' => $action_name,
					'url'  => ddw_cpel_get_info_url( 'url_translate' ),
					'icon' => $action_icon,
				],
			],
		];

		/** Return items array, filterable */
		return apply_filters(
			'cpel/filter/elementor_finder/items/plugin_resources',
			$items
		);

	}  // end method

}  // end of class
