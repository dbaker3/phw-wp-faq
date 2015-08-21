<?php

/**
 * Plugin Name:       PHW FAQ
 * Plugin URI:        http://wpbean.com/wpb-advanced-faq
 * Description:       FAQ plugin forked from WPB Advanced FAQ 
 * Version:           1.0
 * Author:            wpbean, dabaker
 * Author URI:        https://github.com/dbaker3/
 * Text Domain:       wpb-advanced-faq
 * Domain Path:       /languages
 */

/*
*  8-19-15 Modified by David Baker, Milligan College
*  Original Project by wpbean, http://wpbean.com/wpb-advanced-faq
*
*  Removed styles since will be using our own themes style. 
*  Reformated displaying of shortcode to match the layout of accordions used by our theme.
*  Removed cookie support to save open/closed state of faq items
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