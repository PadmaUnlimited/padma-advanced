<?php
/**
 * Block options class
 *
 * @package Padma_Advanced
 */

namespace Padma_Advanced;


class PadmaStoreBlockAccountOptions extends \PadmaBlockOptionsAPI {

	public $tabs;
	public $sets;
	public $inputs;

	public function __construct(){

		$this->tabs = array();		
		$this->sets = array();
		$this->inputs = array();

	}

	public function modify_arguments($args = false) {
	}

}