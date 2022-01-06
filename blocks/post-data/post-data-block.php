<?php
/**
 * Post Data Blocks
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
 * Post Data Block
 */
class PadmaVisualElementsBlockPostData extends \PadmaBlockAPI {

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
		$this->id            = 've-postdata';
		$this->name          = __( 'Post Data', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockPostDataOptions';
		$this->description   = __( 'Allows to display various post fields, including post title, post content, modified date etc . ', 'padma-advanced' );
		$this->categories    = array( 'content' );
	}

	/**
	 * Init
	 */
	public function init() {

		if ( ! class_exists( 'Shortcodes_Ultimate' ) ) {
			return false;
		}

		if ( session_status() !== PHP_SESSION_ACTIVE ) {
			session_start();
		}
	}

	/**
	 * Setup Visual Editor elements.
	 */
	public function setup_elements() {

		$this->register_block_element(
			array(
				'id'       => 'content',
				'name'     => __( 'Content', 'padma-advanced' ),
				'selector' => '.ve-postdata',			
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'text',
				'name'     => __( 'Text', 'padma-advanced' ),
				'selector' => '.ve-postdata p',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h1',
				'name'     => __( 'Content h1', 'padma-advanced' ),
				'selector' => '.ve-postdata h1',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h2',
				'name'     => __( 'Content h2', 'padma-advanced' ),
				'selector' => '.ve-postdata h2',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h3',
				'name'     => __( 'Content h3', 'padma-advanced' ),
				'selector' => '.ve-postdata h3',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h4',
				'name'     => __( 'Content h4', 'padma-advanced' ),
				'selector' => '.ve-postdata h4',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h5',
				'name'     => __( 'Content h5', 'padma-advanced' ),
				'selector' => '.ve-postdata h5',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h6',
				'name'     => __( 'Content h6', 'padma-advanced' ),
				'selector' => '.ve-postdata h6',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-li',
				'name'     => __( 'Content li', 'padma-advanced' ),
				'selector' => '.ve-postdata li',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-a',
				'name'     => __( 'Content link', 'padma-advanced' ),
				'selector' => '.ve-postdata a',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-image',
				'name'     => __( 'Content image', 'padma-advanced' ),
				'selector' => '.ve-postdata image',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-figure',
				'name'     => __( 'Content figure', 'padma-advanced' ),
				'selector' => '.ve-postdata figure',
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

		global $post;

		$session_id = 've-postdata-post-id-' . $block['id'];

		if ( ! isset( $_SESSION[ $session_id ] ) && empty( $_SESSION[ $session_id ] ) ) {
			if ( $post->ID && is_null( $_SESSION[ $session_id ] ) ) {
				$_SESSION[ 've-postdata-post-id-' . $block['id'] ] = $post->ID;
			}
		}

		$field   = trim( parent::get_setting( $block, 'field', 'post_title' ) );
		$default = parent::get_setting( $block, 'default' );
		$before  = parent::get_setting( $block, 'before' );
		$after   = parent::get_setting( $block, 'after' );
		$post_id = ( parent::get_setting( $block, 'post-id' ) ) ? parent::get_setting( $block, 'post-id' ) : $post->ID;

		if ( ! $post_id && ! is_null( $_SESSION[ 've-postdata-post-id-' . $block['id'] ] ) ) {
			$post_id = $_SESSION[ 've-postdata-post-id-' . $block['id'] ];
		}

		$shortcode = '[su_post field="' . $field . '" post_id="' . $post_id . '"]';

		$html = '<div class="ve-postdata">' . do_shortcode( $shortcode ) . '</div>';

		echo $html;

	}
}
