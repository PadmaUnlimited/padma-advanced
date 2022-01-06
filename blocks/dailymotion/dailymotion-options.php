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
class PadmaVisualElementsBlockDailymotionOptions extends \PadmaBlockOptionsAPI {

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
					'tooltip' => __( 'Url of Dailymotion page with video', 'padma-advanced' ),
				),

				'width'      => array(
					'name'    => 'width',
					'type'    => 'integer',
					'label'   => __( 'Width', 'padma-advanced' ),
					'default' => 600,
					'tooltip' => __( 'Video width', 'padma-advanced' ),
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
					'tooltip' => __( 'Play video automatically when a page is loaded. Please note, in modern browsers autoplay option only works with the mute option enabled', 'padma-advanced' ),
				),

				'background' => array(
					'name'    => 'background',
					'type'    => 'text',
					'label'   => __( 'Background', 'padma-advanced' ),
					'default' => '#FFC300',
					'tooltip' => __( 'HTML (HEX) color of the background of controls elements', 'padma-advanced' ),
				),

				'foreground' => array(
					'name'    => 'foreground',
					'type'    => 'text',
					'label'   => __( 'Foreground', 'padma-advanced' ),
					'default' => '#F7FFFD',
					'tooltip' => __( 'HTML (HEX) color of the foreground of controls elements', 'padma-advanced' ),
				),

				'highlight'  => array(
					'name'    => 'highlight',
					'type'    => 'text',
					'label'   => __( 'Highlight', 'padma-advanced' ),
					'default' => '#171D1B',
					'tooltip' => __( "HTML (HEX) color of the controls elements' highlights", 'padma-advanced' ),
				),

				'logo'       => array(
					'name'    => 'logo',
					'type'    => 'select',
					'label'   => __( 'Logo', 'padma-advanced' ),
					'default' => 'yes',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
					'tooltip' => __( 'Allows to hide or show the Dailymotion logo', 'padma-advanced' ),
				),

				'quality'    => array(
					'name'    => 'quality',
					'type'    => 'select',
					'label'   => __( 'Quality', 'padma-advanced' ),
					'default' => '380',
					'options' => array(
						'240'  => '240',
						'380'  => '380',
						'480'  => '480',
						'720'  => '720',
						'1080' => '1080',
					),
					'tooltip' => __( 'Determines the quality that must be played by default if available', 'padma-advanced' ),
				),

				'related'    => array(
					'name'    => 'related',
					'type'    => 'select',
					'label'   => __( 'Related', 'padma-advanced' ),
					'default' => 'yes',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
					'tooltip' => __( 'Show related videos at the end of the video', 'padma-advanced' ),
				),

				'info'       => array(
					'name'    => 'info',
					'type'    => 'select',
					'label'   => __( 'Info', 'padma-advanced' ),
					'default' => 'yes',
					'options' => array(
						'yes' => __( 'Yes', 'padma-advanced' ),
						'no'  => __( 'No', 'padma-advanced' ),
					),
					'tooltip' => __( 'Show videos info (title/author) on the start screen', 'padma-advanced' ),
				),
			),
		);
	}
}
