<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.ohack.org/
 * @since      1.0.0
 *
 * @package    Dfss_Ohack
 * @subpackage Dfss_Ohack/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Dfss_Ohack
 * @subpackage Dfss_Ohack/includes
 * @author     OHACK#TEAM13 <sanjose@dressforsuccess.org>
 */
class Dfss_Ohack_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'dfss-ohack',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
