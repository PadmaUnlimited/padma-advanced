<?php
/**
 * Spoiler Blocks
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
 * Spoiler Block
 */
class PadmaVisualElementsBlockSpoiler extends \PadmaBlockAPI {

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
		$this->id            = 'visual-elements-spoiler';	
		$this->name          = __( 'Spoiler', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockSpoilerOptions';
		$this->description   = __( 'Allows you to create blocks with hidden content – spoilers (toggles). Hidden content will be shown when block title will be clicked. You can specify different icons or even use different styles for each spoiler . ', 'padma-advanced' );
		$this->categories    = array( 'box' );
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
				'id'       => 'spoiler',
				'name'     => __( 'spoiler', 'padma-advanced' ),
				'selector' => '.su-spoiler',
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

		$spoilers  = parent::get_setting( $block, 'spoilers', array() );
		$shortcode = '';

		foreach ( $spoilers as $spoiler => $params ) {

			$title   = isset( $params['title'] ) ? $params['title'] : '';
			$open    = isset( $params['open'] ) ? $params['open'] : '';
			$style   = isset( $params['style'] ) ? $params['style'] : '';
			$icon    = isset( $params['icon'] ) ? $params['icon'] : '';
			$anchor  = isset( $params['anchor'] ) ? $params['anchor'] : '';
			$content = isset( $params['content'] ) ? $params['content'] : '';

			if ( is_null( $title ) ) {
				$title = 'Title';
			}

			if ( is_null( $open ) ) {
				$open = 'no';
			}

			if ( is_null( $style ) ) {
				$style = 'default';
			}

			if ( is_null( $icon ) ) {
				$icon = 'plus';
			}

			if ( is_null( $anchor ) ) {
				$anchor = 'none';
			}

			$html = do_shortcode( '[su_spoiler title="' . $title . '" open="' . $open . '" style="' . $style . '" icon="' . $icon . '" anchor="' . $anchor . '" class=""]' . $content . '[/su_spoiler]' );

			// remove inline CSS for color.
			$html = preg_replace( '(style=("|\Z)(.*?)("|\Z))', '', $html );

			$shortcode .= $html;

		}

		echo $shortcode;	

	}

}
