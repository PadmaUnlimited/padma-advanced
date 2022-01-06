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
class PadmaVisualElementsBlockDividerOptions extends \PadmaBlockOptionsAPI {

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
			'general' => 'General',
		);

		$this->sets = array();

		$this->inputs = array(
			'general' => array(
				'top'    => array(
					'name'    => 'top',
					'label'   => __( 'Top', 'padma-advanced' ),
					'type'    => 'select',
					'default' => 'yes',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
					'tooltip' => __( 'Show link to top of the page or not', 'padma-advanced' ),
				),
				'text'   => array(
					'name'    => 'text',
					'type'    => 'text',
					'label'   => __( 'Text', 'padma-advanced' ),
					'tooltip' => __( 'Text for the GO TOP link', 'padma-advanced' ),
				),
				'style'  => array(
					'name'    => 'style',
					'label'   => __( 'Style', 'padma-advanced' ),
					'type'    => 'select',
					'default' => 'none',
					'options' => array(
						'default' => __( 'Default', 'padma-advanced' ),
						'dotted'  => __( 'Dotted', 'padma-advanced' ),
						'dashed'  => __( 'Dashed', 'padma-advanced' ),
						'double'  => __( 'Double', 'padma-advanced' ),
					),
					'tooltip' => __( 'Choose style for this divider', 'padma-advanced' ),
				),
				'margin' => array(
					'name'    => 'margin',
					'label'   => __( 'Margin', 'padma-advanced' ),
					'type'    => 'integer',
					'tooltip' => __( 'Adjust the top and bottom margins of this divider (in pixels)', 'padma-advanced' ),
					'default' => 20,
				),
				'size'   => array(
					'name'    => 'size',
					'label'   => __( 'Size', 'padma-advanced' ),
					'type'    => 'integer',
					'tooltip' => __( 'Height of the divider (in pixels)', 'padma-advanced' ),
					'default' => 3,
				),
			),
		);
	}
}
