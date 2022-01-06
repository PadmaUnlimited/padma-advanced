<?php
/**
 * Block options class
 *
 * @package Padma_Advanced
 */

namespace Padma_Advanced;

/**
 * Options class for Button block
 */
class PadmaVisualElementsBlockButtonOptions extends \PadmaBlockOptionsAPI {

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

				'url'     => array(
					'name'    => 'url',
					'type'    => 'text',
					'label'   => __( 'Url', 'padma-advanced' ),
					'tooltip' => __( 'Button link', 'padma-advanced' ),
				),

				'target'  => array(
					'name'    => 'target',
					'type'    => 'select',
					'label'   => __( 'Target', 'padma-advanced' ),
					'default' => 'self',
					'options' => array(
						'self'  => __( 'Open in same tab', 'padma-advanced' ),
						'blank' => __( 'Open in new tab', 'padma-advanced' ),
					),
					'tooltip' => __( 'Button link target', 'padma-advanced' ),
				),

				'style'   => array(
					'name'    => 'style',
					'label'   => __( 'Style', 'padma-advanced' ),
					'type'    => 'select',
					'default' => 'default',
					'options' => array(
						'none'    => 'none',
						'default' => 'Default',
						'flat'    => 'Flat',
						'ghost'   => 'Ghost',
						'soft'    => 'Soft',
						'glass'   => 'Glass',
						'bubbles' => 'Bubbles',
						'noise'   => 'Noise',
						'stroked' => 'Stroked',
						'3d'      => '3D',
					),
					'tooltip' => __( 'Button background style preset', 'padma-advanced' ),
				),
				'icon'    => array(
					'name'    => 'icon',
					'label'   => __( 'Icon', 'padma-advanced' ),
					'type'    => 'text',
					'tooltip' => __( 'You can upload custom icon for this button or pick a built-in icon. FontAwesome icon name or icon image URL. Examples: "star", http://example.com/icon.png', 'padma-advanced' ),
				),
				'desc'    => array(
					'name'    => 'desc',
					'label'   => __( 'Desc', 'padma-advanced' ),
					'type'    => 'text',
					'tooltip' => __( 'Small description under button text. This option is incompatible with icon . ', 'padma-advanced' ),
				),
				'onclick' => array(
					'name'    => 'onclick',
					'label'   => __( 'onClick', 'padma-advanced' ),
					'type'    => 'text',
					'tooltip' => __( 'Advanced JavaScript code for onClick action . ', 'padma-advanced' ),
				),
				'rel'     => array(
					'name'    => 'rel',
					'label'   => __( 'Rel', 'padma-advanced' ),
					'type'    => 'text',
					'tooltip' => __( 'Here you can add value for the rel attribute. Example values: nofollow, lightbox', 'padma-advanced' ),
				),
				'title'   => array(
					'name'    => 'title',
					'label'   => __( 'Title', 'padma-advanced' ),
					'type'    => 'text',
					'tooltip' => __( 'Here you can add value for the title attribute', 'padma-advanced' ),
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
