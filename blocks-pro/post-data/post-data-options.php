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
class PadmaVisualElementsBlockPostDataOptions extends \PadmaBlockOptionsAPI {

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

				'field'   => array(
					'name'    => 'field',
					'type'    => 'select',
					'label'   => __( 'Field', 'padma-advanced' ),
					'default' => 'post_title',
					'options' => array(
						''                      => '',
						'ID'                    => __( 'Post ID', 'padma-advanced' ),
						'post_author'           => __( 'Post author', 'padma-advanced' ),
						'post_date'             => __( 'Post date', 'padma-advanced' ),
						'post_date_gmt'         => __( 'Post date GMT', 'padma-advanced' ),
						'post_content'          => __( 'Post content', 'padma-advanced' ),
						'post_title'            => __( 'Post title', 'padma-advanced' ),
						'post_excerpt'          => __( 'Post excerpt', 'padma-advanced' ),
						'post_status'           => __( 'Post status', 'padma-advanced' ),
						'comment_status'        => __( 'Comment status', 'padma-advanced' ),
						'ping_status'           => __( 'Ping status', 'padma-advanced' ),
						'post_name'             => __( 'Post name', 'padma-advanced' ),
						'post_modified'         => __( 'Post modified', 'padma-advanced' ),
						'post_modified_gmt'     => __( 'Post modified GMT', 'padma-advanced' ),
						'post_content_filtered' => __( 'Filtered post content', 'padma-advanced' ),
						'post_parent'           => __( 'Post parent', 'padma-advanced' ),
						'guid'                  => 'GUID',
						'menu_order'            => __( 'Menu order', 'padma-advanced' ),
						'post_type'             => __( 'Post type', 'padma-advanced' ),
						'post_mime_type'        => __( 'Post mime type', 'padma-advanced' ),
						'comment_count'         => __( 'Comment count', 'padma-advanced' ),
					),
					'tooltip' => __( 'Post data field name', 'padma-advanced' ),
				),
				'default' => array(
					'name'    => 'default',
					'type'    => 'text',
					'label'   => __( 'Default', 'padma-advanced' ),
					'tooltip' => __( 'This text will be shown if data is not found', 'padma-advanced' ),
				),
				'before'  => array(
					'name'    => 'before',
					'type'    => 'text',
					'label'   => __( 'Before', 'padma-advanced' ),
					'tooltip' => __( 'This content will be shown before the value', 'padma-advanced' ),
				),
				'after'   => array(
					'name'    => 'after',
					'type'    => 'text',
					'label'   => __( 'After', 'padma-advanced' ),
					'tooltip' => __( 'This content will be shown after the value', 'padma-advanced' ),
				),
				'post-id' => array(
					'name'    => 'post-id',
					'type'    => 'text',
					'label'   => __( 'Post ID', 'padma-advanced' ),
					'tooltip' => __( 'You can specify custom post ID. Post slug is also allowed. Leave this field empty to use ID of the current post. Current post ID may not work in Live Preview mode', 'padma-advanced' ),
				),
			),

		);
	}
}
