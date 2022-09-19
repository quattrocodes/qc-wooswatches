<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Qc_Wooswatches
 * @subpackage Qc_Wooswatches/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Qc_Wooswatches
 * @subpackage Qc_Wooswatches/public
 * @author     Your Name <email@example.com>
 */
class Qc_Wooswatches_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $qc_wooswatches    The ID of this plugin.
	 */
	private $qc_wooswatches;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $qc_wooswatches       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $qc_wooswatches, $version ) {

		$this->qc_wooswatches = $qc_wooswatches;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->qc_wooswatches, plugin_dir_url( __FILE__ ) . 'css/qc-wooswatches-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->qc_wooswatches, plugin_dir_url( __FILE__ ) . 'js/qc-wooswatches-public.js', array( 'jquery' ), $this->version, false );

	}

}
