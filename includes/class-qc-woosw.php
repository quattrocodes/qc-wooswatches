<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * front-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Qc_Woosw
 * @subpackage Qc_Woosw/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * front-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Qc_Woosw
 * @subpackage Qc_Woosw/includes
 * @author     Your Name <email@example.com>
 */

global $woocommerce;


class Qc_Woosw {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Qc_Woosw_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $qc_woosw    The string used to uniquely identify this plugin.
	 */
	protected $qc_woosw;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the front-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'QC_WOOSW_VERSION' ) ) {
			$this->version = QC_WOOSW_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->qc_woosw = 'qc-woosw';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_front_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Qc_Woosw_Loader. Orchestrates the hooks of the plugin.
	 * - Qc_Woosw_i18n. Defines internationalization functionality.
	 * - Qc_Woosw_Admin. Defines all hooks for the admin area.
	 * - Qc_Woosw_Public. Defines all hooks for the front side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-qc-woosw-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-qc-woosw-i18n.php';

		/**
		 * The class responsible for registering custom fields at admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/includes/class-qc-woosw-admin-fields.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-qc-woosw-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'front/class-qc-woosw-front.php';


		$this->loader = new Qc_Woosw_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Qc_Woosw_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new Qc_Woosw_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() { 
		$plugin_admin = new Qc_Woosw_Admin( $this->get_qc_woosw(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		$this->loader->add_action('woocommerce_after_add_attribute_fields', $plugin_admin, 'qc_woosw_admin_add_attribute_html');
		$this->loader->add_action('woocommerce_after_edit_attribute_fields', $plugin_admin, 'qc_woosw_admin_edit_attribute_html');

		$this->loader->add_action('woocommerce_attribute_added', $plugin_admin, 'qc_woosw_save_attribute_option');
		$this->loader->add_action('woocommerce_attribute_updated', $plugin_admin, 'qc_woosw_save_attribute_option');

		foreach ($plugin_admin->attr_names as $attr_name) {
			$this->loader->add_action($attr_name.'_add_form_fields', $plugin_admin, 'qc_woosw_admin_add_term_html');
			$this->loader->add_action($attr_name.'_edit_form_fields', $plugin_admin, 'qc_woosw_admin_edit_term_html');
		}
		
		// $this->loader->add_action( 'init', $plugin_admin, 'qc_woosw_default_select_state' );
		$this->loader->add_action( 'created_term', $plugin_admin, 'qc_woosw_admin_swatches_save' );
		$this->loader->add_action( 'edit_term', $plugin_admin, 'qc_woosw_admin_swatches_save' );

	}


	/**
	 * Register all of the hooks related to the front-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_front_hooks() {

		$plugin_front = new Qc_Woosw_Front( $this->get_qc_woosw(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_front, 'enqueue_styles' );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_front, 'enqueue_scripts' );

		$this->loader->add_filter( 'woocommerce_dropdown_variation_attribute_options_html', $plugin_front, 'qc_woosw_front_swatches_html', 10, 2);
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {		
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_qc_woosw() {

		return $this->qc_woosw;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Qc_Woosw_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		
		return $this->loader;

	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		
		return $this->version;
	
	}

}
