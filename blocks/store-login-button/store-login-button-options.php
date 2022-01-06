<?php
/**
 * Block options class
 *
 * @package Padma_Advanced
 */

namespace Padma_Advanced;

class PadmaStoreBlockLoginButtonOptions extends \PadmaBlockOptionsAPI {
	
	public $tabs;
	public $sets;
	public $inputs;

	public function __construct(){

		$this->tabs = array(
			'general' 			=> 'General',			
		);
		
		$this->sets = array();

		$this->inputs = array(

			'general' => array(

				'login-label' => array(
					'name' => 'login-label',
					'type' => 'text',
					'label' => __('Login label','padma-store'),
					'default' => 'Login',					
				),

				'logout-label' => array(
					'name' => 'logout-label',
					'type' => 'text',
					'label' => __('Logout label','padma-store'),
					'default' => 'Logout',					
				),


				'btn-label' =>	array(
					'name' => 'btn-label',
					'type' => 'text',
					'label' => __('Button label','padma-store'),
					'default' => 'Sign in',					
				),

			),			
			
		);

	}

	public function modify_arguments($args = false) {

	}
		
}
