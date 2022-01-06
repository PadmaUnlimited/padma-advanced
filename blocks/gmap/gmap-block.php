<?php

/**
 * Google Map Blocks
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
 * Google Map Block
 */
class PadmaVisualElementsBlockGmap extends \PadmaBlockAPI {

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
		$this->id            = 'visual-elements-gmap';
		$this->name          = __( 'Google Map', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockGmapOptions';
		$this->description   = __( 'Will help you to display Google maps, easily . ', 'padma-advanced' );
		$this->categories    = array( 'media' );
	}

	/**
	 * Init
	 */
	public function init() {

		if ( ! class_exists( 'Shortcodes_Ultimate' ) ) {
			return false;
		}

	}

	/**
	 * Setup Visual Editor elements.
	 */
	public function setup_elements() {
		$this->register_block_element(
			array(
				'id'       => 'gmap',
				'name'     => 'Gmap',
				'selector' => 'div.su-gmap',
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

		$address    = parent::get_setting( $block, 'address' );
		$responsive = parent::get_setting( $block, 'responsive' );
		$zoom       = parent::get_setting( $block, 'zoom' );
		$width      = parent::get_setting( $block, 'width' );
		$height     = parent::get_setting( $block, 'height' );

		if ( ! $address ) {
			$address = 'San José, Costa Rica';
		}

		if ( ! $responsive ) {
			$responsive = 'yes';
		}

		if ( $zoom < 0 ) {
			$zoom = 0;
		}

		if ( $zoom > 21 ) {
			$zoom = 21;
		}

		if ( $width < 200 ) {
			$width = 200;
		}

		if ( $width > 1600 ) {
			$width = 1600;
		}

		if ( $height < 200 ) {
			$height = 200;
		}

		if ( $height > 1600 ) {
			$height = 1600;
		}

		echo do_shortcode( '[su_gmap address="' . $address . '" responsive="' . $responsive . '" zoom="' . $zoom . '" width="' . $width . '" height="' . $height . '" ]' );

	}

}
