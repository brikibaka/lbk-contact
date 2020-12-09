<?php

/**
* @package LbkFcV1
* Trigger this file on plugin deactivation
**/

class LbkFcV1Deactivate {

	static function deactivate(){
		flush_rewrite_rules();
	}
}