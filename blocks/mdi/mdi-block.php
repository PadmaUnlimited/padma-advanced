<?php

/**
 * MaterialDesign Icons Blocks
 *
 * @link       https://padmaunlimited.com
 * @since      1.0.0
 *
 * @package    Padma_Advanced
 * @subpackage Padma_Advanced/public
 * @author     Padma Team <support@padmaunlimited.com>
 */

namespace Padma_Advanced;

/**
 * FontAwesome Icon Block
 */
class PadmaMDIBlock extends \PadmaBlockAPI {

	/**
	 * Block id
	 *
	 * @var string $id
	 */
	public $id;

	/**
	 * Block Name
	 *
	 * @var string $name
	 */
	public $name;

	/**
	 * Options Class
	 *
	 * @var string $options_class
	 */
	public $options_class;

	/**
	 * Block Description
	 *
	 * @var string $description
	 */
	public $description;

	/**
	 * Block Categories
	 *
	 * @var array $categories
	 */
	public $categories;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->id            = 'mdi';
		$this->name          = __( 'MaterialDesign Icons', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaMDIBlockOptions';
		$this->description   = __( 'Add MaterialDesign Icons to the visual editor . ', 'padma-advanced' );
		$this->categories    = array( 'content' );
	}

	/**
	 * Init
	 */
	public function init() {
		//add_action( 'padma_visual_editor_scripts', array( __CLASS__, 'mdi_admin_scripts' ), 10 );
	}

	/**
	 * Setup Visual Editor elements.
	 */
	public function setup_elements() {
		$this->register_block_element(
			array(
				'id'       => 'content',
				'name'     => __( 'Block Content', 'padma-advanced' ),
				'selector' => '.block-content',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'link',
				'name'     => __( 'Link', 'padma-advanced' ),
				'selector' => 'a',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'Icon',
				'name'     => __( 'Icon', 'padma-advanced' ),
				'selector' => 'img',
			)
		);
	}

	/**
	 * Padma Content Method
	 *
	 * @param object $block Block.
	 * @return void
	 */
	public function content( $block ) {

		$icon        = parent::get_setting( $block, 'mdi-icon' );
		$width       = (int)parent::get_setting( $block, 'mdi-icon-width' );
		$height      = (int)parent::get_setting( $block, 'mdi-icon-height' );
		$before_icon = parent::get_setting( $block, 'before-icon' );
		$after_icon  = parent::get_setting( $block, 'after-icon' );
		$url         = parent::get_setting( $block, 'url' );

		if ( ! empty( $icon ) ) {

			if ( ! empty( $before_icon ) ) {
				echo '<div class="before-icon">';
				echo $before_icon;
				echo '</div>';
			}

			if ( empty( $width ) ) {
				$width = 24;
			}

			if ( empty( $height ) ) {
				$height = 24;
			}

			if ( ! empty( $url ) ) {
				echo sprintf('<a href="%s"><img src= "https://cdn.padmaunlimited.com/blocks/mdi/svg/%s.svg" style="width:' . $width . 'px;height:' . $height . 'px" /></a>', $url, $icon );
			} else {
				echo sprintf( '<img src= "https://cdn.padmaunlimited.com/blocks/mdi/svg/%s.svg" style="width:' . $width . 'px;height:' . $height . 'px" />', $icon );
			}

			if ( ! empty( $after_icon ) ) {
				echo '<div class="after-icon">';
				echo $after_icon;
				echo '</div>';
			}
		}

	}


	/**
	 * Register styles and scripts
	 *
	 * @param string  $block_id Block ID.
	 * @param boolean $block Is Block?.
	 * @return void
	 */
	public static function enqueue_action( $block_id, $block = false ) {
	}

	/**
	 * Admin styles
	 *
	 * @return void
	 */
	public static function mdi_admin_styles() {
	}

	/**
	 * Admin scripts
	 *
	 * @return void
	 */
	public static function mdi_admin_scripts() {

		$path = plugin_dir_url( __FILE__ );
		wp_register_script( 'padma_mdi_script', $path . 'mdi.js', array('jquery'), PADMA_ADVANCED_VERSION, true );
		wp_enqueue_script( 'padma_mdi_script' );

	}

}
