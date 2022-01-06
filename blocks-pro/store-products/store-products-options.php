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
class PadmaStoreBlockProductsOptions extends \PadmaBlockOptionsAPI {

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
				'style' => array(
					'name'    => 'style',
					'type'    => 'select',
					'label'   => __( 'Style', 'padma-advanced' ),
					'default' => 'default',
					'options' => array(
						'default' => 'Default',
					),
					'tooltip' => __( 'Choose style', 'padma-advanced' ),
				),
			),

			'query-filters' => array(

				'display-product-attributes' => array(
					'name'  => 'display-product-attributes',
					'type'  => 'heading',
					'label' => __( 'Display Product Attributes', 'padma-advanced' ),
				),

				'limit'                      => array(
					'type'    => 'integer',
					'name'    => 'limit',
					'label'   => __( 'Limit', 'padma-advanced' ),
					'tooltip' => __( 'The number of products to display. Defaults to and -1 (display all)  when listing products, and -1 (display all) for categories.', 'padma-advanced' ),
					'default' => -1,
				),

				'columns'                    => array(
					'type'    => 'select',
					'name'    => 'columns',
					'label'   => __( 'Columns', 'padma-advanced' ),
					'tooltip' => __( 'The number of columns to display. Defaults to 4.', 'padma-advanced' ),
					'options' => array(
						1 => 1,
						2 => 2,
						3 => 3,
						4 => 4,
						5 => 5,
						6 => 6,
					),
					'default' => 4,
				),

				'paginate'                   => array(
					'type'    => 'select',
					'name'    => 'paginate',
					'label'   => __( 'Paginate', 'padma-advanced' ),
					'tooltip' => __( 'Toggles pagination on. Use in conjunction with limit. Defaults to false set to true to paginate .', 'padma-advanced' ),
					'options' => array(
						'true'  => __( 'True', 'padma-advanced' ),
						'false' => __( 'False', 'padma-advanced' ),
					),
				),

				'orderby'                    => array(
					'type'    => 'select',
					'name'    => 'orderby',
					'label'   => __( 'Order By', 'padma-advanced' ),
					'tooltip' => __( 'Sorts the products displayed by the entered option. One or more options can be passed by adding both slugs with a space between them.', 'padma-advanced' ),
					'options' => array(
						'date'       => __( 'Date', 'padma-advanced' ),
						'id'         => 'ID',
						'menu_order' => __( 'Menu Order', 'padma-advanced' ),
						'popularity' => __( 'Popularity', 'padma-advanced' ),
						'rand'       => __( 'Random', 'padma-advanced' ),
						'title'      => __( 'Title', 'padma-advanced' ),
						'rating'     => __( 'Rating', 'padma-advanced' ),
					),
					'default' => 'title',
				),

				'skus'                       => array(
					'type'    => 'text',
					'name'    => 'skus',
					'label'   => 'Skus',
					'tooltip' => __( 'Comma-separated list of product SKUs.', 'padma-advanced' ),
				),

				'category'                   => array(
					'type'    => 'multi-select',
					'name'    => 'category',
					'label'   => __( 'Categories', 'padma-advanced' ),
					'tooltip' => '',
					'options' => 'get_categories()',
				),

				'tag'                        => array(
					'type'    => 'multi-select',
					'name'    => 'tag',
					'label'   => __( 'Tags', 'padma-advanced' ),
					'tooltip' => '',
					'options' => 'get_tags()',
				),

				'order'                      => array(
					'type'    => 'select',
					'name'    => 'order',
					'label'   => __( 'Order', 'padma-advanced' ),
					'tooltip' => __( 'States whether the product order is ascending (ASC) or descending (DESC), using the method set in orderby. Defaults to ASC.', 'padma-advanced' ),
					'options' => array(
						'DESC' => __( 'Descending', 'padma-advanced' ),
						'ASC'  => __( 'Ascending', 'padma-advanced' ),
					),
				),

				'class'                      => array(
					'name'    => 'class',
					'type'    => 'text',
					'label'   => __( 'CSS Div Class', 'padma-advanced' ),
					'tooltip' => __( 'Adds an HTML wrapper class so you can modify the specific output with custom CSS.', 'padma-advanced' ),
				),

				'custom-retrieve'            => array(
					'type'    => 'select',
					'name'    => 'custom-retrieve',
					'label'   => __( 'Custom Retrieve', 'padma-advanced' ),
					'tooltip' => __( 'Retrieve on sale,  best selling or top rated products.', 'padma-advanced' ),
					'options' => array(
						'normal'       => 'Normal',
						'on_sale'      => __( 'On Sale products', 'padma-advanced' ),
						'best_selling' => __( 'Best Selling products', 'padma-advanced' ),
						'top_rated'    => __( 'Top Rated products', 'padma-advanced' ),
					),
				),

				'content-product-attributes' => array(
					'name'  => 'content-product-attributes',
					'type'  => 'heading',
					'label' => __( 'Content Product Attributes', 'padma-advanced' ),
				),

				'attribute'                  => array(
					'type'    => 'select',
					'name'    => 'attribute',
					'label'   => __( 'Attribute', 'padma-advanced' ),
					'tooltip' => 'Retrieves products using the specified attribute slug.',
					'options' => 'get_attribute()',
				),

				'terms'                      => array(
					'name'    => 'terms',
					'type'    => 'text',
					'label'   => __( 'Terms', 'padma-advanced' ),
					'tooltip' => __( 'Comma-separated list of attribute terms to be used with attribute.', 'padma-advanced' ),
				),

				'terms-operator'             => array(
					'type'    => 'select',
					'name'    => 'terms-operator',
					'label'   => __( 'Terms operator', 'padma-advanced' ),
					'tooltip' => __( 'Operator to compare attribute terms.', 'padma-advanced' ),
					'default' => 'IN',
					'options' => array(
						'AND'    => __( 'AND - Will display products from all of the chosen attributes.', 'padma-advanced' ),
						'IN'     => __( 'IN - Will display products with the chosen attribute.', 'padma-advanced' ),
						'NOT IN' => __( 'NOT IN - Will display products that are not in the chosen attributes.', 'padma-advanced' ),
					),
				),

				'tag-operator'               => array(
					'type'    => 'select',
					'name'    => 'tag-operator',
					'label'   => __( 'Tag operator', 'padma-advanced' ),
					'tooltip' => __( 'Operator to compare tags.', 'padma-advanced' ),
					'default' => 'IN',
					'options' => array(
						'AND'    => __( 'AND - Will display products from all of the chosen tags.', 'padma-advanced' ),
						'IN'     => __( 'IN - Will display products with the chosen tags.', 'padma-advanced' ),
						'NOT IN' => __( 'NOT IN - Will display products that are not in the chosen tags.', 'padma-advanced' ),
					),
				),

				'visibility'                 => array(
					'type'    => 'select',
					'name'    => 'visibility',
					'label'   => __( 'Visibility', 'padma-advanced' ),
					'tooltip' => __( 'Will display products based on the selected visibility.', 'padma-advanced' ),
					'default' => 'visible',
					'options' => array(
						'visible'  => __( 'Visible - Products visible on shop and search results.', 'padma-advanced' ),
						'catalog'  => __( 'Catalog - Products visible on the shop only, but not search results.', 'padma-advanced' ),
						'search'   => __( 'Search - Products visible in search results only, but not on the shop.', 'padma-advanced' ),
						'hidden'   => __( 'Hidden - Products that are hidden from both shop and search, accessible only by direct URL.', 'padma-advanced' ),
						'featured' => __( 'Featured - Products that are marked as Featured Products.', 'padma-advanced' ),
					),
				),

				'specific-category'          => array(
					'name'    => 'specific-category',
					'type'    => 'text',
					'label'   => __( 'Specific category', 'padma-advanced' ),
					'tooltip' => __( 'Retrieves products using the specified category slug.', 'padma-advanced' ),
				),

				'specific-tag'               => array(
					'name'    => 'specific-tag',
					'type'    => 'text',
					'label'   => __( 'Specific tag', 'padma-advanced' ),
					'tooltip' => __( 'Retrieves products using the specified tag slug.', 'padma-advanced' ),
				),

				'cat-operator'               => array(
					'type'    => 'select',
					'name'    => 'cat-operator',
					'label'   => __( 'Tag operator', 'padma-advanced' ),
					'tooltip' => __( 'Operator to compare category terms.', 'padma-advanced' ),
					'default' => 'IN',
					'options' => array(
						'AND'    => __( 'AND - Will display products that belong in all of the chosen categories.', 'padma-advanced' ),
						'IN'     => __( 'IN - Will display products within the chosen category.', 'padma-advanced' ),
						'NOT IN' => __( 'NOT IN - Will display products that are not in the chosen category.', 'padma-advanced' ),
					),
				),

				'ids'                        => array(
					'name'    => 'ids',
					'type'    => 'text',
					'label'   => __( 'Specific Ids', 'padma-advanced' ),
					'tooltip' => __( 'Will display products based on a comma-separated list of Post IDs.', 'padma-advanced' )
				),
			),
		);
	}

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

	/**
	 * Get posts attribute
	 *
	 * @return array
	 */
	public function get_attribute() {

		$attributes = array( '' => '' );

		if ( ! function_exists( 'wc_get_attribute_taxonomies' ) ) {
			return $attributes;
		}

		foreach ( \wc_get_attribute_taxonomies() as $key => $attribute ) {
			$attributes[ $attribute->attribute_name ] = $attribute->attribute_label;
		}
		return $attributes;
	}

}