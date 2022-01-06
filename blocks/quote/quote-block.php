<?php
/**
 * Quote Blocks
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
 * Quote Block
 */
class PadmaVisualElementsBlockQuote extends \PadmaBlockAPI {
	
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
	 * Inline editable fields
	 *
	 * @var array $inline_editable;
	 */
	public $inline_editable;

	/**
	 * Inline editable fields equivalences
	 *
	 * @var array $inline_editable_equivalences
	 */
	public $inline_editable_equivalences;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->id            = 've-quote';
		$this->name          = __( 'Quote', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockQuoteOptions';
		$this->description   = __( 'Allows you to insert quotes in your content. You can specify quote author and link . ', 'padma-advanced' );
		$this->categories    = array( 'content' );

		$this->inline_editable = array( 'block-title', 'block-subtitle', 'su-quote-inner' );

		$this->inline_editable_equivalences = array( 'su-quote-inner' => 'quote' );
	}

	/**
	 * Init
	 */
	public function init() {

		if ( ! class_exists( 'Shortcodes_Ultimate' ) ) {
			return false;
		}

	}

	/**
	 * Setup Visual Editor elements.
	 */
	public function setup_elements() {

		$this->register_block_element(
			array(
				'id'       => 'quote',
				'name'     => __( 'quote', 'padma-advanced' ),
				'selector' => 'div.su-quote',			
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'quote-pre-img',
				'name'     => __( 'quote pre-img', 'padma-advanced' ),
				'selector' => 'div.su-quote:before',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'quote-post-img',
				'name'     => __( 'quote post-img', 'padma-advanced' ),
				'selector' => 'div.su-quote:after',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'quote-content',
				'name'     => __( 'quote content', 'padma-advanced' ),
				'selector' => 'div.su-quote .su-quote-inner',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'quote-cite',
				'name'     => __( 'quote cite', 'padma-advanced' ),
				'selector' => 'div.su-quote .su-quote-inner .su-quote-cite',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'quote-cite-link',
				'name'     => __( 'quote cite link', 'padma-advanced' ),
				'selector' => 'div.su-quote .su-quote-inner .su-quote-cite a',
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
		$url   = parent::get_setting( $block, 'url' );
		$cite  = parent::get_setting( $block, 'cite' );
		$quote = parent::get_setting( $block, 'quote' );

		$shortcode  = '[su_quote url="' . $url . '" style="' . $style . '" cite="' . $cite . '" class="quote"]';
		$shortcode .= $quote;
		$shortcode .= '[/su_quote]';

		$html = do_shortcode( $shortcode );

		echo $html;

	}
}
