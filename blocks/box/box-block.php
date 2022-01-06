<?php
/**
 * Box Blocks
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
 * Box Block
 */
class PadmaVisualElementsBlockBox extends \PadmaBlockAPI {

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

		$this->id              = 've-box';
		$this->name            = __( 'Box', 'padma-advanced' );
		$this->options_class   = 'Padma_Advanced\PadmaVisualElementsBlockBoxOptions';
		$this->description     = __( 'Allows you to create boxes with colorful titles. You can easily change box appearance. Also, you can place any HTML code or even other shortcodes within it . ', 'padma-advanced' );
		$this->categories      = array( 'content' );
		$this->inline_editable = array( 'block-title', 'block-subtitle', 'su-box-title' );

		$this->inline_editable_equivalences = array( 'su-box-title' => 'title' );
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
				'id'       => 'box',
				'name'     => __( 'Box', 'padma-advanced' ),
				'selector' => 'div.su-box',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'title',
				'name'     => __( 'Title', 'padma-advanced' ),
				'selector' => '.su-box-title',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content',
				'name'     => __( 'Content', 'padma-advanced' ),
				'selector' => '.su-box-content',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-text',
				'name'     => __( 'Content text', 'padma-advanced' ),
				'selector' => '.su-box-content p',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h1',
				'name'     => __( 'Content h1', 'padma-advanced' ),
				'selector' => '.su-box-content h1',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h2',
				'name'     => __( 'Content h2', 'padma-advanced' ),
				'selector' => '.su-box-content h2',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h3',
				'name'     => __( 'Content h3', 'padma-advanced' ),
				'selector' => '.su-box-content h3',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h4',
				'name'     => __( 'Content h4', 'padma-advanced' ),
				'selector' => '.su-box-content h4',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h5',
				'name'     => __( 'Content h5', 'padma-advanced' ),
				'selector' => '.su-box-content h5',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h6',
				'name'     => __( 'Content h6', 'padma-advanced' ),
				'selector' => '.su-box-content h6',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-li',
				'name'     => __( 'Content li', 'padma-advanced' ),
				'selector' => '.su-box-content li',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-a',
				'name'     => __( 'Content link', 'padma-advanced' ),
				'selector' => '.su-box-content a',
			)
		);

	}

	/**
	 * Dynamic_css function
	 *
	 * @param string  $block_id Block ID.
	 * @param boolean $block Block Object.
	 * @return string
	 */
	public static function dynamic_css( $block_id, $block = false ) {

		if ( ! $block ) {
			$block = \PadmaBlocksData::get_block($block_id);
		}
		return '';
	}

	/**
	 * Padma Content Method
	 *
	 * @param object $block Block.
	 * @return void
	 */
	public function content( $block ) {

		$style   = parent::get_setting( $block, 'style', 'default' );
		$title   = parent::get_setting( $block, 'title' );
		$content = parent::get_setting( $block, 'content' );
		$radius  = parent::get_setting( $block, 'radius' );

		if ( $radius < 0 ) {
			$radius = 1;
		}

		if ( $radius > 20 ){
			$radius = 20;
		}

		$shortcode  = '[su_box title="' . $title . '" style="' . $style . '" radius="' . $radius . '" class="title"]';
		$shortcode .= $content;
		$shortcode .= '[/su_box]';

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

		/* CSS */
		\PadmaCompiler::register_file(
			array(
				'name'         => 've-box-css',
				'format'       => 'css',
				'fragments'    => array(
					__DIR__ . '/box.css',
				),
				'dependencies' => array(),
				'enqueue'      => true,
			)
		);
	}
}
