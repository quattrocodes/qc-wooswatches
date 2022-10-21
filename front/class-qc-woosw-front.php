<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Qc_Woosw
 * @subpackage Qc_Woosw/front
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Qc_Woosw
 * @subpackage Qc_Woosw/front
 * @author     Your Name <email@example.com>
 */
class Qc_Woosw_Front {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $qc_woosw    The ID of this plugin.
	 */
	private $qc_woosw;

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
	 * @param      string    $qc_woosw       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $qc_woosw, $version ) {

		$this->qc_woosw = $qc_woosw;
		$this->version = $version;
	}


	/**
	 * Custom swatches for the product front area.
	 * 
	 * @param $html - HTML markup for swatches
	 * @param $args
	 */
	public function qc_woosw_front_swatches_html($html, $args) {

		$options = $args['options'];
		$attribute = $args['attribute'];
		
		// if default select variation swatches is turned off
		$customSwatches = '<div class="qc-woosw-front-default-select hide">'.$html . '</div>';
		
		ob_start();
		
		include 'partials/html-qc-woosw-front.php';
		
		$customSwatches .= ob_get_clean();

		return $customSwatches;
	}

	/**
	 * Register the stylesheets for the front-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Qc_Woosw_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Qc_Woosw_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->qc_woosw, plugin_dir_url( __FILE__ ) . 'assets/css/qc-woosw-front.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the front-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Qc_Woosw_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Qc_Woosw_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->qc_woosw, plugin_dir_url( __FILE__ ) . 'assets/js/qc-woosw-front.min.js', array( 'jquery' ), $this->version, false );

	}

}
