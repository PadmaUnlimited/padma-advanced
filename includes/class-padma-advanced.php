<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.padmaunlimited.com
 * @since      1.0.0
 *
 * @package    Padma Advanced
 * @subpackage Padma Advanced/includes
 */

namespace Padma_Advanced;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Padma Advanced
 * @subpackage Padma Advanced/includes
 * @author     Padma Team <support@padmaunlimited.com>
 */
class Padma_Advanced {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Padma_Advanced_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;


	/**
	 * Padma Blocks
	 *
	 * @var array $blocks Array of blocks.
	 */
	protected $blocks;


	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		if ( defined( 'PADMA_ADVANCED_VERSION' ) ) {
			$this->version = PADMA_ADVANCED_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'padma-advanced';

		/**
		 * Define plugin name as constant.
		 */
		define( 'PADMA_ADVANCED_SLUG', $this->plugin_name );

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Padma_Advanced_Loader. Orchestrates the hooks of the plugin.
	 * - Padma_Advanced_i18n. Defines internationalization functionality.
	 * - Padma_Advanced_Admin. Defines all hooks for the admin area.
	 * - Padma_Advanced_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		if ( ! class_exists( 'Padma_Advanced_Loader' ) ) {
			require_once PADMA_ADVANCED_DIR . 'includes/class-padma-advanced-loader.php';
		}		

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		if ( ! class_exists( 'Padma_Advanced_i18n' ) ) {
			require_once PADMA_ADVANCED_DIR . 'includes/class-padma-advanced-i18n.php';
		}

		/**
		 * The class responsible for generate settings controls ans inputs
		 */
		if ( ! class_exists( 'Padma_Advanced_VE' ) ) {
			require_once PADMA_ADVANCED_DIR . 'includes/class-padma-visual-editor.php';
			add_action( 'init', function(){
				$Padma_Advanced_VE = new Padma_Advanced_VE();
				$Padma_Advanced_VE->run_ve_hooks();
			});
		}

		/**
		 * The class responsible for generate settings controls ans inputs
		 */
		if ( ! class_exists( 'Padma_Settings' ) ) {
			require_once PADMA_ADVANCED_DIR . 'includes/class-padma-settings.php';
		}

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		if ( ! class_exists('Padma_Advanced\Padma_Advanced_Admin') ) {

			require_once PADMA_ADVANCED_DIR . 'admin/class-padma-advanced-admin.php';
			if ( padma_advanced_fs()->is__premium_only() ) {
				if ( ! class_exists( 'Padma_Advanced\Padma_Advanced_Admin_Pro' ) ) {
					require_once PADMA_ADVANCED_DIR . 'admin/class-padma-advanced-admin-pro.php';
				}
			}
		}

		/**
		 * Load Padma Blocks
		 */
		if ( ! class_exists( 'Padma_Advanced\Padma_Advanced_Blocks' ) ) {

			require_once PADMA_ADVANCED_DIR . 'includes/class-padma-advanced-blocks.php';

			if ( padma_advanced_fs()->is__premium_only() ) {
				if ( ! class_exists( 'Padma_Advanced\Padma_Advanced_Blocks_Pro' ) ) {
					require_once PADMA_ADVANCED_DIR . 'includes/class-padma-advanced-blocks-pro.php';
				}
			}
		}

		/**
		 * Dummy Options Class
		 *
		 * @return void
		 */
		if ( ! padma_advanced_fs()->is__premium_only() ) {
			if ( ! class_exists( 'Padma_Advanced\PadmaDummyBlockOptions' ) ) {
				include_once PADMA_ADVANCED_DIR . 'includes/class-dummy-block-options.php';
			}
		}

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once PADMA_ADVANCED_DIR . 'public/class-padma-advanced-public.php';

		$this->loader = new Padma_Advanced_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Padma_Advanced_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Padma_Advanced_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Padma_Advanced_Admin();
		if ( padma_advanced_fs()->is__premium_only() ) {
			if( class_exists('Padma_Advanced\Padma_Advanced_Admin_Pro') ){
				$plugin_admin = new Padma_Advanced_Admin_Pro();
			}			
		}

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'menu_options' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Padma_Advanced_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		$this->loader->run();

		$padma_blocks = new Padma_Advanced_Blocks();

		if ( padma_advanced_fs()->is__premium_only() ) {
			$padma_blocks = new Padma_Advanced_Blocks_Pro();
		}

		$padma_blocks->register();
	}


	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Padma_Advanced_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
