<?php
/**
 * Runs VE compatibility.
  *
 * @since      1.0.0
 * @package    Padma Advanced
 * @subpackage Padma Advanced/includes
 * @author     Padma Team <support@padmaunlimited.com>
 */

namespace Padma_Advanced;

class Padma_Advanced_VE {


	/**
	 * Constructor
	 */
	public function __construct() {
		return;
		/*
		add_action(
			'padma_visual_editor_styles',
			function() {

				$path = plugin_dir_url( __FILE__ );
				$path = str_replace( 'includes/', '', $path );

				wp_register_style( 'padma-advanced-ve-prism', $path . 'admin/css/prism.css', false, PADMA_ADVANCED_VERSION, 'all' );
				wp_enqueue_style( 'padma-advanced-ve-prism' );

			}
		);

		add_action(
			'padma_visual_editor_scripts',
			function() {

				$path = plugin_dir_url( __FILE__ );
				$path = str_replace( 'includes/', '', $path );

				wp_register_script( 'padma-advanced-ve-prism', $path . 'admin/js/prism.js', array(), PADMA_ADVANCED_VERSION, true );
				wp_enqueue_script( 'padma-advanced-ve-prism' );

				wp_register_script( 'padma-advanced-ve-scripts', $path . 'admin/js/padma-advanced-visual-editor.js', array( 'jquery' ), PADMA_ADVANCED_VERSION, true );
				wp_enqueue_script( 'padma-advanced-ve-scripts' );

			},
			20,
			0
		);
		*/
	}


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function run_ve_hooks() {
		return;
		add_filter( 'padma_developer_tab_hook_example', function( $default, $hook_name, $hook_params ) {

			$count_params = count( $hook_params['params'] );
			$params       = implode( ', ', $hook_params['params'] );
			$your_code    = '<br> /* Your awesome code goes here */ <br>';
			$code         = sprintf( 'add_action( \'%1$s\', function( %2$s ) {%3$s}, 10, %4$s );', $hook_name, $params, $your_code, $count_params );
			return $code;
		}, 10, 3 );
	}
}
