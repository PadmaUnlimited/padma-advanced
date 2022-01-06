<?php
/**
 * Block options class
 *
 * @package Padma_Advanced
 */

namespace Padma_Advanced;

/**
 * Options class for block
 */
class PadmaVisualElementsBlockLabelOptions extends \PadmaBlockOptionsAPI {

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

				'type' => array(
					'name'    => 'type',
					'label'   => __( 'Type', 'padma-advanced' ),
					'type'    => 'select',
					'default' => 'default',
					'options' => array(
						'default'   => __( 'Default', 'padma-advanced' ),
						'success'   => __( 'Success', 'padma-advanced' ),
						'warning'   => __( 'Warning', 'padma-advanced' ),
						'important' => __( 'Important', 'padma-advanced' ),
						'black'     => __( 'Black', 'padma-advanced' ),
						'info'      => __( 'Info', 'padma-advanced' ),
					),
					'tooltip' => __( 'Style of the label', 'padma-advanced' ),
				),

				'text' => array(
					'name'  => 'text',
					'type'  => 'text',
					'label' => __( 'Text', 'padma-advanced' ),
				),
			),
		);
	}

}
