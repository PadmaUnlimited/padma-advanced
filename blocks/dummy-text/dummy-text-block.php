<?php

/**
 * Dummy Text Blocks
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
 * Dummy Text Block
 */
class PadmaVisualElementsBlockDummyText extends \PadmaBlockAPI {

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
		$this->id            = 'visual-elements-dummy-text';
		$this->name          = __( 'Dummy Text', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockDummyTextOptions';
		$this->description   = __( 'This shortcode allows you to display “lorem ipsum” text. You can choose how much paragraphs or words will be generated . ', 'padma-advanced' );
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
				'id'       => 'dummy-text',
				'name'     => 'dummy-text',
				'selector' => '.su-dummy-text',
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

		$what   = parent::get_setting( $block, 'what' );
		$amount = parent::get_setting( $block, 'amount' );
		$cache  = parent::get_setting( $block, 'cache' );

		if ( is_null( $what ) ) {
			$what = 'paras';
		}

		if ( is_null( $amount ) ) {
			$amount = 1;
		}

		if ( $amount < 1 ) {
			$amount = 1;
		}

		if ( $amount > 100 ) {
			$amount = 100;
		}

		if ( is_null( $cache ) ) {
			$cache = 'yes';
		}

		$html = do_shortcode( '[su_dummy_text what="' . $what . '" amount="' . $amount . '" cache="' . $cache . '" class=""]' );

		// remove inline CSS for color.
		$html = preg_replace( '(style=("|\Z)(.*?)("|\Z))', '', $html );

		echo $html;

	}

}
