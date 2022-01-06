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
class PadmaVisualElementsBlockTabsOptions extends \PadmaBlockOptionsAPI {

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

			'active'   => array(
				'name'    => 'active',
				'label'   => __( 'Active', 'padma-advanced' ),
				'type'    => 'integer',
				'tooltip' => __( 'Which tab is open by default. Number from 1 to 100 . ', 'padma-advanced' ),
				'default' => 1,
			),

			'vertical' => array(
				'name'    => 'vertical',
				'label'   => __( 'Vertical', 'padma-advanced' ),
				'type'    => 'select',
				'default' => 'no',
				'options' => array(
					'yes' => __( 'Yes', 'padma-advanced' ),
					'no'  => __( 'No', 'padma-advanced' ),
				),
				'tooltip' => __( 'Align tabs vertically', 'padma-advanced' ),
			),

			'tabs'     => array(
				'type'     => 'repeater',
				'name'     => 'tabs',
				'label'    => __( 'Tabs', 'padma-advanced' ),
				'tooltip'  => __( 'Content for your tabs . ', 'padma-advanced' ),
				'inputs'   => array(

					array(
						'type'  => 'text',
						'name'  => 'title',
						'label' => __( 'Title', 'padma-advanced' ),
					),

					array(
						'type'    => 'select',
						'name'    => 'disabled',
						'label'   => __( 'Disabled', 'padma-advanced' ),
						'options' => array(
							'yes' => __( 'Yes', 'padma-advanced' ),
							'no'  => __( 'No', 'padma-advanced' ),
						),
						'default' => 'no',
					),

					array(
						'type'    => 'text',
						'name'    => 'anchor',
						'label'   => __( 'Anchor', 'padma-advanced' ),
						'tooltip' => __( 'You can use unique anchor for this tab to access it with hash in page url. For example: use Hello and then navigate to url like http://example.com/page-url#Hello. This tab will be activated and scrolled in . ', 'padma-advanced' ),
					),

					array(
						'type'    => 'text',
						'name'    => 'url',
						'label'   => __( 'Url', 'padma-advanced' ),
						'tooltip' => __( 'Link tab to any webpage. Use full URL to turn the tab title into link . ', 'padma-advanced' ),
					),

					array(
						'name'    => 'target',
						'type'    => 'select',
						'label'   => __( 'Target', 'padma-advanced' ),
						'default' => 'blank',
						'options' => array(
							'self'  => __( 'Open in same tab', 'padma-advanced' ),
							'blank' => __( 'Open in new tab', 'padma-advanced' ),
						),
						'tooltip' => __( 'Choose how to open the custom tab link', 'padma-advanced' ),
					),

					array(
						'type'    => 'wysiwyg',
						'name'    => 'content',
						'label'   => __( 'Content', 'padma-advanced' ),
						'default' => null,
					),
				),
				'sortable' => true,
				'limit'    => 100,
			),
		);
	}
}
