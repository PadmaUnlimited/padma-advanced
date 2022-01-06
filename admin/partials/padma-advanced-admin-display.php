<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.padmaunlimited.com
 * @since      1.0.0
 *
 * @package    Padma Advanced
 * @subpackage Padma Advanced/admin/partials
 */

namespace Padma_Advanced;

$load = true;

/**
 * Detect required Padma or plugins.
 */
if ( ! class_exists( 'Padma' ) ) {
	require_once PADMA_ADVANCED_DIR . 'admin/partials/padma-advanced-require-padma.php';
}

if ( ! class_exists( 'Shortcodes_Ultimate' ) && 'yes' === get_option( 'padma-advanced-settings-enable-shortcodes-ultimate' ) ) {
	require_once PADMA_ADVANCED_DIR . 'admin/partials/padma-advanced-require-plugin-shortcodes-ultimate.php';
}

/**
 * Detect active Padma plugins.
 */
if ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'padma-visual-elements/padma-visual-elements.php' ) ) {
	require_once PADMA_ADVANCED_DIR . 'admin/partials/padma-advanced-require-plugin-visual-elements.php';
}



if ( $load ) {

	$settings = new Padma_Advanced_Admin( __( 'Settings', 'padma-advanced' ) );

	if ( padma_advanced_fs()->is__premium_only() ) {
		if ( class_exists( 'Padma_Advanced\Padma_Advanced_Admin_Pro' ) ) {
			$settings = new Padma_Advanced_Admin_Pro();
		}
	}

	$settings->set_settings();

	/**
	 * Process Form
	 */
	$settings->process_settings();


	/**
	 * Display settings form
	 */
	$settings->display();

}
