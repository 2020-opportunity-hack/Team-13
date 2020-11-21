<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.ohack.org/
 * @since      1.0.0
 *
 * @package    Dfss_Ohack
 * @subpackage Dfss_Ohack/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dfss_Ohack
 * @subpackage Dfss_Ohack/admin
 * @author     OHACK#TEAM13 <sanjose@dressforsuccess.org>
 */
class Dfss_Ohack_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dfss_Ohack_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dfss_Ohack_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dfss-ohack-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dfss_Ohack_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dfss_Ohack_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dfss-ohack-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function admin_donation_receipt_page() {
		return "<h2>O H A C K</h2>";
	}
	
	public function actions_admin_donation_receipt_menu() {
		$page_title = 'Donation Receipts';
		$menu_title = 'UD Receipts';
		$capability = 'manage_options';
		$menu_slug = 'donations-receipts';
		$icon_url = 'dashicons-chart-area';
		$position = 10;
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, 'admin_donation_receipt_page', $icon_url, $position);
	}

	function custom_post_donation_receipts() {
		$labels = array(
		  'name'               => _x( 'Receipts', 'post type general name' ),
		  'singular_name'      => _x( 'Receipt', 'post type singular name' ),
		  'add_new'            => _x( 'Add New', 'book' ),
		  'add_new_item'       => __( 'Add New Receipt' ),
		  'edit_item'          => __( 'Edit Receipt' ),
		  'new_item'           => __( 'New Receipt' ),
		  'all_items'          => __( 'All Receipts' ),
		  'view_item'          => __( 'View Receipt' ),
		  'search_items'       => __( 'Search Receipts' ),
		  'not_found'          => __( 'No receipts found' ),
		  'not_found_in_trash' => __( 'No Receipt found in the Trash' ), 
		  'parent_item_colon'  => "’",
		  'menu_name'          => 'Receipts'
		);
		$args = array(
		  'labels'        => $labels,
		  'description'   => 'Holds our receipts and receipt specific data',
		  'public'        => true,
		  'menu_position' => 5,
		  'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		  'has_archive'   => true,
		);
		register_post_type( 'receipt', $args ); 
	}

	function receipt_meta_box() {
		add_meta_box( 
			'receipt_author',
			'User', //'__( 'Product Price', 'myplugin_textdomain' ),'
			'receipt_author_box_content',
			'receipt',
			'side',
			'high'
		);
		add_meta_box( 
			'is_approved',
			'Approval Status', //'__( 'Product Price', 'myplugin_textdomain' ),'
			'approved_box_content',
			'receipt',
			'side',
			'high'
		);
	}

}
