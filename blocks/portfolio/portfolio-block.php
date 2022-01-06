<?php
/**
 * Portfolio Blocks
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
 * Portfolio Block
 */
class PadmaVisualElementsBlockPortfolio extends \PadmaBlockAPI {

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
		$this->id            = 've-portfolio';
		$this->name          = __( 'Portfolio', 'padma-advanced' );
		$this->options_class = 'Padma_Advanced\PadmaVisualElementsBlockPortfolioOptions';
		$this->description   = __( 'Allows you to create blocks with hidden posts content. Hidden content will be shown when block title will be clicked. You can specify different icons or even use different styles for each spoiler. ', 'padma-advanced' );
		$this->categories    = array( 'box', 'content', 'dynamic-content' );
	}

	/**
	 * Init
	 */
	public function init() {}


	/**
	 * Add scripts to admin
	 *
	 * @return void
	 */
	public static function portfolio_admin_scripts() {

		$path = str_replace( '/blocks', '', plugin_dir_url( __FILE__ ) );

		// JS.
		wp_enqueue_script( 'padma-ve-isotope', $path . 'js/isotope.js', array( 'jquery' ), PADMA_ADVANCED_VERSION, true );
		wp_enqueue_script( 'padma-ve-portfolio', $path . 'js/portfolio.js', array( 'jquery', 'padma-ve-isotope' ), PADMA_ADVANCED_VERSION, true );

	}

	/**
	 * Setup Visual Editor elements.
	 */
	public function setup_elements() {

		$this->register_block_element(
			array(
				'id'       => 'portfolio-filter',
				'name'     => __( 'Filter', 'padma-advanced' ),
				'selector' => '.portfolio-filter',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'portfolio-filter-item',
				'parent'   => 'portfolio-filter',
				'name'     => __( 'Filter item', 'padma-advanced' ),
				'selector' => '.portfolio-filter li',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'portfolio-filter-link',
				'parent'   => 'portfolio-filter',
				'name'     => __( 'Filter link', 'padma-advanced' ),
				'selector' => '.portfolio-filter li a',
				'states'   => array(
					'Hover'   => '.portfolio-filter li a:hover',
					'Clicked' => '.portfolio-filter li a:active',
				),
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'portfolio-active-item',
				'parent'   => 'portfolio-filter',
				'name'     => __( 'Active item', 'padma-advanced' ),
				'selector' => '.portfolio-filter li.activeFilter a',			
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'portfolio',
				'name'     => __( 'Portfolio', 'padma-advanced' ),
				'selector' => '.portfolio',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'article',
				'parent'   => 'portfolio',
				'name'     => __( 'Article', 'padma-advanced' ),
				'selector' => '.portfolio article.portfolio-item',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'image',
				'parent'   => 'portfolio',
				'name'     => __( 'Image', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-image',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'left-icon',
				'parent'   => 'portfolio',
				'name'     => __( 'Left icon', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-image .left-icon',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'right-icon',
				'parent'   => 'portfolio',
				'name'     => __( 'Right icon', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-image .right-icon',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'portfolio-desc',
				'parent'   => 'portfolio',
				'name'     => __( 'Description container', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'title',
				'parent'   => 'portfolio',
				'name'     => __( 'Article title', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc h3',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content',
				'parent'   => 'portfolio',
				'name'     => __( 'Content', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h1',
				'parent'   => 'portfolio',
				'name'     => __( 'Content H1', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description h1',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h2',
				'parent'   => 'portfolio',
				'name'     => __( 'Content H2', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description h2',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h3',
				'parent'   => 'portfolio',
				'name'     => __( 'Content H3', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description h3',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h4',
				'parent'   => 'portfolio',
				'name'     => __( 'Content H4', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description h4',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h5',
				'parent'   => 'portfolio',
				'name'     => __( 'Content H5', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description h5',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-h6',
				'parent'   => 'portfolio',
				'name'     => __( 'Content H6', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description h6',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-p',
				'parent'   => 'portfolio',
				'name'     => __( 'Content p', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description p',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-a',
				'parent'   => 'portfolio',
				'name'     => __( 'Content a', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description a',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-ul',
				'parent'   => 'portfolio',
				'name'     => __( 'Content ul', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description ul',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'content-ul-li',
				'parent'   => 'portfolio',
				'name'     => __( 'Content ul li', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .description ul li',
			)
		);

		$this->register_block_element(
			array(
				'id'       => 'button',
				'parent'   => 'portfolio',
				'name'     => __( 'Button', 'padma-advanced' ),
				'selector' => '.portfolio .portfolio-desc .button',
				'states'   => array(
					'Hover'   => '.portfolio .portfolio-desc .button:hover',
					'Clicked' => '.portfolio .portfolio-desc .button:active',
				),
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

		$html         = '';
		$html_filter  = '';
		$html_content = '';

		$portfolio_classes = '';
		$columns           = parent::get_setting( $block, 'columns', 4 );
		$show_filter       = parent::get_setting( $block, 'show-filter', 'no' );
		$filter_style      = parent::get_setting( $block, 'filter-style', 'style-1' );
		$show_all_text     = parent::get_setting( $block, 'show-all-text', 'Show all' );
		$show_margin       = parent::get_setting( $block, 'show-margin', 'yes' );
		$alternate_content = parent::get_setting( $block, 'alternate-content', 'yes' );
		$full_width_image  = parent::get_setting( $block, 'full-width-image', 'no' );
		$content_to_show   = parent::get_setting( $block, 'content-to-show', 'excerpt' );
		$mode              = parent::get_setting( $block, 'mode', 'masonry' );
		$title_overlay     = parent::get_setting( $block, 'title-overlay', 'no' );
		$show_open_button  = parent::get_setting( $block, 'show-open-button', 'no' );
		$open_button_text  = parent::get_setting( $block, 'open-button-text', 'Open article' );

		$only_categories_with_posts	= parent::get_setting( $block, 'only-categories-with-posts', 'no' );

		$post_type           = ( isset( $block['settings']['post-type'] ) ) ? $block['settings']['post-type'] : 'post';
		$posts               = \PadmaQuery::get_posts( $block );
		$categories_in_posts = array();

		// Columns.
		$portfolio_classes .= 'portfolio-' . $columns;

		// Full Width.
		if ( 'yes' === $full_width_image ) {
			$portfolio_classes .= ' portfolio-fullwidth';
		}

		// Layout mode.
		$data_atts = 'data-layout="' . $mode . '"';

		// No margin.
		if ( 'yes' !== $show_margin ) {
			$portfolio_classes .= ' portfolio-nomargin';
		}

		$html_content .= '<div id="portfolio" class="portfolio  ' . $portfolio_classes . ' grid-container clearfix" ' . $data_atts . '>';

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

			// Categories.
			$item_classes = '';
			
			if ( 'product' === $post_type || ( is_array( $post_type ) && in_array( 'product', $post_type, true ) ) ){
				$post_categories = wp_get_post_terms( $id, 'product_cat' );
			} else {
				$post_categories = get_the_category( $id );
			}

			// save categories ids to use later.
			foreach ( $post_categories as $key => $term ) {
				$categories_in_posts[] = $term->term_id;
			}

			foreach ( $post_categories as $key => $category ) {
				$item_classes .= ' pf-' . $category->slug;
			}

			// Alternate content.
			if ( 'yes' === $alternate_content && ( 0 === $alt_counter % 2 ) && $alt_counter > 1 ) {
				$item_classes .= ' alt';
			}
			++$alt_counter;

			/**
			 * Description structure
			 */
			$description  = '<div class="portfolio-desc">';
			$description .= '<h3><a href="' . $url . '">' . $title . '</a></h3>';

			if ( 'no' === $title_overlay || 1 === $columns ) {
				$description .= '<div class="description">' . do_shortcode( $shortcode ) . '</div>';
			}

			if ( 1 === $columns && 'yes' === $show_open_button ) {
				$description .= '<a href="' . $url . '" class="button button-3d noleftmargin">' . $open_button_text . '</a>';
			}

			$description .= '	</div>';

			/**
			 * Article structure
			 */
			$html_content .= '<article class="portfolio-item' . $item_classes . '">';
			$html_content .= '	<div class="portfolio-image">';
			$html_content .= '		<a href="' . $url . '">';
			$html_content .= '			<img src="' . $image . '" alt="Open Imagination">';
			$html_content .= '		</a>';
			$html_content .= '		<div class="portfolio-overlay">';

			if ( 'yes' === $title_overlay && $columns > 1 ) {
				$html_content .= $description;
			}

			$html_content .= '			<a href="' . $image . '" class="left-icon" data-lightbox="image"><i class="fas fa-plus"></i></a>';
			$html_content .= '			<a href="' . $url . '" class="right-icon"><i class="fas fa-ellipsis-h"></i></a>';
			$html_content .= '		</div>';
			$html_content .= '	</div>';

			if ( 'no' === $title_overlay || 1 === $columns ) {
				$html_content .= $description;
			}

			$html_content .= '</article>';

		}
		$html_content .= '</div>';

		/**
		 * Filter
		 */
		if ( 'yes' === $show_filter ) {

			$html_filter  = '<ul class="portfolio-filter ' . $filter_style . ' clearfix" data-container="#portfolio">';
			$html_filter .= '<li class="activeFilter"><a href="#" data-filter="*">' . $show_all_text . '</a></li>';

			$categories_mode = parent::get_setting( $block, 'categories-mode', 'include' );
			$categories      = parent::get_setting( $block, 'categories', array() );

			foreach ( \PadmaQuery::get_categories( $post_type ) as $category_id => $category ) {

				if ( 'yes' === $only_categories_with_posts && ! in_array( $category_id, $categories_in_posts, true ) ) {
					continue;
				}

				if ( count( $categories ) > 0 ) {

					if ( ! in_array( $category_id, $categories, true ) && 'include' === $categories_mode ) {
						continue;
					}

					if ( in_array( $category_id, $categories, true ) && 'exclude' === $categories_mode ) {
						continue;
					}
				}

				$action_text  = strtolower( $category );
				$action_text  = preg_replace( '/\s+/', '-', $action_text );
				$html_filter .= '<li><a data-filter=".pf-' . $action_text . '">' . $category . '</a></li>';

			}

			$html_filter .= '</ul>';
			$html_filter .= '<div class="clear"></div>';

		}

		$html .= $html_filter;
		$html .= $html_content;

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

		$path = str_replace( '/blocks/portfolio', '', plugin_dir_url( __FILE__ ) );

		/* JS */
		wp_enqueue_script( 'padma-ve-isotope', $path . 'js/isotope.js', array( 'jquery' ), PADMA_ADVANCED_VERSION, true );
		wp_enqueue_script( 'padma-ve-magnific', $path . 'js/jquery.magnific.js', array( 'jquery' ), PADMA_ADVANCED_VERSION, true );
		wp_enqueue_script( 'padma-ve-portfolio', $path . 'js/portfolio.js', array( 'jquery', 'padma-ve-isotope' ), PADMA_ADVANCED_VERSION, true );

		/* CSS */
		wp_enqueue_style( 'padma-ve-magnific', $path . 'css/magnific-popup.css', array(), PADMA_ADVANCED_VERSION, 'all' );
		wp_enqueue_style( 'padma-ve-portfolio', $path . 'css/portfolio.css', array(), PADMA_ADVANCED_VERSION, 'all' );
		wp_enqueue_style( 'padma-ve-fontawesome', $path . 'css/fontawesome.css', array(), PADMA_ADVANCED_VERSION, 'all' );
	}
}
