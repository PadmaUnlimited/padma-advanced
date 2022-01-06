<?php
/**
 * Block options class
 *
 * @package Padma_Advanced
 */

namespace Padma_Advanced;

/**
 * Options class for BlockBasicHeading block
 */
class PadmaVisualElementsBlockBasicHeadingOptions extends \PadmaBlockOptionsAPI {

	/**
	 * Block tabs for options.
	 *
	 * @var array $tabs
	 */
	public $tabs;

	/**
	 * Block sets for options.
	 *
	 * @var array $sets
	 */
	public $sets;

	/**
	 * Inputs for each tab.
	 *
	 * @var array $inputs
	 */
	public $inputs;

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->tabs   = array(
			'general' => __( 'General', 'padma-advanced' ),
		);
		$this->sets   = array();
		$this->inputs = array(
			'general' => array(
				'basic-heading' => array(
					'name'  => 'basic-heading',
					'type'  => 'text',
					'label' => __( 'Heading text', 'padma-advanced' ),
				),
				'tag'           => array(
					'name'    => 'tag',
					'type'    => 'select',
					'options' => array(
						'h1' => 'H1',
						'h2' => 'H2',
						'h3' => 'H3',
						'h4' => 'H4',
						'h5' => 'H5',
						'h6' => 'H6',
					),
					'label'   => __( 'Tag', 'padma-advanced' ),
					'tooltip' => __( 'HTML Tag to use . ', 'padma-advanced' ),
				),
			),
		);

	}


	/**
	 * Allow developers to modify the properties of the class and use functions since doing a property outside of a function will not allow you to.
	 *
	 * @param boolean $args Args.
	 * @return void
	 */
	public function modify_arguments( $args = false ) {}

}
