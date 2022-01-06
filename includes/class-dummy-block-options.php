<?php
/**
 * Dummy Options for Block
 *
 * @link       https://padmaunlimited.com
 * @since      1.0.0
 *
 * @package    Padma_Advanced
 * @subpackage Padma_Advanced/includes
 * @author     Padma Team <support@padmaunlimited.com>
 */

namespace Padma_Advanced;

/**
 * PadmaDummyBlockOptions Class Doc Comment
 *
 * @category Class
 * @package  Padma Advanced
 * @author   Padma Dev Team
 */
class PadmaDummyBlockOptions extends \PadmaBlockOptionsAPI {

	/**
	 * Block options tabs
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $tabs    Maintains and registers all options tabs for block
	 */
	public $tabs;

	/**
	 * Block options sets
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $sets    Maintains and registers all options sets for block
	 */
	public $sets;

	/**
	 * Block options inputs
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $inputs    Maintains and registers all options inputs for block
	 */
	public $inputs;

	/**
	 * Define the class functionality.
	 *
	 * Initial values for properties
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->tabs   = array(
			'general' => 'General',
		);
		$this->sets   = array();
		$this->inputs = array();

	}

	/**
	 * Allow developers to modify the properties of the class and use functions since doing a property outside of a function will not allow you to.
	 *
	 * @param boolean $args Args.
	 * @return void
	 */
	public function modify_arguments( $args = false ) {
		$this->tab_notices['general'] = __( 'Get Padma Advanced Pro to edit this Block', 'padma-advanced' );
	}
}
