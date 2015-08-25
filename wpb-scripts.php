<?php

/*
	WPB Advanced FAQ
	By WPBean
	
*/

/*
*  8-19-15 Modified by David Baker, Milligan College
*  Original Project by wpbean, http://wpbean.com/wpb-advanced-faq
*
*  -Removed jQuery
*  -Removed navgoco script
*  -Removed cookie script
*  -Removed stylesheets
*  -Added Lunr script

*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

/* ==========================================================================
   include js files
   ========================================================================== */

function wpb_af_adding_scripts() {
	if ( !is_admin() ) {
		wp_enqueue_script('wpb_af_lunr_script', plugins_url('assets/js/lunr.min.js', __FILE__), '', '0.5.12', true);
		wp_enqueue_script('wpb_af_faqlunr_script', plugins_url('faqlunr.js', __FILE__), '', '0.1', true);
	}
}
add_action( 'wp_enqueue_scripts', 'wpb_af_adding_scripts' ); 