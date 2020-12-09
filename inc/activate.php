<?php

/**
* @package LbkFcV1
* Trigger this file on plugin activation
**/

class LbkFcV1Activate {

	static function activate(){
		flush_rewrite_rules();
	}
}