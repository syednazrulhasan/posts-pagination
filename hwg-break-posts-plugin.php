<?php
/**
 * Plugin Name: Posts Break Interlinking
 * Plugin URI: http://www.hirewpgeeks.com
 * Description: This plugin adds interlinking to wordpress lengthy posts.
 * Version: 1.0
 * Author: Hirewpgeeks
 * License: GPLv2
 * Textdomain: breakposts
 */
if ( ! defined( 'ABSPATH' ) ) exit; 
function hwg_include_files(){

	include( plugin_dir_path( __FILE__ ) . '/hwg-admin-settings.php');
	include( plugin_dir_path( __FILE__ ) . '/hwg-breakpost-functions.php');

}
add_action( 'plugins_loaded', 'hwg_include_files' );


add_action( 'wp_enqueue_scripts', 'register_styles' );
 function register_styles(){
    wp_register_style( 'main_stylesheet', plugins_url( '/css/style.css', __FILE__ ) );
    wp_enqueue_style( 'main_stylesheet' );


	wp_enqueue_script( 'frontendscript', plugins_url( '/js/custom.js', __FILE__ ), array( 'jquery' ) );
}