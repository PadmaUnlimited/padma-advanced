<?php

/**
 * Content to Accordion Block
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
 * Content to Accordion Block
 */
class PadmaVisualElementsBlockContentToAccordion extends \PadmaBlockAPI {

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

		$this->id            = 've-content-to-accordion';
		$this->name          = __( 'Content to Accordion', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockContentToAccordionOptions';
		$this->description   = __( 'Allows you to create blocks with hidden posts content. Hidden content will be shown when block title will be clicked. You can specify different icons or even use different styles for each spoiler . ', 'padma-advanced' );
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
				'id'       => 'accordion',
				'name'     => __( 'Accordion', 'padma-advanced' ),
				'selector' => '.su-accordion',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'spoiler',
				'name'     => __( 'Spoiler', 'padma-advanced' ),
				'selector' => '.su-accordion .su-spoiler',
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
				'name'     => 'Spoiler list',
				'selector' => '.su-accordion .su-spoiler-content ol',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'spoiler-li',
				'name'     => 'Spoiler list item',
				'selector' => '.su-accordion .su-spoiler-content li',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'spoiler-span',
				'name'     => 'Spoiler span',
				'selector' => '.su-accordion .su-spoiler-content span',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'spoiler-a',
				'name'     => 'Spoiler link',
				'selector' => '.su-accordion .su-spoiler-content a',
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

		$accordion_class = parent::get_setting( $block, 'accordion-class', '' );
		$item_class      = parent::get_setting( $block, 'item-class', '' );
		$style           = parent::get_setting( $block, 'style', 'default' );
		$icon            = parent::get_setting( $block, 'icon', '' );
		$open            = parent::get_setting( $block, 'open', 0 );

		$posts = \PadmaQuery::get_posts( $block );

		$shortcode = '[su_accordion class="' . $accordion_class . '"]';

		$open_item = 1;
		foreach ( $posts as $key => $post ) {

			$id     = $post->ID;
			$image  = get_the_post_thumbnail_url( $post->ID );
			$desc   = $post->post_excerpt;
			$title  = apply_filters( 'padma_ve_content_to_accordion_title', $post->post_title, $post->ID );
			$url    = get_post_permalink( $post->ID );
			$date   = date( 'M d, Y', strtotime( $post->post_date ) );
			$author = get_the_author_meta( 'display_name', $post->post_author );

			// Open Spoiler.
			$shortcode .= '[su_spoiler title="' . $title . '" ';

			if ( $open_item === $open ) {
				$shortcode .= 'open="yes" ';
			} else {
				$shortcode .= 'open="no" ';
			}
			$shortcode .= 'style="' . $style . '" icon="' . $icon . '" anchor="' . $title . '" class="' . $item_class . '"]';

			// Content.
			$shortcode .= $post->post_content;

			// Close Spoiler.
			$shortcode .= '[/su_spoiler]';

			$open_item++;

		}

		$shortcode .= '[/su_accordion]';

		echo do_shortcode( $shortcode );
	}


	/**
	 * Register styles and scripts
	 *
	 * @param string  $block_id Block ID.
	 * @param boolean $block Is Block?.
	 * @return void
	 */
	public static function enqueue_action( $block_id, $block = false ) {}

}

