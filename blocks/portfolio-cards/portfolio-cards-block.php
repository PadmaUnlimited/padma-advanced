<?php
/**
 * PortfolioCards Blocks
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
 * PortfolioCards Block
 */
class PadmaVisualElementsBlockPortfolioCards extends \PadmaBlockAPI {

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
		$this->id            = 've-portfolio-cards';	
		$this->name          = __( 'PortfolioCards', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockPortfolioCardsOptions';	
		$this->description   = __( 'Allows you to create blocks with hidden posts content. Hidden content will be shown when block title will be clicked. You can specify different icons or even use different styles for each spoiler.', 'padma-advanced' );
		$this->categories    = array( 'box', 'content', 'dynamic-content' );
	}

	/**
	 * Init
	 */
	public function init() {
	}


	/**
	 * Add scripts to admin
	 *
	 * @return void
	 */
	public static function portfolio_admin_scripts() {

		$path = str_replace( '/blocks', '', plugin_dir_url( __FILE__ ) );

		/* JS */
		wp_enqueue_script( 'padma-ve-portfolio-cards', $path . 'js/portfolio-cards.js', array( 'jquery' ), PADMA_ADVANCED_VERSION, true );

	}

	/**
	 * Padma Content Method
	 *
	 * @param object $block Block.
	 * @return void
	 */
	public function content( $block ) {

		$html_content        = '';
		$portfolio_classes   = '';
		$columns 			 = parent::get_setting( $block, 'columns', 4 );
		$content_to_show     = parent::get_setting( $block, 'content-to-show', 'excerpt' );
		$post_type           = ( isset( $block['settings']['post-type'] ) ) ? $block['settings']['post-type'] : ['post'];
		$posts               = \PadmaQuery::get_posts( $block );
		$categories_in_posts = array();

		$custom_length        = ( ! empty( $block['settings']['custom-length'] ) ) ? $block['settings']['custom-length'] : 'no';
		$custom_length_number = ( ! empty( $block['settings']['custom-length-number'] ) ) ? $block['settings']['custom-length-number'] : 15;

		// Columns.
		$portfolio_classes .= 'portfolio-' . $columns;

		$html_content .= '<div id="portfolio-cards" class="portfolio-cards">';

		$alt_counter = 1;
		foreach ( $posts as $key => $post ) {

			$id     = $post->ID;
			$image  = get_the_post_thumbnail_url( $post->ID );
			$desc   = $post->post_excerpt;
			$title  = $post->post_title;
			$url    = get_permalink( $post->ID );
			$date   = date( 'M d, Y', strtotime( $post->post_date ) );
			$author = get_the_author_meta( 'display_name', $post->post_author );

			switch ( $content_to_show ) {

				case 'content':
					$shortcode = $post->post_content;
					break;

				case 'excerpt':
					$shortcode = $post->post_excerpt;
					break;

				case 'none':
					$shortcode = '';
					break;

				default:
					$shortcode = $post->post_content;
					break;
			}

			if ( 'yes' === $custom_length ) {
				$content = wp_trim_words( do_shortcode( $shortcode ), $custom_length_number );
			} else {
				$content = do_shortcode( $shortcode );
			}

			// Categories.
			$item_classes = '';

			if ( 'product' === $post_type || in_array( 'product', $post_type, true ) ) {
				$post_categories = wp_get_post_terms( $id, 'product_cat' );
			} else {
				$post_categories = get_the_category( $id );
			}

			// save categories ids to use later.
			foreach ( $post_categories as $key => $term ) {
				$categories_in_posts[] = $term->term_id;
			}

			foreach ( $post_categories as $key => $category ) {
				$item_classes .= 'pf-' . $category->slug;
			}

			++$alt_counter;

			$html_content .= '<div class="' . $portfolio_classes . '">';
			$html_content .= '	<a class="portfolio-item" href="' . $url . '" style="background-image:url(' . $image . ')">';
			$html_content .= '		<span class="caption">';
			$html_content .= '      	<span class="caption-content">';
			$html_content .= '        		<h2>' . $title . '</h2>';
			$html_content .= '        		<p class="">' . $content . '</p>';
			$html_content .= '      	</span>';
			$html_content .= '    	</span>';
			$html_content .= '  </a>';
			$html_content .= '</div>';

		}

		$html_content .= '</div>';

		echo $html_content;
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

		$path = str_replace( '/blocks/portfolio-cards', '', plugin_dir_url( __FILE__ ) );

		/* JS */
		wp_enqueue_script( 'padma-ve-portfolio-cards', $path . 'js/portfolio-cards.js', array( 'jquery' ), PADMA_ADVANCED_VERSION, true );

		/* CSS */
		wp_enqueue_style( 'padma-ve-portfolio-cards', $path . 'css/portfolio-cards.css', array(), PADMA_ADVANCED_VERSION, 'all' );
	}

}
