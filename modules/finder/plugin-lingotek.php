<?php

// modules/finder/plugin-lingotek

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Add the "Polylang" category to the Elementor Finder.
 *   - Settings pages
 *   - Plugin resources
 *
 * @since 1.1.0
 */
class DDW_Lingotek_Plugin_Finder_Category extends \Elementor\Core\Common\Modules\Finder\Base_Category {

	/**
	 * Get title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Translateable category title.
	 */
	public function get_title() {

		return _x( 'Lingotek Translation Plugin', 'Category title in Elementor Finder', 'connect-polylang-elementor' );

	}  // end method


	/**
	 * Get category items.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @uses ddw_cpel_is_polylang_pro_active()
	 * @uses pll_languages_list() Holds array of Polylang languages.
	 *
	 * @param array $options
	 * @return array $items Filterable array of additional Finder items.
	 */
	public function get_category_items( array $options = [] ) {

		/** Set "Lingotek" string */
		$string_lingotek = _x( 'Lingotek', 'Item title part in Elementor Finder', 'connect-polylang-elementor' ) . ': ';

		/** Set actions */
		$action_name = 'view';
		$action_icon = 'eye';

		/** Settings: Dashboard */
		$items[ 'dashboard' ] = [
			'title'       => $string_lingotek . _x( 'Translation Dashboard', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => admin_url( 'admin.php?page=lingotek-translation' ),
			'icon'        => 'comments',
			'keywords'    => [ 'lingotek', 'languages', 'dashboard', 'translations', 'overview' ],
			'description' => __( 'Analysis and tasks', 'connect-polylang-elementor' ),
		];


		/** Settings: Manage */
		$items[ 'content-types' ] = [
			'title'       => $string_lingotek . _x( 'Content Type Configuration', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => admin_url( 'admin.php?page=lingotek-translation_manage&sm=content' ),
			'icon'        => 'exchange',
			'keywords'    => [ 'lingotek', 'content', 'type', 'configuration' ],
			'description' => __( 'Configure content types', 'connect-polylang-elementor' ),
		];

		$items[ 'translation-profiles' ] = [
			'title'       => $string_lingotek . _x( 'Translation Profiles', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => admin_url( 'admin.php?page=lingotek-translation_manage&sm=profiles' ),
			'icon'        => 'exchange',
			'keywords'    => [ 'lingotek', 'translations', 'profiles', 'reusage' ],
			'description' => __( 'Define profiles for reusage', 'connect-polylang-elementor' ),
		];


		/** Settings: General, for plugin */
		$items[ 'settings' ] = [
			'title'       => $string_lingotek . _x( 'Settings', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => admin_url( 'admin.php?page=mlang_settings' ),
			'icon'        => 'settings',
			'keywords'    => [ 'polylang', 'settings', 'options', 'modules' ],
			'description' => __( 'Plugin\'s settings, enable/ disable modules', 'connect-polylang-elementor' ),
		];


		/** External: documentation */
		$items[ 'documentation' ] = [
			'title'       => $string_lingotek . _x( 'Plugin Documentation', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => 'https://polylang.pro/doc/',
			'icon'        => 'info',
			'keywords'    => [ 'help', 'support', 'docs', 'documentation', 'faq', 'knowledge base' ],
			'description' => __( 'FAQ, Knowledge Base and Documentation', 'connect-polylang-elementor' ),
			'actions'     => [
				[
					'name' => $action_name,
					'url'  => 'https://polylang.pro/doc/',
					'icon' => $action_icon,
				],
			],
		];

		/** External: WordPress.org support forum */
		$items[ 'support-forum' ] = [
			'title'       => $string_lingotek . _x( 'Support Forum', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => 'https://wordpress.org/support/plugin/lingotek-translation',
			'icon'        => 'comments',
			'keywords'    => [ 'support', 'forum', 'wordpress.org', 'help', 'lingotek' ],
			'description' => __( 'Free support on WordPress.org', 'connect-polylang-elementor' ),
			'actions'     => [
				[
					'name' => $action_name,
					'url'  => 'https://wordpress.org/support/plugin/lingotek-translation',
					'icon' => $action_icon,
				],
			],
		];

		/** Return items array, filterable */
		return apply_filters(
			'cpel/filter/elementor_finder/items/lingotek',
			$items
		);

	}  // end method

}  // end of class
