<?php

/**
 * Plugin Name:       WPB Advanced FAQ
 * Plugin URI:        http://wpbean.com/wpb-advanced-faq
 * Description:       Just another wordpress plugin
 * Version:           1.0
 * Author:            wpbean
 * Author URI:        http://wpbean.com/
 * Text Domain:       wpb-advanced-faq
 * Domain Path:       /languages
 */


/**
 * If this file is called directly, abort. 
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Internationalization
 */

function wpb_af_textdomain() {
	load_plugin_textdomain( 'wpb-advanced-faq', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'wpb_af_textdomain' );



/**
 * Add plugin action links
 */

function wpb_af_plugin_actions( $links ) {
	if( is_admin() ){
		$links[] = '<a href="http://wpbean.com/support/" target="_blank">'. __('Support','wpb-advanced-faq') .'</a>';
	}
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wpb_af_plugin_actions' );



/**
 * Required files
 */

require_once dirname( __FILE__ ) . '/wpb-scripts.php';
require_once dirname( __FILE__ ) . '/inc/wpb-af-shortcode.php';
require_once dirname( __FILE__ ) . '/inc/wpb-af-cpt.php';
require_once dirname( __FILE__ ) . '/inc/wpb-af-functions.php';