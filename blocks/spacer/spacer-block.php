<?php
/**
 * Spacer Blocks
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
 * Spacer Block
 */
class PadmaVisualElementsBlockSpacer extends \PadmaBlockAPI {

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
		$this->id            = 'visual-elements-spacer';
		$this->name          = __( 'Spacer', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockSpacerOptions';
		$this->description   = __( 'Will help you to create an empty space between elements on a page . ', 'padma-advanced' );
		$this->categories    = array( 'content' );
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
				'id'       => 'spacer',
				'name'     => __( 'spacer', 'padma-advanced' ),
				'selector' => 'div.su-spacer',
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

		$size = parent::get_setting( $block, 'size' );

		if ( ! $size || $size < 0 || $size > 800 ) {
			$size = 20;
		}

		echo do_shortcode( '[su_spacer size="' . $size . '"]' );

	}
}
