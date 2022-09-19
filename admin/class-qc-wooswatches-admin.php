<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Qc_Wooswatches
 * @subpackage Qc_Wooswatches/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Qc_Wooswatches
 * @subpackage Qc_Wooswatches/admin
 * @author     Your Name <email@example.com>
 */
global $woocommerce;

 class Qc_Wooswatches_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $qc_wooswtaches    The ID of this plugin.
	 */
	private $qc_wooswtaches;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The attribute variations names
	 * 
	 * @since	1.0.0
	 * @access 	public
	 * @var 	array	$attr_names		The attribute variations names	
	 */
	public $attr_names;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $qc_wooswtaches       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $qc_wooswtaches, $version ) {
		$this->qc_wooswtaches = $qc_wooswtaches;
		$this->version = $version;
		$this->get_woo_attrs_variations();
	}

	/**
	 * Get the view for the admin area.
	 * 
	 * @since	1.0.0
	 */
	public function qc_wooswatches_admin_options() {
		return include 'partials/qc-wooswatches-admin-display.php';
	}

	/**
	 * Get Woocommerce attributes terms names.
	 * 
	 * @since 	1.0.0
	 */
	public function get_woo_attrs_variations() {
			$this->attr_names = wc_get_attribute_taxonomy_names();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Qc_Wooswatches_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Qc_Wooswatches_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->qc_wooswtaches, plugin_dir_url( __FILE__ ) . 'css/qc-wooswatches-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Qc_Wooswatches_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Qc_Wooswatches_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_media ();
		wp_enqueue_script( $this->qc_wooswtaches, plugin_dir_url( __FILE__ ) . 'js/qc-wooswatches-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
	}

}
