<?php
/**
 * Content to Tabs Blocks
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
 * Content to Tabs Block
 */
class PadmaVisualElementsBlockContentToTabs extends \PadmaBlockAPI {

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
		$this->id            = 've-content-to-tabs';
		$this->name          = __( 'Content to Tabs', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockContentToTabsOptions';
		$this->description   = __( 'Allows you to divide your content with horizontal or vertical tabs. You can specify which tab will be selected by default and turn any tab into a link . ', 'padma-advanced' );
		$this->categories    = array( 'box', 'content', 'dynamic-content' );
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
				'name'     => __( 'Tabs', 'padma-advanced' ),
				'selector' => '.su-tabs',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tabs-options',
				'name'     => __( 'Tab options', 'padma-advanced' ),
				'selector' => '.su-tabs-nav',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tabs-options-item',
				'name'     => __( 'Tab options item', 'padma-advanced' ),
				'selector' => '.su-tabs-nav span',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-panes',
				'name'     => __( 'Tab Panes', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-panes',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-panes-content',
				'name'     => __( 'Tab Pane content', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane',
			)
		);		

		$this->register_block_element(
			array(
				'id'       => 'tab-content-p',
				'name'     => __( 'Tab content paragraph', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane p',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-h1',
				'name'     => __( 'Tab h1', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane h1',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-h2',
				'name'     => __( 'Tab h2', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane h2',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-h3',
				'name'     => __( 'Tab h3', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane h3',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-h2',
				'name'     => __( 'Tab h2', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane h2',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-h4',
				'name'     => __( 'Tab h4', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane h4',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-h5',
				'name'     => __( 'Tab h5', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane h5',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-h6',
				'name'     => __( 'Tab h6', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane h6',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-ul',
				'name'     => __( 'Tab list', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane ul',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-ol',
				'name'     => __( 'Tab list', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane ol',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-li',
				'name'     => __( 'Tab list item', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane li',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'tab-span',
				'name'     => __( 'Tab span', 'padma-advanced' ),
				'selector' => '.su-tabs .su-tabs-pane span',
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

		$vertical    = parent::get_setting( $block, 'vertical', '' );
		$tabs_class  = parent::get_setting( $block, 'tabs-class', '' );
		$item_class  = parent::get_setting( $block, 'item-class', '' );
		$style       = parent::get_setting( $block, 'style', array() );
		$icon        = parent::get_setting( $block, 'icon', '' );
		$active      = parent::get_setting( $block, 'active', 0 );
		$post_link   = parent::get_setting( $block, 'post_link', '' );
		$item_target = parent::get_setting( $block, 'item-target', '' );

		$posts = \PadmaQuery::get_posts( $block );

		$shortcode = '[su_tabs class="' . $tabs_class . '" ';

		if ( 'yes' === $vertical ){
			$shortcode .= 'vertical="yes" ';
		}

		if ( ! $active || $active < 1 || ! is_numeric( $active ) ){
			$active = '1';
		}

		if ( $style ) {
			$shortcode .= 'style="' . $style . '" ';
		}

		$shortcode .= 'active="' . $active . '" ';
		$shortcode .= ']';

		foreach ( $posts as $key => $post ) {

			$id     = $post->ID;
			$image  = get_the_post_thumbnail_url( $post->ID );
			$desc   = $post->post_excerpt;
			$title  = $post->post_title;
			$url    = get_post_permalink( $post->ID );
			$date   = date( 'M d, Y', strtotime( $post->post_date ) );
			$author = get_the_author_meta( 'display_name', $post->post_author );

			// Open Tab.
			$shortcode .= '[su_tab title="' . $title . '" ';
			$shortcode .= 'anchor="' . $title . '" class="' . $item_class . '" ';

			if ( $post_link ) {
				$shortcode .= 'url="' . get_permalink( $id ) . '" ';
			}

			$shortcode .= 'target="' . $item_target . '"]';

			// Content.
			$shortcode .= $post->post_content;

			// Close Tab.
			$shortcode .= '[/su_tab]';

		}

		$shortcode .= '[/su_tabs]';
		echo do_shortcode( $shortcode );
	}

}
