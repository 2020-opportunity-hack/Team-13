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
 * Plugin Name:       Donation Receipts Generator & Validator for DFSS
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

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dfss-ohack-activator.php
 */
function activate_dfss_ohack() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dfss-ohack-activator.php';
	Dfss_Ohack_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dfss-ohack-deactivator.php
 */
function deactivate_dfss_ohack() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dfss-ohack-deactivator.php';
	Dfss_Ohack_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dfss_ohack' );
register_deactivation_hook( __FILE__, 'deactivate_dfss_ohack' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dfss-ohack.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_dfss_ohack() {

	$plugin = new Dfss_Ohack();
	$plugin->run();

}
run_dfss_ohack();