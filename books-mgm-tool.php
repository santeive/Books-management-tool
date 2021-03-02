<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://onlinewebtutorblog.com/
 * @since             1.0.0
 * @package           Books_Mgm_Tool
 *
 * @wordpress-plugin
 * Plugin Name:       Books Management Tool
 * Plugin URI:        https://onlinewebtutorblog.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            santeive
 * Author URI:        https://onlinewebtutorblog.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       books-mgm-tool
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
define( 'BOOKS_MGM_TOOL_VERSION', '1.0.0' );
define( 'BOOKS_MGM_TOOL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-books-mgm-tool-activator.php
 */
function activate_books_mgm_tool() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-books-mgm-tool-activator.php';
	$activator = new Books_Mgm_Tool_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-books-mgm-tool-deactivator.php
 */
function deactivate_books_mgm_tool() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-books-mgm-tool-activator.php';
	$activator = new Books_Mgm_Tool_Activator();

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-books-mgm-tool-deactivator.php';
	$deactivator = new Books_Mgm_Tool_Deactivator($activator);
	$deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_books_mgm_tool' );
register_deactivation_hook( __FILE__, 'deactivate_books_mgm_tool' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-books-mgm-tool.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_books_mgm_tool() {

	$plugin = new Books_Mgm_Tool();
	$plugin->run();

}
run_books_mgm_tool();
