<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://magnigeeks.com
 * @since             1.0.0
 * @package           Address_Auto_Complete
 *
 * @wordpress-plugin
 * Plugin Name:        Address Autocomplete for RestroPress 
 * Plugin URI:        https://magnigeeks.com
 * Description:       This plugin use to autocomplete the address at the product check out page.
 * Version:           1.0.0
 * Author:            Mukesh Kumar sahoo
 * Author URI:        https://magnigeeks.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       address-auto-complete
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
define( 'ADDRESS_AUTO_COMPLETE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-address-auto-complete-activator.php
 */
function activate_address_auto_complete() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-address-auto-complete-activator.php';
	Address_Auto_Complete_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-address-auto-complete-deactivator.php
 */
function deactivate_address_auto_complete() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-address-auto-complete-deactivator.php';
	Address_Auto_Complete_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_address_auto_complete' );
register_deactivation_hook( __FILE__, 'deactivate_address_auto_complete' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-address-auto-complete.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_address_auto_complete() {

	$plugin = new Address_Auto_Complete();
	$plugin->run();

}
run_address_auto_complete();
