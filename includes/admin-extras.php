<?php

// includes/admin-extras

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Add custom settings link to Plugins page.
 *
 * @since  1.0.0
 *
 * @param  array $cpel_links (Default) Array of plugin action links.
 * @return strings $cpel_links Settings & Menu Admin links.
 */
function ddw_cpel_custom_settings_links( $cpel_links ) {

	$link_polylang  = '';
	$templates_link = '';

	/** Add settings link only if user has permission */
	if ( current_user_can( 'edit_theme_options' ) ) {

		/** Polylang settings link */
		if ( ddw_cpel_is_polylang_active() ) {

			$link_polylang = sprintf(
				'<a class="dashicons-before dashicons-translation" href="%1$s" title="%2$s">%3$s</a>',
				esc_url( admin_url( 'admin.php?page=mlang' ) ),
				/* translators: Title attribute for Polylang settings link */
				esc_html__( 'Polylang Languages Setup', 'connect-polylang-elementor' ),
				esc_attr_x( 'Languages', 'Link title attribute for Polylang settings', 'connect-polylang-elementor' )
			);
			
		}  // end if

		/** Elementor My Templates link */
		if ( ddw_cpel_is_elementor_active() ) {

			$link_elementor = sprintf(
				'<a class="dashicons-before dashicons-admin-page" href="%1$s" title="%2$s">%3$s</a>',
				esc_url( admin_url( 'edit.php?post_type=elementor_library' ) ),
				/* translators: Title attribute for Elementor My Templates link */
				esc_html__( 'Elementor My Templates', 'connect-polylang-elementor' ),
				esc_attr_x( 'Templates', 'Link title attribute for Elementor My Templates', 'connect-polylang-elementor' )
			);

		}  // end if

	}  // end if

	/** Set the order of the links */
	if ( ! empty( $link_polylang ) && ! empty( $link_elementor ) ) {
		array_unshift( $cpel_links, $link_polylang, $link_elementor );
	}

	/** Display plugin settings links */
	return apply_filters(
		'cpel/filter/plugins_page/settings_links',
		$cpel_links,
		$link_polylang,		// additional param
		$link_elementor		// additional param
	);

}  // end function


add_filter( 'plugin_row_meta', 'ddw_cpel_plugin_links', 10, 2 );
/**
 * Add various support links to Plugins page.
 *
 * @since  1.0.0
 *
 * @uses   ddw_cpel_get_info_link()
 *
 * @param  array  $cpel_links (Default) Array of plugin meta links
 * @param  string $cpel_file  Path of base plugin file
 * @return array $cpel_links Array of plugin link strings to build HTML markup.
 */
function ddw_cpel_plugin_links( $cpel_links, $cpel_file ) {

	/** Capability check */
	if ( ! current_user_can( 'install_plugins' ) ) {
		return $cpel_links;
	}

	/** List additional links only for this plugin */
	if ( $cpel_file === CPEL_PLUGIN_BASEDIR . 'connect-polylang-elementor.php' ) {

		?>
			<style type="text/css">
				tr[data-plugin="<?php echo $cpel_file; ?>"] .plugin-version-author-uri a.dashicons-before:before {
					font-size: 17px;
					margin-right: 2px;
					opacity: .85;
					vertical-align: sub;
				}
			</style>
		<?php

		/* translators: Plugins page listing */
		$cpel_links[] = ddw_cpel_get_info_link( 'url_wporg_forum', esc_html_x( 'Support', 'Plugins page listing', 'connect-polylang-elementor' ), 'dashicons-before dashicons-sos' );

		/* translators: Plugins page listing */
		$cpel_links[] = ddw_cpel_get_info_link( 'url_fb_group', esc_html_x( 'Facebook Group', 'Plugins page listing', 'connect-polylang-elementor' ), 'dashicons-before dashicons-facebook' );

		/* translators: Plugins page listing */
		$cpel_links[] = ddw_cpel_get_info_link( 'url_translate', esc_html_x( 'Translations', 'Plugins page listing', 'connect-polylang-elementor' ), 'dashicons-before dashicons-translation' );

		/* translators: Plugins page listing */
		$cpel_links[] = ddw_cpel_get_info_link( 'url_donate', esc_html_x( 'Donate', 'Plugins page listing', 'connect-polylang-elementor' ), 'button-primary dashicons-before dashicons-thumbs-up' );

	}  // end if plugin links

	/** Output the links */
	return apply_filters(
		'cpel/filter/plugins_page/more_links',
		$cpel_links
	);

}  // end function


/**
 * Inline CSS fix for Plugins page update messages.
 *
 * @since 1.0.0
 *
 * @see   ddw_cpel_plugin_update_message()
 * @see   ddw_cpel_multisite_subsite_plugin_update_message()
 */
function ddw_cpel_plugin_update_message_style_tweak() {

	?>
		<style type="text/css">
			.cpel-update-message p:before,
			.update-message.notice p:empty {
				display: none !important;
			}
		</style>
	<?php

}  // end function


add_action( 'in_plugin_update_message-' . CPEL_PLUGIN_BASEDIR . 'connect-polylang-elementor.php', 'ddw_cpel_plugin_update_message', 10, 2 );
/**
 * On Plugins page add visible upgrade/update notice in the overview table.
 *   Note: This action fires for regular single site installs, and for Multisite
 *         installs where the plugin is activated Network-wide.
 *
 * @since  1.0.0
 *
 * @param  object $data
 * @param  object $response
 * @return string Echoed string and markup for the plugin's upgrade/update
 *                notice.
 */
function ddw_cpel_plugin_update_message( $data, $response ) {

	if ( isset( $data[ 'upgrade_notice' ] ) ) {

		ddw_cpel_plugin_update_message_style_tweak();

		printf(
			'<div class="update-message cpel-update-message">%s</div>',
			wpautop( $data[ 'upgrade_notice' ] )
		);

	}  // end if

}  // end function


add_action( 'after_plugin_row_wp-' . CPEL_PLUGIN_BASEDIR . 'connect-polylang-elementor.php', 'ddw_cpel_multisite_subsite_plugin_update_message', 10, 2 );
/**
 * On Plugins page add visible upgrade/update notice in the overview table.
 *   Note: This action fires for Multisite installs where the plugin is
 *         activated on a per site basis.
 *
 * @since  1.0.0
 *
 * @param  string $file
 * @param  object $plugin
 * @return string Echoed string and markup for the plugin's upgrade/update
 *                notice.
 */
function ddw_cpel_multisite_subsite_plugin_update_message( $file, $plugin ) {

	if ( is_multisite() && version_compare( $plugin[ 'Version' ], $plugin[ 'new_version' ], '<' ) ) {

		$wp_list_table = _get_list_table( 'WP_Plugins_List_Table' );

		ddw_cpel_plugin_update_message_style_tweak();

		printf(
			'<tr class="plugin-update-tr"><td colspan="%s" class="plugin-update update-message notice inline notice-warning notice-alt"><div class="update-message cpel-update-message"><h4 style="margin: 0; font-size: 14px;">%s</h4>%s</div></td></tr>',
			$wp_list_table->get_column_count(),
			$plugin[ 'Name' ],
			wpautop( $plugin[ 'upgrade_notice' ] )
		);

	}  // end if

}  // end function
