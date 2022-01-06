<?php

/**
 * Lightbox Blocks
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
 * Lightbox Block
 */
class PadmaVisualElementsBlockLightbox extends \PadmaBlockAPI {

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
		$this->id            = 've-lightbox';
		$this->name          = __( 'Lightbox', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockLightboxOptions';	
		$this->description   = __( 'Allows you to display various elements in a pop-up window. You can display an image, a web page, or any HTML content . ', 'padma-advanced' );
		$this->categories    = array( 'content' );

		$this->inline_editable = array( 'block-title', 'block-subtitle', 'su-lightbox' );	

		$this->inline_editable_equivalences = array( 'su-lightbox' => 'title' );
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
				'id'       => 'title',
				'name'     => __( 'Title', 'padma-advanced' ),
				'selector' => '.su-lightbox',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'title',
				'name'     => __( 'Title', 'padma-advanced' ),
				'selector' => '.su-lightbox',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content',
				'name'     => __( 'Content', 'padma-advanced' ),
				'selector' => 'div.su-lightbox-content',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-text',
				'name'     => __( 'Content text', 'padma-advanced' ),
				'selector' => '.su-lightbox-content p',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h1',
				'name'     => __( 'Content h1', 'padma-advanced' ),
				'selector' => '.su-lightbox-content h1',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h2',
				'name'     => __( 'Content h2', 'padma-advanced' ),
				'selector' => '.su-lightbox-content h2',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h3',
				'name'     => __( 'Content h3', 'padma-advanced' ),
				'selector' => '.su-lightbox-content h3',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h4',
				'name'     => __( 'Content h4', 'padma-advanced' ),
				'selector' => '.su-lightbox-content h4',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h5',
				'name'     => __( 'Content h5', 'padma-advanced' ),
				'selector' => '.su-lightbox-content h5',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h6',
				'name'     => __( 'Content h6', 'padma-advanced' ),
				'selector' => '.su-lightbox-content h6',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-li',
				'name'     => __( 'Content li', 'padma-advanced' ),
				'selector' => '.su-lightbox-content li',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-a',
				'name'     => __( 'Content link', 'padma-advanced' ),
				'selector' => '.su-lightbox-content a',
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

		$type   = parent::get_setting( $block, 'type', 'image' );
		$title  = parent::get_setting( $block, 'title' );
		$image  = parent::get_setting( $block, 'image' );
		$iframe = parent::get_setting( $block, 'iframe' );
		$inline = parent::get_setting( $block, 'inline' );

		$shortcode = '[su_lightbox ';

		switch ( $type ) {
			case 'image':
				$shortcode .= 'type="image" src="' . $image . '" class="title"]' . $title . '[/su_lightbox]';
				break;

			case 'iframe':
				$shortcode .= 'type="iframe" src="' . $iframe . '" class="title"]' . $title . '[/su_lightbox]';
				break;

			case 'inline':
				$shortcode .= 'type="inline" src="#' . $block['id'] . '" class="title"] ' . $title . ' [/su_lightbox]';
				$shortcode .= '[su_lightbox_content id="#' . $block['id'] . '"]' . $inline . '[/su_lightbox_content]';
				break;

			default:
				$content = 'none';
				break;
		}

		$html = do_shortcode( $shortcode );

		// remove inline CSS.
		$html = preg_replace( '(style=("|\Z)(.*?)("|\Z))', '', $html );

		echo $html;

	}

	/**
	 * Register styles and scripts
	 *
	 * @param string  $block_id Block ID.
	 * @param boolean $block Is Block?.
	 * @return void
	 */
	public static function enqueue_action( $block_id, $block = false ) {

		if ( ! $block ) {
			$block = \PadmaBlocksData::get_block( $block_id );
		}

		$path = str_replace( '/blocks/lightbox', '', plugin_dir_path( __FILE__ ) );

		/* CSS */
		\PadmaCompiler::register_file(
			array(
				'name'         => 've-lightbox-css',
				'format'       => 'css',
				'fragments'    => array(
					$path . 'css/lightbox.css',
				),
				'dependencies' => array(),
				'enqueue'      => true,
			)
		);
	}
}
