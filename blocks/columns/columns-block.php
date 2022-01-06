<?php
/**
 * Accordion Blocks
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
 * Columns Block
 */
class PadmaVisualElementsBlockColumns extends \PadmaBlockAPI {

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

		$this->id            = 'visual-elements-columns';
		$this->name          = __( 'Columns', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockColumnsOptions';
		$this->description   = __( 'Will help you to divide page content into columns . ', 'padma-advanced' );
		$this->categories    = array( 'box' );

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
				'id'       => 'columns',
				'name'     => __( 'Columns', 'padma-advanced' ),
				'selector' => 'span.su-columns',
			)
		);
	}

	/**
	 * Dynamic_css function
	 *
	 * @param string  $block_id Block ID.
	 * @param boolean $block Block Object.
	 * @return string
	 */
	public static function dynamic_css( $block_id, $block = false ) {

		if ( ! $block ) {
			$block = \PadmaBlocksData::get_block( $block_id );
		}

		return '';
	}

	/**
	 * Padma Content Method
	 *
	 * @param object $block Block.
	 * @return void
	 */
	public function content( $block ) {

		$columns   = parent::get_setting( $block, 'columns', array() );
		$shortcode = '[su_row class=""]';

		foreach ( $columns as $column => $params ) {

			$size    = isset( $params['size'] ) ? $params['size'] : '';
			$center  = isset( $params['center'] ) ? $params['center'] : '';
			$class   = isset( $params['class'] ) ? $params['class'] : '';
			$content = isset( $params['content'] ) ? $params['content'] : '';

			$shortcode .= '[su_column ';
			$shortcode .= 'size="' . $size . '" ';
			$shortcode .= 'center="' . $center . '" ';
			$shortcode .= 'class="' . $class . '" ';
			$shortcode .= ']';
			$shortcode .= $content;
			$shortcode .= '[/su_column]';

		}

		$shortcode .= '[/su_row]';

		echo do_shortcode( $shortcode );

	}

	/**
	 * Register styles and scripts
	 *
	 * @param string  $block_id Block ID.
	 * @param boolean $block Is Block?.
	 * @return void
	 */
	public static function enqueue_action( $block_id, $block = false ) {}

}
