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
class PadmaVisualElementsBlockSpoilerOptions extends \PadmaBlockOptionsAPI {

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

				'spoilers' => array(
					'type'    => 'repeater',
					'name'    => 'spoilers',
					'label'   => __( 'Spoiler', 'padma-advanced' ),
					'tooltip' => __( 'Spoiler with hidden content', 'padma-advanced' ),
					'inputs'  => array(
						array(
							'type'  => 'text',
							'name'  => 'title',
							'label' => __( 'Title', 'padma-advanced' ),
						),

						array(
							'type'    => 'select',
							'name'    => 'open',
							'label'   => __( 'Open', 'padma-advanced' ),
							'options' => array(
								'yes' => __( 'Yes', 'padma-advanced' ),
								'no'  => __( 'No', 'padma-advanced' ),
							),
							'default' => 'no',
						),

						array(
							'name'    => 'style',
							'type'    => 'select',
							'label'   => __( 'Style', 'padma-advanced' ),
							'default' => 'default',
							'options' => array(
								'default' => __( 'Default', 'padma-advanced' ),
								'fancy'   => __( 'Fancy', 'padma-advanced' ),
								'simple'  => __( 'Simple', 'padma-advanced' ),
							),
							'tooltip' => __( 'Choose style for this spoiler', 'padma-advanced' ),
						),

						array(
							'name'    => 'icon',
							'type'    => 'select',
							'label'   => __( 'Icon', 'padma-advanced' ),
							'default' => 'plus',
							'options' => array(
								'plus'           => 'Plus',
								'plus-cicle'     => 'Plus-cicle',
								'plus-square-1'  => 'Plus-square-1',
								'plus-square-2'  => 'Plus-square-2',
								'arrow'          => 'Arrow',
								'arrow-circle-1' => 'Arrow-circle-1',
								'arrow-circle-2' => 'Arrow-circle-1e',
								'chevron'        => 'Chevron',
								'chevron-circle' => 'Chevron-circle',
								'caret'          => 'Caret',
								'caret-square'   => 'Caret-square',
								'folder-1'       => 'Folder-1',
								'folder-2'       => 'Folder-2',
							),
							'tooltip' => __( 'Choose style for this spoiler', 'padma-advanced' ),
						),

						array(
							'type'    => 'text',
							'name'    => 'anchor',
							'label'   => __( 'Anchor', 'padma-advanced' ),
							'tooltip' => __( 'You can use unique anchor for this tab to access it with hash in page url. For example: use Hello and then navigate to url like http://example.com/page-url#Hello. This tab will be activated and scrolled in . ', 'padma-advanced' ),
						),

						array(
							'type'    => 'wysiwyg',
							'name'    => 'content',
							'label'   => __( 'Content', 'padma-advanced' ),
							'default' => null,
						),
					),
				),
				'sortable' => true,
				'limit'    => 100,
			),
		);
	}
}
