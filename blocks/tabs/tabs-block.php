<?php
/**
 * Tabs Blocks
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
 * Tabs Block
 */
class PadmaVisualElementsBlockTabs extends \PadmaBlockAPI {
	
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
		$this->id            = 'visual-elements-tabs';
		$this->name          = __( 'Tabs', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockTabsOptions';
		$this->description   = __( 'Allows you to divide your content with horizontal or vertical tabs. You can specify which tab will be selected by default and turn any tab into link. You can use any HTML code or even other shortcodes as a content . ', 'padma-advanced' );
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
				'id'       => 'tabs',
				'name'     => __( 'tabs', 'padma-advanced' ),
				'selector' => 'div.su-tabs',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'navs',
				'name'     => __( 'navs', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-nav',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'title',
				'name'     => __( 'Title', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-nav span',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'panes',
				'name'     => __( 'Panes', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-panes',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'pane',
				'name'     => __( 'Pane', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'p',
				'name'     => __( 'Text', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane p',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'a',
				'name'     => __( 'Link', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane a',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'h1',
				'name'     => __( 'Header 1', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 1',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'h2',
				'name'     => __( 'Header 2', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 2',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'h3',
				'name'     => __( 'Header 3', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 3',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'h4',
				'name'     => __( 'Header 4', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 4',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'h5',
				'name'     => __( 'Header 5', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 5',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'h6',
				'name'     => __( 'Header 6', 'padma-advanced' ),
				'selector' => 'div.su-tabs .su-tabs-panes .su-tabs-pane 6',
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

		$style    = ( parent::get_setting( $block, 'style' ) ) ? parent::get_setting( $block, 'style' ) : 'default';
		$active   = ( parent::get_setting( $block, 'active' ) ) ? parent::get_setting( $block, 'active' ) : 1;
		$vertical = parent::get_setting( $block, 'vertical' );
		$tabs     = parent::get_setting( $block, 'tabs', array() );

		if ( 'yes' === $vertical ) {
			$shortcode = '[su_tabs vertical="' . $vertical . '"]';
		} else {
			$shortcode = '[su_tabs]';
		}

		foreach ( $tabs as $tab => $params ) {

			$title    = isset( $params['title'] ) ? $params['title'] : '';
			$disabled = isset( $params['disabled'] ) ? $params['disabled'] : '';
			$anchor   = isset( $params['anchor'] ) ? $params['anchor'] : '';
			$url      = isset( $params['url'] ) ? $params['url'] : '';
			$target   = isset( $params['target'] ) ? $params['target'] : '';
			$content  = isset( $params['content'] ) ? $params['content'] : '';

			$shortcode .= '[su_tab ';
			$shortcode .= 'title="' . $title . '" ';
			$shortcode .= 'disabled="' . $disabled . '" ';
			$shortcode .= 'anchor="' . $anchor . '" ';
			$shortcode .= 'url="' . $url . '" ';
			$shortcode .= 'target="' . $target . '" ';
			$shortcode .= ']';
			$shortcode .= $content;
			$shortcode .= '[/su_tab]';

		}

		$shortcode .= '[/su_tabs]';

		echo do_shortcode( $shortcode );

	}

}
