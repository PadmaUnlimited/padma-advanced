<?php
/**
 * Post Data Blocks
 *
 * @link       https://padmaunlimited.com
 * @since      1.0.0
 *
 * @package    Padma_Advanced
 * @subpackage Padma_Advanced/public
 * @author     Padma Team <support@padmaunlimited.com>
 */

namespace Padma_Advanced;

/**
 * Products Block
 */
class PadmaStoreBlockProducts extends \PadmaBlockAPI {

	/**
	 * Block id
	 *
	 * @var string $id
	 */
	public $id;

	/**
	 * Block Name
	 *
	 * @var string $name
	 */
	public $name;

	/**
	 * Options Class
	 *
	 * @var string $options_class
	 */
	public $options_class;

	/**
	 * Block Description
	 *
	 * @var string $description
	 */
	public $description;

	/**
	 * Block Categories
	 *
	 * @var array $categories
	 */
	public $categories;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->id            = 'store-products';
		$this->name          = 'Products';
		$this->options_class = 'Padma_Advanced\PadmaStoreBlockProductsOptions';
		$this->description   = __( 'Allows you to display products by post ID, SKU, categories, attributes, with support for pagination, random sorting, and product tags', 'padma-advanced' );
		$this->categories    = array( 'store', 'content', 'dynamic-content' );
	}

	/**
	 * Init
	 */
	public function init() {

		if ( ! class_exists( 'WooCommerce' ) ) {
			return false;
		}

	}

	/**
	 * Setup Visual Editor elements.
	 */
	public function setup_elements() {

		$this->register_block_element(
			array(
				'id'       => 'products-container',
				'name'     => 'Products container',
				'selector' => '.woocommerce',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'notices',
				'name'     => 'Notices',
				'selector' => '.woocommerce-notices-wrapper',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'result-count',
				'name'     => 'Result count',
				'selector' => '.woocommerce-result-count',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'ordering',
				'name'     => 'Ordering',
				'selector' => '.woocommerce-ordering',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'products-on-page-form',
				'name'     => 'Products on page',
				'selector' => '.woocommerce > div > form',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'ordering-select',
				'name'     => 'Ordering select',
				'selector' => '.woocommerce-ordering select',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'products',
				'name'     => 'Products',
				'selector' => '.products',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'single-product',
				'name'     => 'Single product',
				'selector' => '.products .product',
				'states'   => array(
					'Product Hover'        => '.products .product:hover',
					'Button when Hover'    => '.products .product:hover a:not(.added_to_cart)',
					'Button added to cart' => '.products .product a.added_to_cart',
				),
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'single-product-button',
				'name'     => 'Button',
				'selector' => '.product a.button',
				'states'   => array(
					'Hover' => '.product a.button:hover',
				),
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'onsale',
				'name'     => 'Sale',
				'selector' => '.products .product .onsale',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'image',
				'name'     => 'Image',
				'selector' => '.products .product img',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'title',
				'name'     => 'Title',
				'selector' => '.products .product h2',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'price',
				'name'     => 'Price',
				'selector' => '.products .product .price',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'amount',
				'name'     => 'Amount',
				'selector' => '.products .product .amount',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'currency-symbol',
				'name'     => 'Currency symbol',
				'selector' => '.products .product .woocommerce-Price-currencySymbol',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'pagination',
				'name'     => 'Pagination',
				'selector' => '.woocommerce-pagination',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'page-numbers',
				'name'     => 'Page numbers',
				'selector' => '.page-numbers',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'page-single-number',
				'name'     => 'Number',
				'selector' => '.page-numbers li',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'page-single-number-span',
				'name'     => 'Number span',
				'selector' => '.page-numbers li .page-numbers',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'page-single-number-span-current',
				'name'     => 'Current Number span',
				'selector' => '.page-numbers li .page-numbers.current',
			)
		);
	}

	/**
	 * Padma Content Method
	 *
	 * @param object $block Block.
	 * @return void
	 */
	public function content( $block ) {

		$style = parent::get_setting( $block, 'style', 'default' );

		$limit             = parent::get_setting( $block, 'limit', -1 );
		$columns           = parent::get_setting( $block, 'columns', 4 );
		$paginate          = parent::get_setting( $block, 'paginate', 'false' );
		$orderby           = parent::get_setting( $block, 'orderby', 'title' );
		$skus              = parent::get_setting( $block, 'skus', '' );
		$category          = parent::get_setting( $block, 'category', array() );
		$tag               = parent::get_setting( $block, 'tag', array() );
		$order             = parent::get_setting( $block, 'order', 'ASC' );
		$class             = parent::get_setting( $block, 'class', '' );
		$custom_retrieve   = parent::get_setting( $block, 'custom-retrieve', 'normal' );
		$attribute         = parent::get_setting( $block, 'attribute', '' );
		$terms             = parent::get_setting( $block, 'terms', '' );
		$terms_operator    = parent::get_setting( $block, 'terms-operator', 'IN' );
		$tag_operator      = parent::get_setting( $block, 'tag-operator', 'IN' );
		$visibility        = parent::get_setting( $block, 'visibility', 'visible' );
		$specific_category = parent::get_setting( $block, 'specific-category', '' );
		$specific_tag      = parent::get_setting( $block, 'specific-tag', '' );
		$cat_operator      = parent::get_setting( $block, 'cat-operator', 'IN' );
		$ids               = parent::get_setting( $block, 'ids', '' );

		$shortcode  = '[products ';
		$shortcode .= 'limit="' . $limit . '" ';
		$shortcode .= 'columns="' . $columns . '" ';

		if ( $paginate ) {
			$shortcode .= 'paginate="true" ';
		} else {
			$shortcode .= 'paginate="false" ';
		}

		$shortcode .= 'orderby="' . $orderby . '" ';

		if ( strlen( $skus ) > 0 ) {
			$shortcode .= 'skus="' . $skus . '" ';
		}

		$categories = '';
		foreach ( $category as $key => $value ) {
			$categories .= $value . ',';
		}

		if ( strlen( $categories ) > 0 ) {
			$categories = rtrim( $categories, ',' );
			$shortcode .= 'category="' . $categories . '" ';
		}

		$tags = '';
		if ( is_array( $tag ) ) {
			foreach ( $tag as $key => $value ) {
				$tags .= $value . ',';
			}
		}

		if ( strlen( $tags ) > 0 ) {

			$tags = rtrim( $tags, ',' );

			$shortcode .= 'tag="' . $tags . '" ';
			$shortcode .= 'tag_operator="' . $tag_operator . '" ';

		}

		$shortcode .= 'order="' . $order . '" ';

		if ( strlen( $class ) > 0 ) {
			$shortcode .= 'class="' . $class . '" ';
		}

		if ( 'normal' !== $custom_retrieve ) {

			switch ( $custom_retrieve ) {

				case 'on_sale':
					$shortcode .= 'on_sale="true" ';
					break;

				case 'best_selling':
					$shortcode .= 'best_selling="true" ';
					break;

				case 'top_rated':
					$shortcode .= 'top_rated="true" ';
					break;
			}
		}

		if ( strlen( $attribute ) > 0 && strlen( $terms ) > 0 ) {
			$shortcode .= 'attribute="' . $attribute . '" terms="' . $terms . '" ';
			$shortcode .= 'terms_operator="' . $terms_operator . '" ';
		}

		$shortcode .= 'visibility="' . $visibility . '" ';

		if ( strlen( $specific_category ) > 0 ) {
			$shortcode .= 'specific_category="' . $specific_category . '" ';
		}

		if ( strlen( $specific_tag ) > 0 ) {
			$shortcode .= 'specific_tag="' . $specific_tag . '" ';
		}

		$shortcode .= 'cat_operator="' . $cat_operator . '" ';

		if ( strlen( $ids ) > 0 ) {
			$shortcode .= 'ids="' . $ids . '" ';
		}

		$shortcode .= ']';

		echo do_shortcode( $shortcode );
	}

}
