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
class PadmaVisualElementsBlockDummyImageOptions extends \PadmaBlockOptionsAPI {

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
				'width'  => array(
					'name'    => 'width',
					'type'    => 'integer',
					'label'   => __( 'Width', 'padma-advanced' ),
					'tooltip' => __( 'Image width', 'padma-advanced' ),
					'default' => 500,
				),

				'height' => array(
					'name'    => 'height',
					'type'    => 'integer',
					'label'   => __( 'Height', 'padma-advanced' ),
					'tooltip' => __( 'Image height', 'padma-advanced' ),
					'default' => 300,
				),
				'theme'  => array(
					'name'    => 'theme ',
					'type'    => 'select',
					'label'   => __( 'Theme ', 'padma-advanced' ),
					'default' => 'any',
					'options' => array(
						'any'       => __( 'Any', 'padma-advanced' ),
						'abstract'  => __( 'Abstract', 'padma-advanced' ),
						'animals'   => __( 'Animals', 'padma-advanced' ),
						'business'  => __( 'Business', 'padma-advanced' ),
						'cats'      => __( 'Cats', 'padma-advanced' ),
						'city'      => __( 'City', 'padma-advanced' ),
						'food'      => __( 'Food', 'padma-advanced' ),
						'nightlife' => __( 'Nightlife', 'padma-advanced' ),
						'fashion'   => __( 'Fashion', 'padma-advanced' ),
						'people'    => __( 'People', 'padma-advanced' ),
						'nature'    => __( 'Nature', 'padma-advanced' ),
						'sports'    => __( 'Sports', 'padma-advanced' ),
						'technics'  => __( 'Technics', 'padma-advanced' ),
						'transport' => __( 'Transport', 'padma-advanced' ),

					),
					'tooltip' => 'Select the theme for this image . ',
				),
			),
		);
	}
}
