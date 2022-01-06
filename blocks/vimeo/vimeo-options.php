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
class PadmaVisualElementsBlockVimeoOptions extends \PadmaBlockOptionsAPI {

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

				'url'        => array(
					'name'    => 'url',
					'label'   => __( 'Url', 'padma-advanced' ),
					'type'    => 'text',
					'default' => '',
					'tooltip' => __( 'Url of Vimeo page with video. Ex: http://vimeo.com/watch?v=XXXXXX', 'padma-advanced' ),
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

				'responsive' => array(
					'name'    => 'responsive',
					'type'    => 'select',
					'label'   => __( 'Responsive', 'padma-advanced' ),
					'default' => 'yes',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
					'tooltip' => __( 'Ignore width and height parameters and make player responsive', 'padma-advanced' ),
				),

				'autoplay'   => array(
					'name'    => 'autoplay',
					'type'    => 'select',
					'label'   => __( 'Autoplay', 'padma-advanced' ),
					'default' => 'yes',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
					'tooltip' => __( 'Play video automatically when a page is loaded . ', 'padma-advanced' ),
				),

				'dnt'        => array(
					'name'    => 'dnt',
					'type'    => 'select',
					'label'   => __( 'DNT', 'padma-advanced' ),
					'default' => 'no',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
					'tooltip' => __( 'Setting this parameter to YES will block the player from tracking any playback session data. Will have the same effect as enabling a Do Not Track header in your browser', 'padma-advanced' ),
				),
			),
		);
	}

}

