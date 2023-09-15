<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://magnigeeks.com
 * @since      1.0.0
 *
 * @package    Address_Auto_Complete
 * @subpackage Address_Auto_Complete/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Address_Auto_Complete
 * @subpackage Address_Auto_Complete/admin
 * @author     Mukesh Kumar sahoo <mukeshkumarsahoo15@gmail.com>
 */
class Address_Auto_Complete_Admin {

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
		add_filter( 'rpress_settings_sections_general' , array( $this,'rpress_delivery_map_settings_section' ) );
		add_filter( 'rpress_settings_general' , array( $this,'rpress_add_delivery_settings' ), 10, 1 );
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
		 * defined in Address_Auto_Complete_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Address_Auto_Complete_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/address-auto-complete-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/address-auto-complete-admin.js', array( 'jquery' ), $this->version, false );

	}


	public function rpress_delivery_map_settings_section( $section ) {
		$section['adress'] = __( 'Address', 'rp-address-gmap');
		return $section;
	}


	public function rpress_add_delivery_settings($general_settings) {
		
		$general_settings['adress']['adress_heading'] = array(
            'id'            => 'api_key_setting',
            'class'         => 'api_key_setting',
            'name'          => '<h3>' . __( ' API Key Setting', 'rp-adress-setting ' ) . '</h3>',
            'desc'          => '',
            'type'          => 'header',
            'tooltip_title' => __( ' API Key Setting', 'rp-adress-setting ' ),
        );
		$general_settings['adress']['auto_adress_enable'] = array(
            'id'            => 'auto_adress_enable',
            'class'         => 'auto_adress_enable',
            'name'          =>  __( 'Auto adress Enable', 'rp-adress-setting ' ) ,
            'desc'          => 'Enable this if you want to add address autofill box at checkout',
            'type'          => 'checkbox',
            'tooltip_title' => __( 'Auto adress Enable', 'rp-adress-setting ' ),
        );

        $general_settings['adress']['google_map_api_key'] = array(
            'id'    => 'google_map_api_key',
            'name'  => __( 'Google map api key', 'rp-adress-setting ' ),
            'desc'  => __( 'Add your Google map API for adress auto fill.', 'rp-adress-setting ' ),
            'type'  => 'text',
        );
	 

		return $general_settings;
	}
}
