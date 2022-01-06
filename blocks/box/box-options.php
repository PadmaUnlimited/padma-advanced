<?php
/**
 * Block options class
 *
 * @package Padma_Advanced
 */


namespace Padma_Advanced;

class PadmaVisualElementsBlockBoxOptions extends \PadmaBlockOptionsAPI {

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
	 * Init block options
	 */
	public function __construct() {

		$this->tabs = array(
			'general' => __( 'General', 'padma-advanced' ),
		);

		$this->sets = array();

		$this->inputs = array(
			'general' => array(
				'style'   => array(
					'name'    => 'style',
					'type'    => 'select',
					'label'   => __( 'Style', 'padma-advanced' ),
					'default' => 'default',
					'options' => array(
						'default' => 'Default',
						'soft'    => 'Soft',
						'glass'   => 'Glass',
						'bubbles' => 'Bubbles',
						'noise'   => 'Noise',
					),
					'tooltip' => __( 'Box style preset', 'padma-advanced' ),
				),

				'radius'  => array(
					'name'    => 'radius',
					'type'    => 'text',
					'label'   => __( 'Radius', 'padma-advanced' ),
					'tooltip' => __( 'Box corners radius', 'padma-advanced' ),
					'default' => 3,
				),

				'title'   => array(
					'name'    => 'title',
					'type'    => 'text',
					'label'   => __( 'Title', 'padma-advanced' ),
					'tooltip' => __( 'Text for the box title', 'padma-advanced' ),
				),

				'content' => array(
					'name'    => 'content',
					'type'    => 'wysiwyg',
					'label'   => __( 'Content', 'padma-advanced' ),
					'tooltip' => __( 'Box content', 'padma-advanced' ),
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
