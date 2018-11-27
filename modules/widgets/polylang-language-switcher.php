<?php

// modules/widget/polylang-language-switcher

namespace DDW_Connect_Polylang_Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;


/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Polylang Switcher
 *
 * Elementor widget for Polylang Language Switcher.
 *
 * Note: Code based on Widget class of plugin "Language Switcher for Elementor",
 *       licensed under GPLv2 or later.
 * @author Solitweb
 * @link https://solitweb.be/
 *
 * @since 1.0.0
 */
class Polylang_Language_Switcher extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'polylang-language-switcher';

	}  // end method


	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return _x( 'Polylang Switcher', 'Elementor widget title', 'connect-polylang-elementor' );

	}  // end method


	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return 'fa fa-language';

	}  // end method


	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {

		return [ 'general', 'theme-elements' ];

	}  // end method


	/**
	 * Set keywords for widgets search.
	 *
	 * @since 1.0.0
	 */
	public function get_keywords() {

		return [ 'languages', 'switcher', 'polylang', 'multilingual', 'flags', 'countries', 'country', 'wpml' ];

	}  // end method


	/**
	 * Retrieve the list of styles the widget depended on.
	 *
	 * Used to set styles dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {

		return [ 'plsfe-frontend' ];

	}  // end method


	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {

		return [ ];

	}  // end method


	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the
	 *   widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 *
	 * @uses pll_the_languages()
	 */
	protected function _register_controls() {

		/** Content: Layout etc. */
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'connect-polylang-elementor' ),
			]
		);

		$this->add_responsive_control(
			'layout',
			[
				'label'        => __( 'Layout', 'connect-polylang-elementor' ),
				'type'         => Controls_Manager::SELECT,
				'default'      => 'horizontal',
				'options'      => [
					'horizontal' => __( 'Horizontal', 'connect-polylang-elementor' ),
					'vertical'   => __( 'Vertical', 'connect-polylang-elementor' ),
				],
				'label_block'  => true,
				'prefix_class' => 'plsfe%s-layout-',
			]
		);

		$this->add_responsive_control(
			'align_items',
			[
				'label'        => __( 'Align', 'connect-polylang-elementor' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left' => [
						'title' => __( 'Left', 'connect-polylang-elementor' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center'   => [
						'title' => __( 'Center', 'connect-polylang-elementor' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'    => [
						'title' => __( 'Right', 'connect-polylang-elementor' ),
						'icon'  => 'eicon-h-align-right',
					],
					'justify'  => [
						'title' => __( 'Stretch', 'connect-polylang-elementor' ),
						'icon'  => 'eicon-h-align-stretch',
					],
				],
				'label_block'  => true,
				'prefix_class' => 'plsfe%s-align-',
			]
		);

		$this->add_control(
			'hide_current',
			[
				'label'        => __( 'Hide the current language', 'connect-polylang-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => '',
				'separator'    => 'before',
			]
		);

		$this->add_control(
			'hide_missing',
			[
				'label'        => __( 'Hide languages with no translation', 'connect-polylang-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => '',
			]
		);

		$this->add_control(
			'show_country_flag',
			[
				'label'        => __( 'Show Country Flag', 'connect-polylang-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'show_language_name',
			[
				'label'        => __( 'Show Language Name', 'connect-polylang-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'show_language_code',
			[
				'label'        => __( 'Show Language Code', 'connect-polylang-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => '',
			]
		);

			/** Create language drop-down for the select control */
			$languages = pll_the_languages( array( 'raw' => 1 ) );
			$dropdown  = [];

			foreach ( $languages as $language ) {
				$dropdown[ $language[ 'slug' ] ] = $language[ 'name' ];
			}

			$first_key[ 'all' ] = __( 'All languages', 'connect-polylang-elementor' );

			$dropdown = array_merge( $first_key, $dropdown );

		$this->add_control(
			'plsfe_widget_display',
			[
				'label'   => __( 'Display widget for:', 'connect-polylang-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => $dropdown,
			]
		);

		$this->end_controls_section();


		/** Style: Main menu */
		$this->start_controls_section(
			'main_section',
			[
				'label' => __( 'Main Menu', 'connect-polylang-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'tabs_menu_item_style' );

		$this->start_controls_tab(
			'tab_menu_item_normal',
			[
				'label' => __( 'Normal', 'connect-polylang-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_menu_item',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .plsfe-menu .plsfe-item',
			]
		);

		$this->add_control(
			'color_menu_item',
			[
				'label'     => __( 'Text Color', 'connect-polylang-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .plsfe-menu .plsfe-item' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_menu_item_hover',
			[
				'label' => __( 'Hover', 'connect-polylang-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_menu_item_hover',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .plsfe-menu .plsfe-item:hover,
					{{WRAPPER}} .plsfe-menu .plsfe-item.plsfe-item__active,
					{{WRAPPER}} .plsfe-menu .plsfe-item.highlighted,
					{{WRAPPER}} .plsfe-menu .plsfe-item:focus',
			]
		);

		$this->add_control(
			'color_menu_item_hover',
			[
				'label'     => __( 'Text Color', 'connect-polylang-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .plsfe-menu .plsfe-item:hover,
					{{WRAPPER}} .plsfe-menu .plsfe-item.highlighted,
					{{WRAPPER}} .plsfe-menu .plsfe-item:focus' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_menu_item_active',
			[
				'label' => __( 'Active', 'connect-polylang-elementor' ),
			]
		);

		$this->add_control(
			'info_menu_item_active',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => __( 'This controls the item in the Switcher for the current active language', 'connect-polylang-elementor' ),
				'content_classes' => 'elementor-control-field-description cpel-info-menu-item-active',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_menu_item_active',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .plsfe-menu .plsfe-item.plsfe-item__active',
			]
		);

		$this->add_control(
			'color_menu_item_active',
			[
				'label'     => __( 'Text Color', 'connect-polylang-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .plsfe-menu .plsfe-item.plsfe-item__active' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'color_menu_item_active_hover',
			[
				'label'     => __( 'Text Hover Color', 'connect-polylang-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .plsfe-menu .plsfe-item.plsfe-item__active:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'padding_horizontal_menu_item',
			[
				'label'     => __( 'Horizontal Padding', 'connect-polylang-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 50,
					],
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .plsfe-switcher .plsfe-item' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'padding_vertical_menu_item',
			[
				'label'     => __( 'Vertical Padding', 'connect-polylang-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .plsfe-switcher .plsfe-item' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'menu_space_between',
			[
				'label'     => __( 'Space Between', 'connect-polylang-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}}.plsfe-layout-horizontal:not(.plsfe-layout-vertical) .plsfe-menu > li:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}}',
					'body.rtl {{WRAPPER}}.plsfe-layout-horizontal:not(.plsfe-layout-vertical) .plsfe-menu > li:not(:last-child)' => 'margin-left: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.plsfe-layout-vertical:not(.plsfe-layout-horizontal) .plsfe-menu > li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'menu_item_border',
				'selector'  => '{{WRAPPER}} .plsfe-menu > li',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();


		/** Style: Language flag */
		$this->start_controls_section(
			'country_flag_section',
			[
				'label'     => __( 'Country Flag', 'connect-polylang-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_country_flag' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'margin_country_flag',
			[
				'label'      => __( 'Margin', 'connect-polylang-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .plsfe-switcher .plsfe-country-flag' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		/** Style: Language name */
		$this->start_controls_section(
			'language_name_section',
			[
				'label'     => __( 'Language Name', 'connect-polylang-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_language_name' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'uppercase_language_name',
			[
				'label'        => __( 'Uppercase', 'connect-polylang-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => '',
			]
		);

		$this->add_control(
			'margin_language_name',
			[
				'label'      => __( 'Margin', 'connect-polylang-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .plsfe-switcher .plsfe-language-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		/** Style: Language code */
		$this->start_controls_section(
			'language_code_section',
			[
				'label'     => __( 'Language Code', 'connect-polylang-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_language_code' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'uppercase_language_code',
			[
				'label'        => __( 'Uppercase', 'connect-polylang-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'margin_language_code',
			[
				'label'      => __( 'Margin', 'connect-polylang-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .plsfe-switcher .plsfe-language-code' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'before_language_code',
			[
				'label'   => __( 'Text before', 'connect-polylang-elementor' ),
				'type'    => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'after_language_code',
			[
				'label'   => __( 'Text after', 'connect-polylang-elementor' ),
				'type'    => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();


		/** Help information - user guidance */
		$this->start_controls_section(
			'section_helpful_info',
			[
				'label' => __( 'Helpful Information', 'connect-polylang-elementor' ),
			]
		);

		$output = '<div style="line-height: 1.2;">';
		$output .= sprintf(
			'<p style="margin-bottom: 15px;"><strong>%1$s:</strong><br />%2$s</p>',
			__( 'Country Flags', 'connect-polylang-elementor' ),
			sprintf(
				/* translators: %1$s - <code>16px</code> (width 16px) / %2$s - <code>11px</code> (height 11px) */
				__( 'Country flags are by default used from Polylang plugin and have the static size of %1$s wide and %2$s high.', 'connect-polylang-elementor' ),
				'<code>16px</code>',
				'<code>11px</code>'
			)
		);
		$output .= sprintf(
			'<p><strong>%1$s &rarr; %2$s &rarr; %3$s:</strong><br />%4$s</p>',
			__( 'Style', 'connect-polylang-elementor' ),
			__( 'Main Menu', 'connect-polylang-elementor' ),
			__( 'Tab: "Active"', 'connect-polylang-elementor' ),
			__( 'This marks the language of currently viewed content - on the frontend. In Elementor Editor Panel this could be different.', 'connect-polylang-elementor' )
		);
		$output .= '</div>';

		$this->add_control(
			'plsfe_help_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => $output,
				'content_classes' => 'cpel-help-info',
			]
		);

		$this->end_controls_section();

	}  // end method


	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 *
	 * @uses pll_the_languages() Holds Polylang languages for switcher.
	 */
	protected function render() {

		/** Get the widget settings */
		$settings = $this->get_active_settings();

		/** Add render attributes for Elementor */
		$this->add_render_attribute( 'main-menu', 'class', [
			'plsfe-switcher',
		] );

		/** Get the available languages for a switcher */
		$languages = pll_the_languages( array( 'raw' => 1 ) );

		/** If there are language - render output */
		if ( ! empty( $languages ) ) {

			echo '<nav ' . $this->get_render_attribute_string( 'main-menu' ) . '><ul class="plsfe-menu">';

			/** Loop through all languages */
			foreach ( $languages as $language ) {

				/** Optional: Hide the current language */
				if ( 'yes' === $settings[ 'hide_current' ] && $language[ 'current_lang' ] ) {
					continue;
				}

				/** Optional: Hide languages that have no translations available */
				if ( 'yes' === $settings[ 'hide_missing' ] && $language[ 'no_translation' ] ) {
					continue;
				}

				/** Language code: uppercase/ lowercase logic */
				$language_code = ( 'yes' === $settings[ 'uppercase_language_code' ] ) ? strtoupper( $language[ 'slug' ] ) : strtolower( $language[ 'slug' ] );

				/** Language name: uppercase/ lowercase logic */
				$language_name = ( 'yes' === $settings[ 'uppercase_language_name' ] ) ? strtoupper( $language[ 'name' ] ) : $language[ 'name' ];

				/** Build the language switcher menu output */
				echo '<li class="plsfe-menu-item">';

					echo ( $language[ 'current_lang' ] ) ? '<a href="' . $language[ 'url' ] . '" class="plsfe-item plsfe-item__active">' : '<a href="' . $language[ 'url' ] . '" class="plsfe-item">';

						echo $settings[ 'show_country_flag' ] ? '<span class="plsfe-country-flag"><img src="' . $language[ 'flag' ] . '" alt="' . $language_code . '" width="16" height="11" /></span>' : '';
						
						echo $settings[ 'show_language_name' ] ? '<span class="plsfe-language-name">' . $language_name . '</span>' : '';

						echo $settings[ 'before_language_code' ] ?: '';
						echo $settings[ 'show_language_code' ] ? '<span class="plsfe-language-code">' . $language_code . '</span>' : '';
						echo $settings[ 'after_language_code' ] ?: '';

					echo '</a>';

				echo '</li>';

			}  // end if

			echo '</ul></nav>';

		}  // end if

	}  // end method


	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live
	 *   preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() { }  // end method

}  // end of class
