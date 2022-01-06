<?php
/**
 * Block class
 *
 * @package Padma_Advanced
 */

namespace Padma_Advanced;


class PadmaStoreBlockAccount extends \PadmaBlockAPI {


	public $id;
	public $name;
	public $options_class;
	public $description;
	public $categories;
	

	public function __construct(){
		
		$this->id 				= 'store-account';	
		$this->name 			= 'My Account';
		$this->options_class 	= 'Padma_Advanced\PadmaStoreBlockAccountOptions';	
		$this->description 	= 'Shows the ‘my account’ section where the customer can view past orders and update their information.';
		$this->categories 		= array('store','content','dynamic-content');
	}
	
	public function setup_elements() {

		$this->register_block_element(array(
			'id' => 'products-container',
			'name' => 'Account container',
			'selector' => '.woocommerce',
		));

		$this->register_block_element(array(
			'id' => 'notices',
			'name' => 'Notices',
			'selector' => '.woocommerce-notices-wrapper',
		));

		$this->register_block_element(array(
			'id' => 'result-count',
			'name' => 'Result count',
			'selector' => '.woocommerce-result-count',
		));

		$this->register_block_element(array(
			'id' => 'ordering',
			'name' => 'Ordering',
			'selector' => '.woocommerce-ordering',
		));

		$this->register_block_element(array(
			'id' => 'products-on-page-form',
			'name' => 'Account on page',
			'selector' => '.woocommerce > div > form',
		));

		$this->register_block_element(array(
			'id' => 'ordering-select',
			'name' => 'Ordering select',
			'selector' => '.woocommerce-ordering select',
		));

		$this->register_block_element(array(
			'id' => 'products',
			'name' => 'Account',
			'selector' => '.products',
		));

		$this->register_block_element(array(
			'id' => 'single-product',
			'name' => 'Single product',
			'selector' => '.products .product',
			'states' => array(
				'Product Hover' => '.products .product:hover',
				'Button when Hover' => '.products .product:hover a:not(.added_to_cart)',
				'Button added to cart' => '.products .product a.added_to_cart',
			)
		));

		$this->register_block_element(array(
			'id' => 'single-product-button',
			'name' => 'Button',
			'selector' => '.product a.button',
			'states' => array(
				'Hover' => '.product a.button:hover',
				//'Button Hover' => '.products .product a:hover',
			)
		));

		$this->register_block_element(array(
			'id' => 'onsale',
			'name' => 'Sale',
			'selector' => '.products .product .onsale',
		));

		$this->register_block_element(array(
			'id' => 'image',
			'name' => 'Image',
			'selector' => '.products .product img',
		));

		$this->register_block_element(array(
			'id' => 'title',
			'name' => 'Title',
			'selector' => '.products .product h2',
		));

		$this->register_block_element(array(
			'id' => 'price',
			'name' => 'Price',
			'selector' => '.products .product .price',
		));

		$this->register_block_element(array(
			'id' => 'amount',
			'name' => 'Amount',
			'selector' => '.products .product .amount',
		));

		$this->register_block_element(array(
			'id' => 'currency-symbol',
			'name' => 'Currency symbol',
			'selector' => '.products .product .woocommerce-Price-currencySymbol',
		));

		$this->register_block_element(array(
			'id' => 'pagination',
			'name' => 'Pagination',
			'selector' => '.woocommerce-pagination',
		));

		$this->register_block_element(array(
			'id' => 'page-numbers',
			'name' => 'Page numbers',
			'selector' => '.page-numbers',
		));

		$this->register_block_element(array(
			'id' => 'page-single-number',
			'name' => 'Number',
			'selector' => '.page-numbers li',
		));

		$this->register_block_element(array(
			'id' => 'page-single-number-span',
			'name' => 'Number span',
			'selector' => '.page-numbers li .page-numbers',
		));

		$this->register_block_element(array(
			'id' => 'page-single-number-span-current',
			'name' => 'Current Number span',
			'selector' => '.page-numbers li .page-numbers.current',
		));
	}


	public static function dynamic_css($block_id, $block) {

		if ( !$block ) {
			$block = PadmaBlocksData::get_block($block_id);
		}

		
	}
	
	public function content($block) {
		
		$shortcode = '[woocommerce_my_account]';		

		echo do_shortcode($shortcode);
	}

	public static function enqueue_action($block_id, $block = false) {
	
	}

	
}	
