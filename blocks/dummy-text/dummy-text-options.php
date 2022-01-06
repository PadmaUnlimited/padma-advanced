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
class PadmaVisualElementsBlockDummyTextOptions extends \PadmaBlockOptionsAPI {

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
				'what'   => array(
					'name'    => 'what',
					'type'    => 'select',
					'label'   => __( 'What', 'padma-advanced' ),
					'tooltip' => __( 'What to generate', 'padma-advanced' ),
					'default' => 'paras',
					'options' => array(
						'paras' => __( 'Paragraphs', 'padma-advanced' ),
						'words' => __( 'Words', 'padma-advanced' ),
						'bytes' => __( 'Bytes', 'padma-advanced' ),
					),
				),

				'amount' => array(
					'name'    => 'amount',
					'type'    => 'integer',
					'label'   => __( 'Amount', 'padma-advanced' ),
					'tooltip' => __( 'How many items (paragraphs or words) to generate. Minimum words amount is 5', 'padma-advanced' ),
					'default' => 1,
				),

				'cache'  => array(
					'name'    => 'cache ',
					'type'    => 'select',
					'label'   => __( 'Cache ', 'padma-advanced' ),
					'default' => 'yes',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
				),
			),
		);
	}

}
