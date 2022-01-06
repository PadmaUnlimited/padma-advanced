<?php

/**
 * Label Blocks
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
 * Label Block
 */
class PadmaVisualElementsBlockLabel extends \PadmaBlockAPI {

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
	 * Inline editable fields
	 *
	 * @var array $inline_editable;
	 */
	public $inline_editable;

	/**
	 * Inline editable fields equivalences
	 *
	 * @var array $inline_editable_equivalences
	 */
	public $inline_editable_equivalences;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->id            = 'visual-elements-label';
		$this->name          = __( 'Label', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockLabelOptions';
		$this->description   = __( 'Will help you to create colourful labels. You can choose among 6 various label colours . ', 'padma-advanced' );
		$this->categories    = array( 'content' );

		$this->inline_editable = array( 'block-title', 'block-subtitle', 'su-label' );

		$this->inline_editable_equivalences = array( 'su-label' => 'text' );
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
				'id'       => 'label',
				'name'     => 'Label',
				'selector' => 'span.su-label',
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

		$text = parent::get_setting( $block, 'text' );
		$type = parent::get_setting( $block, 'type' );

		if ( ! $text ) {
			$text = 'Hello';
		}

		if ( ! $type ) {
			$type = 'default';
		}

		echo do_shortcode( '[su_label type="' . $type . '" class="text"]' . $text . '[/su_label]' );

	}

}
