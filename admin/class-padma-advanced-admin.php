<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.padmaunlimited.com
 * @since      1.0.0
 *
 * @package    Padma Advanced
 * @subpackage Padma Advanced/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Padma Advanced
 * @subpackage Padma Advanced/admin
 * @author     Padma Team <support@padmaunlimited.com>
 */

namespace Padma_Advanced;

/**
 * Padma_Advanced_Admin Class Doc Comment
 *
 * @category Class
 * @package  Padma Advanced
 * @author   Padma Dev Team
 */
class Padma_Advanced_Admin extends Padma_Settings {


	/**
	 * Categories
	 *
	 * @var array $categories
	 */
	private $categories;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->categories = array();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Padma_Advanced_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Padma_Advanced_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( PADMA_ADVANCED_SLUG, plugin_dir_url( __FILE__ ) . 'css/padma-advanced-admin.css', array(), PADMA_ADVANCED_VERSION, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Padma_Advanced_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Padma_Advanced_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( PADMA_ADVANCED_SLUG, plugin_dir_url( __FILE__ ) . 'js/padma-advanced-admin.js', array( 'jquery' ), PADMA_ADVANCED_VERSION, false );
	}

	/**
	 * Add menu pages
	 */
	public function menu_options() {

		add_submenu_page(
			'options-general.php',
			'Padma Advanced',
			'Padma Advanced',
			'manage_options',
			'padma-advanced',
			[ $this, 'menu_page' ]
		);
	}

	/**
	 *
	 * Show options page.
	 */
	public function menu_page() {

		require_once PADMA_ADVANCED_DIR . '/admin/partials/padma-advanced-admin-display.php';
	}


	/**
	 * Set Settings
	 */
	public function set_settings() {

		/**
		 * Help links
		 * box-id => link
		 */
		$this->help_links = array(
			'' => '#',
		);

		/**
		 * Create tabs
		 */
		$this->tabs = array(
			'blocks'      => __( 'Available Blocks', 'padma-advanced' ),
			'templates'   => __( 'Templates', 'padma-advanced' ),
			'settings'    => __( 'Settings', 'padma-advanced' ),
			'information' => __( 'Information', 'padma-advanced' ),
		);

		/**
		 * Blocks list
		 */
		$this->settings['list'] = array(
			'title'    => __( 'Blocks', 'padma-advanced' ),
			'callback' => array( $this, 'blocks' ),
			'box-id'   => 'list',
			'tab-id'   => 'blocks',
		);

		/**
		 * Settings
		 */
		$this->settings['settings'] = array(
			'title'       => __( 'Settings', 'padma-advanced' ),
			'description' => __( 'Settings', 'padma-advanced' ),
			'inputs'      => array(
				array(
					'type'    => 'select',
					'label'   => __( 'Enable', 'padma-advanced' ),
					'name'    => 'enable-shortcodes-ultimate',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
					'value'   => 'yes',
					'tooltip' => __( 'Enable Shortcodes Ultimate compatibility', 'mojito-shipping' ),
				),
			),
			'box-id'      => 'settings',
			'tab-id'      => 'settings',
		);

	}

	/**
	 * Blocks method
	 *
	 * @return string $html
	 */
	public function blocks() {

		if ( ! class_exists( 'PadmaBlockAPI' ) ) {
			return;
		}

		$padma_blocks = new Padma_Advanced_Blocks();
		$all_blocks   = $padma_blocks->get_blocks();
		$html         = '';

		/**
		 * Blocks
		 */
		foreach ( $all_blocks as $block_name => $block_class ) {

			$block_file    = PADMA_ADVANCED_DIR . 'blocks/' . $block_name . '/' . $block_name . '-block.php';
			$block_dir_url = plugin_dir_url( __DIR__ );

			if ( ! file_exists( $block_file ) ) {
				continue;
			}

			require_once $block_file;

			$block_class_complete = __NAMESPACE__ . '\\' . $block_class;

			if ( ! class_exists( $block_class_complete ) ) {
				continue;
			}

			$block = new $block_class_complete();

			$icon = $block_dir_url . 'blocks/' . $block_name . '/icon.svg';

			$data = array(
				'name'        => $block->name,
				'description' => $block->description,
				'categories'  => $block->categories,
			);

			$html  .= $this->block_box( $data, $icon );
		}

		/**
		 * Categories menu
		 */
		$html = $this->categories_menu() . $html;

		return $html;
	}


	/**
	 * HTML block box
	 *
	 * @author Padma Dev Team
	 * @since  1.0.0
	 *
	 * @param array  $block_data Block Data.
	 * @param string $icon Block Icon.
	 * @param bool   $pro Block Free or Pro.
	 */
	private function block_box( $block_data, $icon ) {

		if ( is_array( $block_data['categories'] ) ) {

			$this->categories = array_merge( $this->categories, $block_data['categories'] );

			$filters = ' ';
			foreach ( $block_data['categories'] as $key => $value ) {
				$filters .= 'filter-' . $value;
				$filters .= ' ';
			}
		} else {
			$filters = '';
		}

		$html  = '';
		$html .= '<a class="padma-advanced-list-item ' . $filters . '" >';
		$html .= '<span class="padma-advanced-list-item-image">';
		$html .= '<img src="' . $icon . '" alt="" width="120" height="120">';
		$html .= '</span>';
		$html .= '<span class="padma-advanced-list-item-title">' . $block_data['name'] . '</span>';
		$html .= '<span class="padma-advanced-list-item-description">' . $block_data['description'] . '</span>';
		$html .= '</a>';
		return $html;
	}


	/**
	 * HTML for categories menu
	 */
	private function categories_menu() {

		$html       = '<ul class="block-type-selector-filter-categories">';
		$html      .= '<li><a class="active" data-filter="all">All</a></li>';
		$categories = array_unique( $this->categories );

		foreach ( $categories as $key => $categorie ) {

			$label = str_replace( '-', ' ', $categorie );
			$label = strtoupper( $label );
			$html .= '<li><a class="" data-filter="' . $categorie . '">' . $label . '</a></li>';
		}

		$html .= '</ul>';

		return $html;
	}
}
