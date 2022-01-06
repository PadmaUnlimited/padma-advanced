<?php
/**
 * Dailymotion Blocks
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
 * Dailymotion Block
 */
class PadmaVisualElementsBlockDailymotion extends \PadmaBlockAPI {

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
		$this->id            = 'visual-elements-dailymotion';	
		$this->name          = 'Dailymotion';
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockDailymotionOptions';
		$this->description   = __( 'Allows you to insert responsive Dailymotion videos . ', 'padma-advanced' );
		$this->categories    = array( 'media' );
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
				'id'       => 'dailymotion',
				'name'     => 'Dailymotion',
				'selector' => 'div.su-dailymotion',
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

		$url        = parent::get_setting( $block, 'url' );
		$width      = parent::get_setting( $block, 'width' );
		$height     = parent::get_setting( $block, 'height' );
		$responsive = parent::get_setting( $block, 'responsive' );
		$autoplay   = parent::get_setting( $block, 'autoplay' );
		$background = parent::get_setting( $block, 'background' );
		$foreground = parent::get_setting( $block, 'foreground' );
		$highlight  = parent::get_setting( $block, 'highlight' );
		$logo       = parent::get_setting( $block, 'logo' );
		$quality    = parent::get_setting( $block, 'quality' );
		$related    = parent::get_setting( $block, 'related' );
		$info       = parent::get_setting( $block, 'info' );

		if ( $width < 200 ) {
			$width = 200;
		}

		if ( $width > 1600 ) {
			$width = 1600;
		}

		if ( $height < 200 ) {
			$height = 200;
		}

		if ( $height > 1600 ) {
			$height = 1600;
		}

		if ( ! $responsive ) {
			$responsive = 'yes';
		}

		if ( ! $autoplay ) {
			$autoplay = 'no';
		}

		if ( ! $background ) {
			$background = '#FFC300';
		}

		if ( ! $foreground ) {
			$foreground = '#F7FFFD';
		}

		if ( ! $highlight ) {
			$highlight = '#171D1B';
		}

		if ( ! $logo ) {
			$logo = 'yes';
		}

		if ( ! in_array( $quality, array( '240', '380', '480', '720', '1080' ), true ) || ! $quality ) {
			$quality = '380';
		}

		if ( ! $related ) {
			$related = 'yes';
		}

		if ( ! $info ) {
			$info = 'yes';
		}

		echo do_shortcode( '[su_dailymotion url="' . $url . '" width="' . $width . '" height="' . $height . '" responsive="' . $responsive . '" autoplay="' . $autoplay . '" background="' . $background . '" foreground="' . $foreground . '" highlight="' . $highlight . '" logo="' . $logo . '" quality="' . $quality . '" related="' . $related . '" info="' . $info . '" class=""]' );

	}

}
