<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://chinarajames.com
 * @since             1.0.0
 * @package           Cjwd_Ird
 *
 * @wordpress-plugin
 * Plugin Name:       Interactive Room Display
 * Plugin URI:        http://chinarajames.com/wp-plugins/interactive-room-display
 * Description:       Let your users interact, learn or walk through your office/rooms
 * Version:           1.0.0
 * Author:            Chinara James
 * Author URI:        http://chinarajames.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cjwd-ird
 * Domain Path:       /languages
 * Plugin Type:				Piklist
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'IRD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cjwd-ird-activator.php
 */
function activate_cjwd_ird() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cjwd-ird-activator.php';
	Cjwd_Ird_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cjwd-ird-deactivator.php
 */
function deactivate_cjwd_ird() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cjwd-ird-deactivator.php';
	Cjwd_Ird_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cjwd_ird' );
register_deactivation_hook( __FILE__, 'deactivate_cjwd_ird' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cjwd-ird.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cjwd_ird() {

	$plugin = new Cjwd_Ird();
	$plugin->run();

}
run_cjwd_ird();
