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
class PadmaVisualElementsBlockQuoteOptions extends \PadmaBlockOptionsAPI {

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

				'cite'  => array(
					'name'    => 'cite',
					'type'    => 'text',
					'label'   => __( 'Cite', 'padma-advanced' ),
					'tooltip' => __( 'Quote author name', 'padma-advanced' ),
				),

				'quote' => array(
					'name'    => 'quote',
					'type'    => 'text',
					'label'   => __( 'Quote', 'padma-advanced' ),
					'tooltip' => __( 'Quote text', 'padma-advanced' ),
				),

				'url'   => array(
					'name'    => 'url',
					'type'    => 'text',
					'label'   => __( 'Url', 'padma-advanced' ),
					'tooltip' => __( 'Url of the quote author. Leave empty to disable link', 'padma-advanced' ),
				),
			),
		);
	}
}
