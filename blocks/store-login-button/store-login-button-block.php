<?php

/**
 * Block class
 *
 * @package Padma_Advanced
 */

namespace Padma_Advanced;


class PadmaStoreBlockLoginButton extends \PadmaBlockAPI {
	

	public $id;
	public $name;
	public $options_class;
	public $description;
	public $categories;
	

	public function __construct(){
		
		$this->id 				= 'store-login-button';	
		$this->name 			= 'Login Button';
		$this->options_class 	= 'Padma_Advanced\PadmaStoreBlockLoginButtonOptions';	
		$this->description 		= 'Shows a button to login.';
		$this->categories 		= array('store','forms','dynamic-content');
	}


	public function init() {


	}
	
	public function setup_elements() {

		$this->register_block_element(array(
			'id' => 'login-button',
			'name' => 'Login button container',
			'selector' => '.login-button',
		));

		$this->register_block_element(array(
			'id' => 'login-button-btn',
			'name' => 'Login button Link',
			'selector' => '.login-button a',
		));

		$this->register_block_element(array(
			'id' => 'form-container',
			'name' => 'Form container',
			'selector' => '.login-form',
		));

		$this->register_block_element(array(
			'id' => 'form',
			'name' => 'Form',
			'selector' => 'form',
		));

		$this->register_block_element(array(
			'id' => 'form-input',
			'name' => 'Input',
			'selector' => 'form input',
		));

		$this->register_block_element(array(
			'id' => 'form-button',
			'name' => 'Button',
			'selector' => 'form button',
		));

		$this->register_block_element(array(
			'id' => 'form-icon',
			'name' => 'Icon',
			'selector' => 'form i',
		));

	}


	public static function dynamic_js($block_id, $block) {

		if ( !$block )
			$block = PadmaBlocksData::get_block($block_id);

		$js = 'jQuery(document).ready(function() {';
		
		$js .= "jQuery(document).on('click','#block-" . $block['id'] . " a',function(){ var form = jQuery('#block-" . $block['id'] . " .login-form'); if( form.hasClass('hidden') ){ form.removeClass('hidden') }else{ form.addClass('hidden') } });";

		$js .= "});";

		return $js;
	}

	public static function dynamic_css($block_id, $block) {

		$css = '#block-' . $block['id'] . '{
			overflow: visible;
		}';

		$css .= '#block-' . $block['id'] . ' .login-button {
    		position: relative;
		}';

		$css .= '.login-button a {
		    display: block;
		    padding: 0 12px;
		    font-size: 12px;
		    font-weight: 700;
		    text-transform: uppercase;
		    height: 44px;
		    color: #666;
		    line-height: 44px;
		    color: #666;
		    text-align: center;
		    border: 1px solid #666;
			text-decoration: none;
		}';

		$css .= '.login-button a:hover {
			text-decoration: underline;
		}';
		/*
		$css .= '.login-button a:hover + div.login-form {
			display: block;
		}';*/

		$css .= '.login-button .login-form{
			display: block;			
    		right: 0;
    		padding: 25px;
		    position: absolute;
		    z-index: 210;
		    line-height: 1.5;
		    background: #FFF;		    
		    top: 44px;
		    left: 0;
		    width: inherit;
		    margin: 0;
		    border-top: 1px solid #1ABC9C;
		    border-bottom: 1px solid #EEE;
		    box-shadow: 0 0 5px -1px rgba(0,0,0,0.2);
		    -moz-box-shadow: 0 0 5px -1px rgba(0,0,0,0.2);
		    -webkit-box-shadow: 0 0 5px -1px rgba(0,0,0,0.2);
		}';

		$css .= '.login-button .login-form.hidden{
			display: none !important;
		}';
		/*
		$css .= '.login-button .login-form:hover{
			display: block;
		}';*/

		$css .= '.login-button .login-form .input-group{
		    position: relative;
		    display: -ms-flexbox;
		    display: flex;
		    -ms-flex-wrap: wrap;
		    flex-wrap: wrap;
		    -ms-flex-align: stretch;
		    align-items: stretch;
		    width: 100%;
		}';
		
		$css .= '.login-button .login-form .input-group#top-login-username{
    		margin-bottom: -1px;
		}';

		$css .= '.login-button .login-form .input-group#top-login-password{
    		margin-bottom: 10px;
		}';

		$css .= '.login-button .login-form .input-group-prepend{
			margin-right: -1px;
			display: flex;
		}';

		$css .= '.login-button .login-form .input-group-prepend .input-group-text{
			display: flex;
		    -ms-flex-align: center;
		    align-items: center;
		    padding: 0.375rem 0.75rem;
		    margin-bottom: 0;
		    font-size: 1rem;
		    font-weight: 400;
		    line-height: 1.5;
		    color: #495057;
		    text-align: center;
		    white-space: nowrap;
		    background-color: #e9ecef;
		    border: 1px solid #ced4da;
		    border-radius: 0.25rem;
		    border-top-right-radius: 0;
    		border-bottom-right-radius: 0;
		}';

		$css .= '.login-button .login-form .input-group-prepend input{
		    border-bottom-right-radius: 0;
    		border-bottom-left-radius: 0;
		}';

		$css .= '.login-button .login-form i{
			margin-right: 3px;
    		vertical-align: top;
    		min-width: 16px;
		}';

		$css .= '.login-button .login-form i.icon-user:before{
			content: "\ec07";    		
		}';

		$css .= '.login-button .login-form i.icon-key:before{
			content: "\ea95";    		
		}';

		$css .= '.login-button .login-form input{
			position: relative;
		    -ms-flex: 1 1 auto;
		    flex: 1 1 auto;
		    width: 1%;
		    margin-bottom: 0;
		}';

		$css .= '.login-button .login-form button{

		    font-weight: 400;		    
		    text-align: center;
		    vertical-align: middle;
		    -webkit-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    user-select: none;		    		    
		    padding: 0.375rem 0.75rem;
		    font-size: 1rem;
		    line-height: 1.5;
		    border-radius: 0.25rem;
		    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		    display: block;
    		width: 100%;
    		color: #fff;
		    background-color: #dc3545;
		    border-color: #dc3545;
		}';

		return $css;

	}
	
	public function content($block) {

		$login_label = parent::get_setting( $block, 'login-label', 'Login' );
		$logout_label = parent::get_setting( $block, 'logout-label', 'Logout' );
		$btn_label = parent::get_setting( $block, 'btn-label', 'Sign in' );

		$html = '<div class="login-button">';

		
		if( is_user_logged_in() ){
			
			$html .= '<a href="'.wc_logout_url().'">'.$logout_label.'</a>';			

		}else{

			$html .= '<a href="#">'.$login_label.'</a>';
			$html .= '<div class="login-form hidden">';
			$html .= 	'<form id="top-login" method="post">';
			$html .= 		'<div class="input-group" id="top-login-username">';
			$html .= 			'<div class="input-group-prepend">';
			$html .= 				'<div class="input-group-text"><i class="icon-user"></i></div>';		
			$html .= 			'</div>';
			$html .= 			'<input name="username" type="text" class="form-control" placeholder="Username" required="">';
			$html .= 		'</div>';
			$html .= 		'<div class="input-group" id="top-login-password">';
			$html .= 			'<div class="input-group-prepend">';
			$html .= 				'<div class="input-group-text"><i class="icon-key"></i></div>';		
			$html .= 			'</div>';
			$html .= 			'<input name="password" type="password" class="form-control" placeholder="Password" required="">';
			$html .= 		'</div>';
			$html .= 		wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce', true, false );
			$html .= 		'<button class="" type="submit" name="login">'.$btn_label.'</button>';
			$html .= 	'</form>';
			$html .= '</div>';
		}

		$html .= '</div>';
		
		echo $html;
		
	}

	public static function enqueue_action($block_id, $block = false) {

		$path = str_replace('/blocks/login-button', '', plugin_dir_url( __FILE__ ));			

		/* CSS */
		wp_enqueue_style('padma-store-fonts', $path . 'css/font-icons.css');
	
	}

	
}	
