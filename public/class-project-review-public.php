<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.shapon.me
 * @since      1.0.0
 *
 * @package    Project_Review
 * @subpackage Project_Review/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Project_Review
 * @subpackage Project_Review/public
 * @author     Shapon Pal <shaponpal4@gmail.com>
 */
class Project_Review_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
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
		 * defined in Project_Review_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Project_Review_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name.'multi-select', plugin_dir_url( __FILE__ ) . 'css/multi-select.css', array(), $this->version.time(), 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/project-review-public.css', array(), $this->version.time(), 'all' );

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
		 * defined in Project_Review_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Project_Review_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name.'multi-select-js', plugin_dir_url( __FILE__ ) . 'js/jquery.multi-select.min.js', array( 'jquery' ), $this->version.time(), false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/project-review-public.js', array( 'jquery',  $this->plugin_name.'multi-select-js' ), $this->version.time(), false );
		$params = array('siteUrl' => site_url());
		wp_localize_script( $this->plugin_name, 'spprobj', $params );

	}

}
