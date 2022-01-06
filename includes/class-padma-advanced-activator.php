<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Padma Advanced 
 * @author     Padma Unlimited <support@padmaunlimited.com>
 */

namespace Padma_Advanced;

/**
 * Padma_Advanced_Activator Class Doc Comment
 *
 * @category Class
 * @package  Padma Advanced
 * @author   Padma Dev Team
 */
class Padma_Advanced_Activator {

	/**
	 * Plugin activation.
	 * @since    1.0.0
	 */
	public static function activate() {
		update_option( 'padma-advanced-settings-enable-shortcodes-ultimate', 'yes', true );
	}

}
