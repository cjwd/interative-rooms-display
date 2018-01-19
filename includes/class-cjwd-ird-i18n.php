<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://chinarajames.com
 * @since      1.0.0
 *
 * @package    Cjwd_Ird
 * @subpackage Cjwd_Ird/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Cjwd_Ird
 * @subpackage Cjwd_Ird/includes
 * @author     Chinara James <cjwd@chinarajames.com>
 */
class Cjwd_Ird_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cjwd-ird',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
