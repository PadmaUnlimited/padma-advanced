<?php
/**
 * Block options class
 *
 * @package Padma_Advanced
 */

namespace Padma_Advanced;

/**
 * Options class for Columns block
 */
class PadmaVisualElementsBlockColumnsOptions extends \PadmaBlockOptionsAPI {

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
				'columns' => array(
					'type'     => 'repeater',
					'name'     => 'columns',
					'label'    => __( 'Columns', 'padma-advanced' ),
					'tooltip'  => __( 'Content for your columns . ', 'padma-advanced' ),
					'inputs'   => array(
						array(
							'name'    => 'size',
							'label'   => __( 'Size', 'padma-advanced' ),
							'type'    => 'select',
							'default' => 'one-half',
							'options' => array(
								'full-width'   => __( 'Full width 1/1', 'padma-advanced' ),
								'one-half'     => __( 'One half 1/2', 'padma-advanced' ),
								'one-third'    => __( 'One third 1/3', 'padma-advanced' ),
								'two-third'    => __( 'Two third 2/3', 'padma-advanced' ),
								'one-fourth'   => __( 'One fourth 1/4', 'padma-advanced' ),
								'three-fourth' => __( 'Three fourth 3/4', 'padma-advanced' ),
								'one-fifth'    => __( 'One fifth 1/5', 'padma-advanced' ),
								'two-fifth'    => __( 'Two fifth 2/5', 'padma-advanced' ),
								'three-fifth'  => __( 'Three fifth 3/5', 'padma-advanced' ),
								'four-fifth'   => __( 'Four fifth 4/5', 'padma-advanced' ),
								'one-sixth'    => __( 'One sixth 1/6', 'padma-advanced' ),
								'five-sixth'   => __( 'Five sixth 5/6', 'padma-advanced' ),
							),
							'tooltip' => __( 'Select column width. This width will be calculated depend page width', 'padma-advanced' ),
						),

						array(
							'type'    => 'select',
							'name'    => 'center',
							'label'   => __( 'Center', 'padma-advanced' ),
							'options' => array(
								'yes' => __( 'Yes', 'padma-advanced' ),
								'no'  => __( 'No', 'padma-advanced' ),
							),
							'default' => 'no',
							'tooltip' => __( 'Is this column centered on the page', 'padma-advanced' ),
						),

						array(
							'type'    => 'text',
							'name'    => 'class',
							'label'   => __( 'Class', 'padma-advanced' ),
							'tooltip' => __( 'Additional CSS class name(s) separated by space(s)', 'padma-advanced' ),
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
