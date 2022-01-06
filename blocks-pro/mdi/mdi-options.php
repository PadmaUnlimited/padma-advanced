<?php
/**
 * Block options class
 *
 * @package Padma_Advanced
 */

namespace Padma_Advanced;

class PadmaMDIBlockOptions extends \PadmaBlockOptionsAPI {

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

				'url' => array(
					'name'    => 'url',
					'label'   => 'Link',
					'type'    => 'text',
					'tooltip' => 'If set, the icon will be a link',
				),

				'before-icon' => array(
					'name'    => 'before-icon',
					'label'   => 'Before icon',
					'type'    => 'wysiwyg',
					'tooltip' => 'Add content before the icon',
				),

				'after-icon'  => array(
					'name'    => 'after-icon',
					'label'   => 'After icon',
					'type'    => 'wysiwyg',
					'tooltip' => 'Add content after the icon',
				),
				'filter'      => array(
					'name' => 'filter',
					'type' => 'raw_html',
					'html' => '<div class="mdi-icon-filter-search"><input type="text" id="icon-filter" placeholder="Filter" title="Filter icons"><a class="mdi-icon-filter-reset"><span>x</span></a></div>',
				),
				'mdi-icon-width' => array(
					'name'    => 'mdi-icon-width',
					'type'    => 'integer',
					'label'   => 'Width',
					'default' => '24',
				),
				'mdi-icon-height' => array(
					'name'    => 'mdi-icon-height',
					'type'    => 'integer',
					'label'   => 'Height',
					'default' => '24',
				),
				'mdi-icon'     => array(
					'name'    => 'mdi-icon',
					'type'    => 'radio',
					'label'   => 'Icon',
					'default' => '',
					'options' => $this->load(),
				),
			),
		);
	}

	/**
	 * Load MDI icons
	 *
	 * @return array
	 */
	public function load() {
		$icons = array();
		$data = (array) json_decode( file_get_contents( PADMA_ADVANCED_DIR . 'blocks-pro/mdi/meta.json' ) );

		foreach ( $data as $key => $icon ) {
			$icons[ $icon->name ] = sprintf( '<img loading=lazy src= "https://cdn.padmaunlimited.com/blocks/mdi/svg/%s.svg" style="width:24px;height:24px" />', $icon->name );
		}
		return $icons;
	}

}
