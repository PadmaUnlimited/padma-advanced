<?php

/**
 * Basic Heading Blocks
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
 * Basic heading block
 */
class PadmaVisualElementsBlockBasicHeading extends \PadmaBlockAPI {

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
	 * Block inline editable fields
	 *
	 * @var array $inline_editable
	 */
	public $inline_editable;

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->id              = 've-basic-heading';
		$this->name            = __( 'Basic Heading', 'padma-advanced' );
		$this->options_class   = 'Padma_Advanced\PadmaVisualElementsBlockBasicHeadingOptions';
		$this->description     = __( 'A Heading can act as a title, section heading, and/or subheading. You can give each Heading a relative level of importance, from H1 to H6. Tip: Search engines (and people!) use Headings to determine the most important themes and topics of your content. ', 'padma-advanced' );
		$this->categories      = array( 'content', 'basic', 'typography' );
		$this->inline_editable = array( 'block-title', 'block-subtitle', 'basic-heading' );
	}

	/**
	 * Init
	 */
	public function init() {}

	/**
	 * Setup Visual Editor elements.
	 */
	public function setup_elements() {

		$this->register_block_element(
			array(
				'id'       => 'basic-heading-h1',
				'name'     => __( 'Basic Heading H1', 'padma-advanced' ),
				'selector' => 'h1',
				'states'   => array(
					'Hover' => 'h1:hover',
				),
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'basic-heading-h2',
				'name'     => __( 'Basic Heading H2', 'padma-advanced' ),
				'selector' => 'h2',
				'states'   => array(
					'Hover' => 'h2:hover',
				),
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'basic-heading-h3',
				'name'     => __( 'Basic Heading H3', 'padma-advanced' ),
				'selector' => 'h3',
				'states'   => array(
					'Hover' => 'h3:hover',
				),
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'basic-heading-h4',
				'name'     => __( 'Basic Heading H4', 'padma-advanced' ),
				'selector' => 'h4',
				'states'   => array(
					'Hover' => 'h4:hover',
				),
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'basic-heading-h5',
				'name'     => __( 'Basic Heading H5', 'padma-advanced' ),
				'selector' => 'h5',
				'states'   => array(
					'Hover' => 'h5:hover',
				),
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'basic-heading-h6',
				'name'     => __( 'Basic Heading H6', 'padma-advanced' ),
				'selector' => 'h6',
				'states'   => array(
					'Hover' => 'h6:hover',
				),
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

		$text = parent::get_setting( $block, 'basic-heading' );
		$tag  = parent::get_setting( $block, 'tag', 'h1' );

		echo sprintf( '<%s class="basic-heading" >%s</%s>', $tag, $text, $tag );

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
