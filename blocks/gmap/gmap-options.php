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
class PadmaVisualElementsBlockGmapOptions extends \PadmaBlockOptionsAPI {

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
				'address'    => array(
					'name'    => 'address',
					'label'   => __( 'Address', 'padma-advanced' ),
					'type'    => 'text',
					'default' => '',
					'tooltip' => __( 'Address for the marker. You can type it in any language', 'padma-advanced' ),
				),

				'responsive' => array(
					'name'    => 'responsive',
					'type'    => 'select',
					'label'   => __( 'Responsive', 'padma-advanced' ),
					'default' => 'yes',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
					'tooltip' => __( 'Ignore width and height parameters and make map responsive', 'padma-advanced' ),
				),

				'zoom'       => array(
					'name'    => 'zoom',
					'type'    => 'integer',
					'label'   => __( 'Zoom', 'padma-advanced' ),
					'default' => 0,
					'tooltip' => __( 'Zoom sets the initial zoom level of the map. Accepted values range from 1 (the whole world) to 21 (individual buildings). Use 0 (zero) to set zoom level depending on displayed object (automatic)', 'padma-advanced' ),
				),

				'width'      => array(
					'name'    => 'width',
					'type'    => 'integer',
					'label'   => __( 'Width', 'padma-advanced' ),
					'default' => 600,
					'tooltip' => __( 'Map width', 'padma-advanced' ),
				),

				'height'     => array(
					'name'    => 'height',
					'type'    => 'integer',
					'label'   => __( 'Height', 'padma-advanced' ),
					'default' => 400,
					'tooltip' => __( 'Map height', 'padma-advanced' ),
				),
			),
		);
	}
}
