<?php
/**
 * Button Blocks
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
 * Button Block
 */
class PadmaVisualElementsBlockButton extends \PadmaBlockAPI {


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
		$this->id            = 'visual-elements-button';
		$this->name          = __( 'Button', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockButtonOptions';
		$this->description   = __( 'Allows create highly customizable buttons. You can change button style, colors, size, add an icon or description . ', 'padma-advanced' );
		$this->categories    = array( 'content' );
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
				'id'       => 'button',
				'name'     => __( 'Button', 'padma-advanced' ),
				'selector' => 'a.su-button',
				'states'   => array(
					'Hover'   => 'a.su-button:hover',
					'Clicked' => 'a.su-button:active',
				),
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'icon',
				'name'     => __( 'Icon', 'padma-advanced' ),
				'selector' => 'a.su-button span i',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'text',
				'name'     => __( 'Text', 'padma-advanced' ),
				'selector' => 'a.su-button span small',
				'states'   => array(
					'Hover'   => 'a.su-button span small:hover',
					'Clicked' => 'a.a.su-button span small:active',
				),
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

		if ( ! $block ){
			$block = \PadmaBlocksData::get_block( $block_id );
		}

		$css = '#block-' . $block_id . ' .su-button small{ opacity: 1 }';

		return $css;

	}

	/**
	 * Padma Content Method
	 *
	 * @param object $block Block.
	 * @return void
	 */
	public function content( $block ) {

		$url     = parent::get_setting( $block, 'url' );
		$target  = parent::get_setting( $block, 'target' );
		$style   = parent::get_setting( $block, 'style' );
		$icon    = parent::get_setting( $block, 'icon' );
		$desc    = parent::get_setting( $block, 'desc' );
		$onclick = parent::get_setting( $block, 'onclick' );
		$rel     = parent::get_setting( $block, 'rel' );
		$title   = parent::get_setting( $block, 'title' );

		$shortcode  = '[su_button url="' . $url . '" target="' . $target . '"';
		$shortcode .= ' style="' . $style . '"';

		if ( $icon && ! filter_var( $icon, FILTER_VALIDATE_URL ) ){
			$icon = 'icon:' . $icon;
		}

		$shortcode .= ' icon="' . $icon . '" desc="' . $desc . '" onclick="' . $onclick . '" rel="' . $rel . '" title="' . $title . '" class="desc"]';

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

		$style = parent::get_setting( $block, 'style' );

		if ( 'none' !== $style ) {

			/* CSS */
			\PadmaCompiler::register_file(
				array(
					'name'         => 've-button-css',
					'format'       => 'css',
					'fragments'    => array(
						__DIR__ . '/button.css',
					),
					'dependencies' => array(),
					'enqueue'      => true,
				)
			);
		}
	}
}
