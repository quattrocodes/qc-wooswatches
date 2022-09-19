<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://quattrocodes.net
 * @since             1.0.0
 * @package           qc_wooswatches
 *
 * @wordpress-plugin
 * Plugin Name:       QC WooSwatches
 * Plugin URI:        http://quattrocodes.net/wp/plugins/qc-wooswatches/
 * Description:       Just another woocommerce variation swatches plugin.
 * Version:           1.0.0
 * Author:            Quattro Codes
 * Author URI:        http://quattrocodes.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       qc-wooswatches
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
define( 'QC_WOOSWATCHES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-qc-wooswatches-activator.php
 */
function activate_qc_wooswatches() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-qc-wooswatches-activator.php';
	Qc_Wooswatches_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-qc-wooswatches-deactivator.php
 */
function deactivate_qc_wooswatches() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-qc-wooswatches-deactivator.php';
	Qc_Wooswatches_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_qc_wooswatches' );
register_deactivation_hook( __FILE__, 'deactivate_qc_wooswatches' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-qc-wooswatches.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_qc_wooswatches() {
	$plugin = new qc_wooswatches();
	$plugin->run();
}
add_action('plugins_loaded', 'run_qc_wooswatches' );

