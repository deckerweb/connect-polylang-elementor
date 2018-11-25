<?php

// modules/dynamic-tags/polylang-current-language-flag

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


class DDW_Polylang_Current_Language_Flag_Elementor_Dynamic_Tag extends \Elementor\Core\DynamicTags\Data_Tag {

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

		return 'current-language-flag';

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

		return _x( 'Current Language Flag', 'Elementor Dynamic Tag title', 'connect-polylang-elementor' );

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

		return [ \Elementor\Modules\DynamicTags\Module::IMAGE_CATEGORY ];

	}  // end method


	/**
	* Render
	*
	* Prints out the value of the Dynamic tag
	*
	* @since 1.0.0
	* @access public
	*
	* @uses pll_current_language()
	*
	* @return void
	*/
	public function get_value( array $options = [] ) {

		$image_data = [
			'id'  => (int) pll_current_language( $field = 'term_id' ),
			'url' => pll_current_language( $field = 'flag_url' ),
		];

		return $image_data;

	}  // end method

}  // end of class
