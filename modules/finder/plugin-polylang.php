<?php

// modules/finder/plugin-polylang

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
 * @since 1.0.0
 */
class DDW_Polylang_Plugin_Finder_Category extends \Elementor\Core\Common\Modules\Finder\Base_Category {

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

		return _x( 'Polylang - Multilingual Plugin', 'Category title in Elementor Finder', 'connect-polylang-elementor' );

	}  // end method


	/**
	 * Get category items.
	 *
	 * @since 1.0.0
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

		/** Set "Polylang (Pro)" string */
		$string_polylang = _x( 'Polylang', 'Item title part in Elementor Finder', 'connect-polylang-elementor' ) . ': ';

		if ( ddw_cpel_is_polylang_pro_active() ) {
			$string_polylang = _x( 'Polylang Pro', 'Item title part in Elementor Finder', 'connect-polylang-elementor' ) . ': ';
		}

		/** Set "Website Language" string */
		$string_website_lang = _x( 'Website Language', 'Item title part in Elementor Finder', 'connect-polylang-elementor' ) . ': ';

		/** Set "Polylang (Pro) Language" string */
		$string_polylang_lang = _x( 'Polylang Language', 'Item title part in Elementor Finder', 'connect-polylang-elementor' ) . ': ';

		if ( ddw_cpel_is_polylang_pro_active() ) {
			$string_polylang_lang = _x( 'Polylang Pro Language', 'Item title part in Elementor Finder', 'connect-polylang-elementor' ) . ': ';
		}

		/** Set actions */
		$action_name = 'view';
		$action_icon = 'eye';

		/** List all setup languages */
		$languages = pll_languages_list( array( 'fields' => FALSE ) );

		foreach ( $languages as $lang_data ) {

			$items[ 'website-language-' . $lang_data->slug ] = [
				'title'       => $string_website_lang . $lang_data->name,
				'url'         => esc_url( $lang_data->home_url ),
				'icon'        => 'eye',
				'keywords'    => [ 'website', 'polylang', 'language', $lang_data->name, $lang_data->slug, 'country', $lang_data->locale ],
				'description' => __( 'View website in this language', 'connect-polylang-elementor' ),
				'actions'     => [
					[
						'name' => 'edit',
						'url'  => esc_url_raw( admin_url( 'admin.php?page=mlang&pll_action=edit&lang=' . $lang_data->term_id ) ),
						'icon' => 'edit',
					],
				],
			];

		}  // end foreach

		foreach ( $languages as $lang_data ) {

			$items[ 'polylang-language-' . $lang_data->slug ] = [
				'title'       => $string_polylang_lang . $lang_data->name,
				'url'         => esc_url_raw( admin_url( 'admin.php?page=mlang&pll_action=edit&lang=' . $lang_data->term_id ) ),
				'icon'        => 'edit',
				'keywords'    => [ 'polylang', 'language', $lang_data->name, $lang_data->slug, 'country', $lang_data->locale ],
				'description' => __( 'Edit this language', 'connect-polylang-elementor' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => esc_url( $lang_data->home_url ),
						'icon' => $action_icon,
					],
				],
			];

		}  // end foreach

		/** Settings: Languages setup */
		$items[ 'languages' ] = [
			'title'       => $string_polylang . _x( 'Setup languages', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => admin_url( 'admin.php?page=mlang' ),
			'icon'        => 'comments',
			'keywords'    => [ 'polylang', 'languages', 'setup', 'flags', 'country', 'countries' ],
			'description' => __( 'All languages your website appears in', 'connect-polylang-elementor' ),
		];

		/** Settings: String translations */
		$items[ 'string-translations' ] = [
			'title'       => $string_polylang . _x( 'String Translations', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => admin_url( 'admin.php?page=mlang_strings' ),
			'icon'        => 'exchange',
			'keywords'    => [ 'polylang', 'translations', 'translate', 'strings' ],
			'description' => __( 'From Widgets and other website parts', 'connect-polylang-elementor' ),
		];

		/** Settings: General, for plugin */
		$items[ 'settings' ] = [
			'title'       => $string_polylang . _x( 'Settings', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => admin_url( 'admin.php?page=mlang_settings' ),
			'icon'        => 'settings',
			'keywords'    => [ 'polylang', 'settings', 'options', 'modules' ],
			'description' => __( 'Plugin\'s settings, enable/ disable modules', 'connect-polylang-elementor' ),
		];

		/** External: documentation */
		$items[ 'documentation' ] = [
			'title'       => $string_polylang . _x( 'Plugin Documentation', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
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
			'title'       => $string_polylang . _x( 'Support Forum', 'Title in Elementor Finder', 'connect-polylang-elementor' ),
			'url'         => 'https://wordpress.org/support/plugin/polylang',
			'icon'        => 'comments',
			'keywords'    => [ 'support', 'forum', 'wordpress.org', 'help' ],
			'description' => __( 'Free support on WordPress.org', 'connect-polylang-elementor' ),
			'actions'     => [
				[
					'name' => $action_name,
					'url'  => 'https://wordpress.org/support/plugin/polylang',
					'icon' => $action_icon,
				],
			],
		];

		/** Return items array, filterable */
		return apply_filters(
			'cpel/filter/elementor_finder/items/polylang',
			$items
		);

	}  // end method

}  // end of class
