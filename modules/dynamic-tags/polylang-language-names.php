<?php

// modules/dynamic-tags/polylang-language-names

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


class DDW_Polylang_Language_Names_Elementor_Dynamic_Tag extends \Elementor\Core\DynamicTags\Tag {

	/**
	* Get Name
	*
	* Returns the Name of the tag
	*
	* @since 1.0.0
	* @access public
	*
	* @return string
	*/
	public function get_name() {

		return 'language-names';

	}  // end method


	/**
	* Get Title
	*
	* Returns the title of the Tag
	*
	* @since 1.0.0
	* @access public
	*
	* @return string
	*/
	public function get_title() {

		return _x( 'Language Names', 'Elementor Dynamic Tag title', 'connect-polylang-elementor' );

	}  // end method


	/**
	* Get Group
	*
	* Returns the Group of the tag
	*
	* @since 1.0.0
	* @access public
	*
	* @return string
	*/
	public function get_group() {

		return 'polylang-languages';

	}  // end method


	/**
	* Get Categories
	*
	* Returns an array of tag categories
	*
	* @since 1.0.0
	* @access public
	*
	* @return array
	*/
	public function get_categories() {

		return [ \Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY ];

	}  // end method


	/**
	* Register Controls
	*
	* Registers the Dynamic tag controls
	*
	* @since 1.0.0
	* @access protected
	*
	* @uses pll_languages_list()
	*
	* @return void
	*/
	protected function _register_controls() {

		$languages = pll_languages_list( array( 'fields' => FALSE ) );

		$lang_names = [];

		foreach ( $languages as $language ) {
			$lang_names[ $language->name ] = $language->name;
		}

		$this->add_control(
			'polylang_language_name',
			[
				'label'   => __( 'Language Name', 'connect-polylang-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $lang_names,
			]
		);

	}  // end method


	/**
	* Render
	*
	* Prints out the value of the Dynamic tag
	*
	* @since 1.0.0
	* @access public
	*
	* @return void
	*/
	public function render() {

		$lang_name = $this->get_settings( 'polylang_language_name' );

        if ( ! $lang_name ) {
			return;
		}
	
		echo esc_attr( $lang_name );

	}  // end method

}  // end of class
