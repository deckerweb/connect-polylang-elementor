<?php

// modules/dynamic-tags/polylang-current-language-url

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


class DDW_Polylang_Current_Language_URL_Elementor_Dynamic_Tag extends \Elementor\Core\DynamicTags\Data_Tag {

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

		return 'current-language-url';

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

		return _x( 'Current Language URL', 'Elementor Dynamic Tag title', 'connect-polylang-elementor' );

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

		return [ \Elementor\Modules\DynamicTags\Module::URL_CATEGORY ];

	}  // end method


	/**
	* Render
	*
	* Prints out the value of the Dynamic tag
	*
	* @since 1.0.0
	* @access public
	*
	* @uses pll_the_languages()
	*
	* @return void
	*/
	public function get_value( array $options = [] ) {
	
		/** Get all Polylang languages */
		$languages = pll_the_languages( array( 'raw' => 1 ) );

		if ( ! empty( $languages ) ) {

			foreach ( $languages as $language ) {

				/** If current language found, stop the loop */
				if ( $language[ 'current_lang' ] ) {
					break;
				}

			}  // end foreach

		}  // end if

		return esc_url_raw( $language[ 'url' ] );

	}  // end method

}  // end of class
