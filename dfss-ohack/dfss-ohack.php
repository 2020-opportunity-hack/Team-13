<?php

/**
 * Written by Team-13 for Dress for Success San Jose via Opportunity Hack (https://ohack.org) 11/20/2020
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.ohack.org/
 * @since             0.1.0
 * @package           Dfss_Ohack
 *
 * @wordpress-plugin
 * Plugin Name:       Touchless Donation & Tax Receipt - Approval & Tracker
 * Plugin URI:        https://github.com/2020-opportunity-hack/Team-13
 * Description:       This plugin will add features to My Account page for registered Users to Generate donation reciepts and download them as needed. The NPO members can validate the recipt and make it avilable to download from WordPress backend.
 * Version:           0.1.0
 * Author:            OHACK#TEAM13
 * Author URI:        https://www.ohack.org/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dfss-ohack
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DFSS_OHACK_VERSION', '1.0.0' );

function admin_donation_receipt_page() {
	return "<h2>O H A C K</h2>";
}

function actions_admin_donation_receipt_menu() {
	$page_title = 'Donation Receipts';
	$menu_title = 'UD Receipts';
	$capability = 'manage_options';
	$menu_slug = 'donations-receipts';
	$icon_url = 'dashicons-chart-area';
	$position = 10;
	//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, 'admin_donation_receipt_page', $icon_url, $position);
}

function custom_post_donation_receipts() {
	$labels = array(
	  'name'               => _x( 'Receipts', 'post type general name' ),
	  'singular_name'      => _x( 'Receipt', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'book' ),
	  'add_new_item'       => __( 'Add New Receipt' ),
	  'edit_item'          => __( 'Edit Receipt' ),
	  'new_item'           => __( 'New Receipt' ),
	  'all_items'          => __( 'All Receipts' ),
	  'view_item'          => __( 'View Receipt' ),
	  'search_items'       => __( 'Search Receipts' ),
	  'not_found'          => __( 'No receipts found' ),
	  'not_found_in_trash' => __( 'No Receipt found in the Trash' ), 
	  'parent_item_colon'  => "’",
	  'menu_name'          => 'Receipts'
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Holds our receipts and receipt specific data',
	  'public'        => true,
	  'menu_position' => 3,
	  //'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
	  'has_archive'   => true,
	  'publicly_queryable' => true,
	  'menu_icon'          => 'dashicons-images-alt2',
	  'show_ui'            => true,
	  'rewrite'            => array( 'slug' => 'udr_receipt' ),
	);
	register_post_type( 'udr_receipt', $args ); 
	flush_rewrite_rules();
}

function receipt_meta_box() {
	add_meta_box( 
		'udr_receipt_author',
		'User', //'__( 'Product Price', 'myplugin_textdomain' ),'
		'receipt_author_box_content',
		'receipt',
		'side',
		'low'
	);
	add_meta_box( 
		'udr_uid',
		'Unique ID', //'__( 'Product Price', 'myplugin_textdomain' ),'
		'uid_box_content',
		'receipt',
		'side',
		'low'
	);
	add_meta_box( 
		'udr_is_approved',
		'Approval Status', //'__( 'Product Price', 'myplugin_textdomain' ),'
		'approved_box_content',
		'receipt',
		'side',
		'low'
	);
	add_meta_box( 
		'udr_datetime',
		'Date', //'__( 'Product Price', 'myplugin_textdomain' ),'
		'dr_datetime_box_content',
		'receipt',
		'side',
		'low'
	);
}


function udr_donation_form() {
	// $form_html = "<h3>Donation Details</h3>";
	// include('dr-form.php');
	// return $form_html;
	if ( !is_user_logged_in() ) {
    	ob_start();
        echo wp_login_form( 'echo=0' ) . wp_register( '', '', false );
	} else {
    	ob_start();
        require_once ( 'dr-form.php');
        $content = ob_get_clean();
        return $content;
	}
}

function udr_shortcodes() {
	add_shortcode('udr-donation-form', 'udr_donation_form');
}

function udr_resources() {
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '3.2.1', true );
}

function udr_receipt_post_template($single) {
    global $post;
    if ( $post->post_type == 'udr_receipt' ) {
        return dirname( __FILE__ ) . '/single-udr_receipt.php';
    }
    return $single;
}

function plugin_loader() {
	add_shortcode('udr-donation-form', 'udr_donation_form');
	add_shortcode('list-user-donations', 'list_user_donations');

	add_action('admin_menu', 'actions_admin_donation_receipt_menu');
	add_action('init', 'custom_post_donation_receipts');

	add_action('wp_enqueue_scripts', 'udr_resources');
	add_filter( 'single_template', 'udr_receipt_post_template' );

	// add_action('add_meta_boxes', 'receipt_meta_box');
}

global $unique_id;
//execute
include_once('dr-form-handler.php');
include_once('udr-list-user-donations.php');
include_once('udr-admin-settings.php');
plugin_loader();
?>