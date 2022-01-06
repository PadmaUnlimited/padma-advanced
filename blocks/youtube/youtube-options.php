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
class PadmaVisualElementsBlockYoutubeOptions extends \PadmaBlockOptionsAPI {

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
					'tooltip' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'padma-advanced' ),
				),

				'width'      => array(
					'name'    => 'width',
					'type'    => 'integer',
					'label'   => __( 'Width', 'padma-advanced' ),
					'default' => 600,
					'tooltip' => __( 'Width', 'padma-advanced' ),
				),

				'height'     => array(
					'name'    => 'height',
					'type'    => 'integer',
					'label'   => __( 'Height', 'padma-advanced' ),
					'default' => 400,
					'tooltip' => __( 'Height', 'padma-advanced' ),
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
					'tooltip' => __( 'Play video automatically when a page is loaded. Please note, in modern browsers autoplay option only works with the mute option enabled', 'padma-advanced' ),
				),

				'mute'       => array(
					'name'    => 'mute',
					'type'    => 'select',
					'label'   => __( 'Mute', 'padma-advanced' ),
					'default' => 'no',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
					'tooltip' => __( 'Mute the player', 'padma-advanced' ),
				),
			),
		);
	}

}
