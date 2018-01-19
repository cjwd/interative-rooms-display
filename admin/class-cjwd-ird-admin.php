<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://chinarajames.com
 * @since      1.0.0
 *
 * @package    Cjwd_Ird
 * @subpackage Cjwd_Ird/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cjwd_Ird
 * @subpackage Cjwd_Ird/admin
 * @author     Chinara James <cjwd@chinarajames.com>
 */
class Cjwd_Ird_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cjwd_Ird_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cjwd_Ird_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cjwd-ird-admin.css', array(), $this->version, 'all' );

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
		 * defined in Cjwd_Ird_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cjwd_Ird_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cjwd-ird-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Check if Piklist is activated
	 *
	 * @since   1.0.0
	 */
	public function is_piklist_activated() {

	  if( is_admin() ) {

	  	include_once dirname( plugin_dir_path( __FILE__ ) ) . '/includes/class-piklist-checker.php';

			if (!piklist_checker::check( plugin_dir_url( dirname( __FILE__ ) ) . 'cjwd-ird.php' ) ) {
		 		return;
			}

	  }
	}

	/**
	 * Register admin and settings pages
	 */
	public function register_admin_pages( $pages ) {
		$pages[] = [
			'page_title'	=>	__( 'Interactive Room Display Settings', 'cjwd-ird' ),
			'menu_title'	=>	__( 'IRD Settings', 'cjwd-ird' ),
			'submenu'	=>	'options-general.php',
			'capability'	=>	'manage_options',
			'menu_slug'	=>	'ird_settings',
			'setting'	=>	'ird_settings',
			'single_line'	=>	true,
			'default_tab'	=>	'Basic',
			'save_text'	=>	'Save Settings'

		];

		return $pages;
	}

}
