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
class PadmaVisualElementsBlockContentToTabsOptions extends \PadmaBlockOptionsAPI {

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
			'general'       => __( 'General', 'padma-advanced' ),
			'query-filters' => __( 'Query Filters', 'padma-advanced' ),
		);

		$this->sets = array();

		$this->inputs = array(

			'general'       => array(
				'vertical'    => array(
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

				'tabs-class'  => array(
					'name'    => 'tabs-class',
					'type'    => 'text',
					'label'   => __( 'CSS Class', 'padma-advanced' ),
					'tooltip' => __( 'Additional CSS class name(s) separated by space(s)', 'padma-advanced' ),
				),

				'style'       => array(
					'name'    => 'style',
					'type'    => 'select',
					'label'   => __( 'Style', 'padma-advanced' ),
					'default' => 'default',
					'options' => array(
						'default'       => 'Default',
						'carbon'        => 'Carbon',
						'sharp'         => 'Sharp',
						'grid'          => 'Grid',
						'wood'          => 'Wood',
						'fabric'        => 'Fabric',
						'modern-dark'   => 'Modern: Dark',
						'modern-light'  => 'Modern: Light',
						'modern-blue'   => 'Modern: Blue',
						'modern-orange' => 'Modern: Orange',
						'flat-dark'     => 'Flat: Dark',
						'flat-light'    => 'Flat: Light',
						'flat-blue'     => 'Flat: Blue',
						'flat-green'    => 'Flat: Green',
					),
					'tooltip' => __( 'Choose style for this tabs', 'padma-advanced' ),
				),

				'active'      => array(
					'name'    => 'active',
					'type'    => 'integer',
					'label'   => __( 'Active (1-100)', 'padma-advanced' ),
					'default' => 1,
					'tooltip' => __( 'Select which tab is open by default', 'padma-advanced' ),
				),

				'post-link'   => array(
					'type'    => 'checkbox',
					'name'    => 'url',
					'label'   => __( 'Enable post link', 'padma-advanced' ),
					'tooltip' => __( 'Link tab to any webpage. Use full URL to turn the tab title into link', 'padma-advanced' ),
					'default' => false,
				),
				'item-target' => array(
					'name'    => 'item-target',
					'type'    => 'select',
					'default' => 'self',
					'options' => array(
						'self'  => __( 'Open in same tab', 'padma-advanced' ),
						'blank' => __( 'Open in new tab', 'padma-advanced' ),
					),
					'label'   => __( 'Target', 'padma-advanced' ),
					'tooltip' => __( 'Choose how to open the custom tab link', 'padma-advanced' ),
				),

				'item-class'  => array(
					'name'    => 'item-class',
					'type'    => 'text',
					'label'   => __( 'CSS Class for the items', 'padma-advanced' ),
					'tooltip' => __( 'Additional CSS class name(s) separated by space(s)', 'padma-advanced' ),
				),

			),

			'query-filters' => array(

				'categories'      => array(
					'type'    => 'multi-select',
					'name'    => 'categories',
					'label'   => __( 'Categories', 'padma-advanced' ),
					'tooltip' => '',
					'options' => 'get_categories()',
				),

				'categories-mode' => array(
					'type'    => 'select',
					'name'    => 'categories-mode',
					'label'   => __( 'Categories Mode', 'padma-advanced' ),
					'tooltip' => '',
					'options' => array(
						'include' => __( 'Include', 'padma-advanced' ),
						'exclude' => __( 'Exclude', 'padma-advanced' ),
					),
				),

				'enable-tags'     => array(
					'type'    => 'checkbox',
					'name'    => 'tags-filter',
					'label'   => __( 'Tags Filter', 'padma-advanced' ),
					'tooltip' => __( 'Check this to allow the tags filter show . ', 'padma-advanced' ),
					'default' => false,
					'toggle'  => array(
						'false' => array(
							'hide' => array(
								'#input-tags',
							),
						),
						'true'  => array(
							'show' => array(
								'#input-tags',
							),
						),
					),
				),

				'tags'            => array(
					'type'    => 'multi-select',
					'name'    => 'tags',
					'label'   => __( 'Tags', 'padma-advanced' ),
					'tooltip' => '',
					'options' => 'get_tags()',
				),

				'post-type'       => array(
					'type'     => 'multi-select',
					'name'     => 'post-type',
					'label'    => __( 'Post Type', 'padma-advanced' ),
					'tooltip'  => '',
					'options'  => 'get_post_types()',
					'callback' => 'reloadBlockOptions()',
				),

				'post-status'     => array(
					'type'    => 'multi-select',
					'name'    => 'post-status',
					'label'   => __( 'Post Status', 'padma-advanced' ),
					'tooltip' => '',
					'options' => 'get_post_status()',
				),

				'author'          => array(
					'type'    => 'multi-select',
					'name'    => 'author',
					'label'   => __( 'Author', 'padma-advanced' ),
					'tooltip' => '',
					'options' => 'get_authors()',
				),

				'number-of-posts' => array(
					'type'    => 'integer',
					'name'    => 'number-of-posts',
					'label'   => __( 'Number of Posts', 'padma-advanced' ),
					'tooltip' => '',
					'default' => 10,
				),

				'offset'          => array(
					'type'    => 'integer',
					'name'    => 'offset',
					'label'   => __( 'Offset', 'padma-advanced' ),
					'tooltip' => __( 'The offset is the number of entries or posts you would like to skip.  If the offset is 1, then the first post will be skipped . ', 'padma-advanced' ),
					'default' => 0,
				),

				'order-by'        => array(
					'type'    => 'select',
					'name'    => 'order-by',
					'label'   => __( 'Order By', 'padma-advanced' ),
					'tooltip' => __( 'Order By', 'padma-advanced' ),
					'options' => array(
						'date'          => __( 'Date', 'padma-advanced' ),
						'title'         => __( 'Title', 'padma-advanced' ),
						'rand'          => __( 'Random', 'padma-advanced' ),
						'comment_count' => __( 'Comment Count', 'padma-advanced' ),
						'ID'            => __( 'ID', 'padma-advanced' ),
						'author'        => __( 'Author', 'padma-advanced' ),
						'type'          => __( 'Post Type', 'padma-advanced' ),
						'menu_order'    => __( 'Custom Order', 'padma-advanced' ),
					),
				),

				'order'           => array(
					'type'    => 'select',
					'name'    => 'order',
					'label'   => __( 'Order', 'padma-advanced' ),
					'tooltip' => '',
					'options' => array(
						'desc' => __( 'Descending', 'padma-advanced' ),
						'asc'  => __( 'Ascending', 'padma-advanced' ),
					),
				),

				'byid-include'    => array(
					'type'    => 'text',
					'name'    => 'byid-include',
					'label'   => __( 'Include by ID', 'padma-advanced' ),
					'tooltip' => __( 'In both Include and Exclude by ID, you use a comma separated list of IDs of your post type . ', 'padma-advanced' ),
				),

				'byid-exclude'    => array(
					'type'    => 'text',
					'name'    => 'byid-exclude',
					'label'   => __( 'Exclude by ID', 'padma-advanced' ),
					'tooltip' => __( 'In both Include and Exclude by ID, you use a comma separated list of IDs of your post type . ', 'padma-advanced' ),
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

	/**
	 * Get posts categories
	 *
	 * @return array
	 */
	public function get_categories() {
		if ( isset( $this->block['settings']['post-type'] ) ) {
			return \PadmaQuery::get_categories( $this->block['settings']['post-type'] );
		} else {
			return array();
		}
	}

	/**
	 * Get Tags
	 *
	 * @return array
	 */
	public function get_tags() {
		return \PadmaQuery::get_tags();
	}

	/**
	 * Get Authors
	 *
	 * @return array
	 */
	public function get_authors() {
		return \PadmaQuery::get_authors();
	}

	/**
	 * Get Post types
	 *
	 * @return array
	 */
	public function get_post_types() {
		return \PadmaQuery::get_post_types();
	}

	/**
	 * Get taxonomies
	 *
	 * @return array
	 */
	public function get_taxonomies() {
		return \PadmaQuery::get_taxonomies();
	}

	/**
	 * Get posts status
	 *
	 * @return array
	 */
	public function get_post_status() {
		return \PadmaQuery::get_post_status();
	}
}
