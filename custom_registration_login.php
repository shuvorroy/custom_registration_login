<?php
/*
Plugin Name: Front-end User Login and Registration
Description: Customized Login and Registration Functionalities
Plugin URI:
Author: ShuvoRoy
Author URI:
Version: 1.0
Text Domain: custom_login
Domain Path: /languages
*/


/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * @author ShuvoRoy
 */
if( ! class_exists( 'Custom_Login' ) ) :

class Custom_Login {

	public static $_instance;

	public function __construct() {
		$this->define();
		$this->includes();
		$this->hooks();
	}

	public function define() {
		define( 'CLP', __FILE__ );
	}

	public function includes() {
		require_once dirname( CLP ) . '/includes/helper-functions.php';
		require_once dirname( CLP ) . '/includes/class.custom_login_admin.php';
		require_once dirname( CLP ) . '/includes/class.custom_login_public.php';
		require_once dirname( CLP ) . '/includes/class.custom_login_ajax.php';
	}

	public function hooks()	{
		$public = new Custom_Login_Public();
		add_action( 'wp_enqueue_scripts', array( $public, 'enqueue_scripts' ) );
		add_shortcode( 'custom-register', array( $public , 'custom_register_page') );
		add_shortcode( 'custom-login', array( $public , 'custom_login_page') );
		$admin = new Custom_Login_Admin();
		$ajax = new Custom_Login_AJAX();
		add_action( 'wp_ajax_custom-register-user', array( $ajax, 'custom_register_user' ) );
		add_action( 'wp_ajax_nopriv_custom-register-user', array( $ajax, 'custom_register_user' ) );
		add_action( 'wp_ajax_custom-login-user', array( $ajax, 'custom_login_user' ) );
		add_action( 'wp_ajax_nopriv_custom-login-user', array( $ajax, 'custom_login_user' ) );
	}

	/**
	 * Instantiate the plugin
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}

endif;

Custom_Login::instance();
