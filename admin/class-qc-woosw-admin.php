<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Qc_Woosw
 * @subpackage Qc_Woosw/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Qc_Woosw
 * @subpackage Qc_Woosw/admin
 * @author     Your Name <email@example.com>
 */
global $woocommerce;

 class Qc_Woosw_Admin extends Qc_Woosw_Admin_Fields {

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
	 * @param      string    $qc_woosw       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $qc_woosw, $version ) {

		$this->qc_woosw = $qc_woosw;
		$this->version = $version;
		$this->get_woo_attrs_variations();
	}

	/**
	 * Set attribute option whether its select or a a swatch
	 */
	public function qc_woosw_save_attribute_option( $attr_id ) {

		$option_id = "qc-woosw-attribute-select-option-$attr_id";
		
		if ( isset( $_POST['qc-woosw-attribute-select-option'] ) ) {	
			update_option( $option_id,  $_POST['qc-woosw-attribute-select-option'] );

		} else {
			update_option( $option_id,  '' );
		}
		
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
	 * Get the view for edit attribute admin area.
	 * 
	 * @since	1.0.0
	 */
	public function qc_woosw_admin_edit_attribute_html($taxonomy) {
	
		return include_once 'partials/html-qc-woosw-admin-edit-attribute.php';
	}


	/**
	 * Get the view for add attribute admin area.
	 * 
	 * @since	1.0.0
	 */
	public function qc_woosw_admin_add_attribute_html($taxonomy) {
	
		return include_once 'partials/html-qc-woosw-admin-add-attribute.php';
	}


	/**
	 * Get the view for edit term admin area.
	 * 
	 * @since	1.0.0
	 */
	public function qc_woosw_admin_edit_term_html($taxonomy) {
	
		return include_once 'partials/html-qc-woosw-admin-edit-term.php';
	}


	/**
	 * Get the view for add term admin area.
	 * 
	 * @since	1.0.0
	 */
	public function qc_woosw_admin_add_term_html($taxonomy) {
	
		return include_once 'partials/html-qc-woosw-admin-add-term.php';
	}

	/**
	 * Save admin form values
	 * 
	 * @param $term_id
	 */
	public function qc_woosw_admin_swatches_save($term_id) {
		if ( isset($_POST) ) {
			update_term_meta( $term_id, 'qc-woosw-select-value', $_POST['qc-woosw-select-value']  );
			update_term_meta( $term_id, 'qc-woosw-color-value', $_POST['qc-woosw-color-value']  );
			update_term_meta( $term_id, 'qc-woosw-img-value', $_POST['qc-woosw-img-value']  );
			update_term_meta( $term_id, 'qc-woosw-button-text', $_POST['qc-woosw-button-text'] );
			update_term_meta( $term_id, 'qc-woosw-btn-bg-color', $_POST['qc-woosw-btn-bg-color']  );
			update_term_meta( $term_id, 'qc-woosw-btn-txt-color', $_POST['qc-woosw-btn-txt-color']  );
		}
		
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
		 * defined in Qc_Woosw_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Qc_Woosw_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->qc_woosw, plugin_dir_url( __FILE__ ) . 'assets/css/qc-woosw-admin.min.css', array(), $this->version, 'all' );

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
		 * defined in Qc_Woosw_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Qc_Woosw_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_media ();
		wp_enqueue_script( $this->qc_woosw, plugin_dir_url( __FILE__ ) . 'assets/js/qc-woosw-admin.min.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
	}

}
