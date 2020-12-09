<?php
/**
 * @package LbkFcV1
 * @version 1.0.0
 */
/*
Plugin Name: LBK Fixed Contact
Description: Form liên hệ chạy dọc theo web
Plugin URI:
Author: Briki
Author URI: https://facebook.com/vuong.briki
Licence: GPLv2 or later
Text Domain: lbk-fc
Domain Path: /languages/
Version: 1.0.0
*/

if( !defined( 'ABSPATH' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'inc/activate.php';
register_activation_hook( __FILE__, array('AtiBlogTestActivate','activate') );
require_once plugin_dir_path( __FILE__ ) . 'inc/deactivate.php';
register_deactivation_hook( __FILE__, array('AtiBlogTestDeactivate','deactivate') );

class LbkFcV1 {
    function register() {
        //for backend
        add_action( 'admin_enqueue_scripts', array($this, 'backendEnqueue') );
        // for frontend
        add_action( 'wp_enqueue_scripts', array($this, 'frontendEnqueue') );
        // Add admin page
        add_action( 'admin_menu', array($this, 'add_admin_page') );
    }

    function backendEnqueue() {
        wp_enqueue_style( 'LbkFcV1Style', plugins_url( '/assets/css/admin_mystyle.css', __FILE__ ) );
        wp_enqueue_script( 'LbkFcV1Script', plugins_url( '/assets/js/admin_myscript.js', __FILE__ ) );
    }

    function frontendEnqueue() {
        wp_enqueue_style( 'LbkFcV1Style', plugins_url( '/assets/css/front_mystyle.css', __FILE__ ) );
        wp_enqueue_script( 'LbkFcV1Script', plugins_url( '/assets/js/front_myscript.js', __FILE__ ) );
    }

    function add_admin_page() {
        // this is a builtin method of WordPress:
        add_menu_page('LBK Contact', 'LBK Contact', 'manage_options', 'lbkfcv1_plugin', array($this, 'admin_index'), '', 110);
    }

    function admin_index() {
        //require template
        require_once plugin_dir_path(__FILE__) . 'templates/adminindex.php';
    }
}

if(class_exists('LbkFcV1')){
	$lbkfcv1=new LbkFcV1();
	$lbkfcv1->register();
}