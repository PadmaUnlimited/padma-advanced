<?php
/**
 * Accordion Blocks
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
 * Accordion Block
 */
class PadmaVisualElementsBlockAccordion extends \PadmaBlockAPI {

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

		$this->id            = 'visual-elements-accordion';
		$this->name          = __( 'Accordion', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockAccordionOptions';
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
				'name'     => __( 'Spoiler', 'padma-advanced' ),
				'selector' => '.su-spoiler',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-title',
				'name'     => __( 'Spoiler Title', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-title',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-icon',
				'name'     => __( 'Spoiler icon', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-icon',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-title',
				'name'     => __( 'Spoiler Title', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-title',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-content',
				'name'     => __( 'Spoiler content', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-content-p',
				'name'     => __( 'Spoiler content paragraph', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content p',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-h1',
				'name'     => __( 'Spoiler h1', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content h1',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-h2',
				'name'     => __( 'Spoiler h2', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content h2',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-h3',
				'name'     => __( 'Spoiler h3', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content h3',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-h2',
				'name'     => __( 'Spoiler h2', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content h2',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-h4',
				'name'     => __( 'Spoiler h4', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content h4',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-h5',
				'name'     => __( 'Spoiler h5', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content h5',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-h6',
				'name'     => __( 'Spoiler h6', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content h6',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-ul',
				'name'     => __( 'Spoiler list', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content ul',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-ol',
				'name'     => __( 'Spoiler list', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content ol',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-li',
				'name'     => __( 'Spoiler list item', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content li',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-span',
				'name'     => __( 'Spoiler span', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content span',
			)
		);
		$this->register_block_element(
			array(
				'id'       => 'spoiler-a',
				'name'     => __( 'Spoiler link', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler-content a',
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
			$block = \PadmaBlocksData::get_block( $block_id );
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

		$accordion_class = parent::get_setting( $block, 'accordion-class', array() );

		if ( empty( $accordion_class ) ) {
			$accordion_class = '';
		}

		$spoilers  = parent::get_setting( $block, 'spoilers', array() );
		$shortcode = '[su_accordion class=' . $accordion_class . ']';

		foreach ( $spoilers as $spoiler => $params ) {

			$title   = isset( $params['title'] ) ? $params['title'] : '';
			$open    = isset( $params['open'] ) ? $params['open'] : '';
			$style   = isset( $params['style'] ) ? $params['style'] : '';
			$icon    = isset( $params['icon'] ) ? $params['icon'] : '';
			$anchor  = isset( $params['anchor'] ) ? $params['anchor'] : '';
			$content = isset( $params['content'] ) ? $params['content'] : '';

			if ( is_null( $title ) ) {
				$title = __( 'Title', 'padma-advanced' );
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

			$shortcode .= sprintf(
				'[su_spoiler title="%s" open="%s" style="%s" icon="%s" anchor="%s" class=""]%s[/su_spoiler]',
				$title,
				$open,
				$style,
				$icon,
				$anchor,
				$content
			);
		}

		$shortcode .= '[/su_accordion]';

		$html = do_shortcode( $shortcode );

		// remove inline CSS for color.
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
	}

}
