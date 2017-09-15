<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if( ! class_exists( 'Custom_Login_Admin' ) ) :

  class Custom_Login_Admin{

    public function enqueue_scripts() {
  		wp_enqueue_script( 'custom_login_admin', plugins_url( 'assets/js/admin.js', CLP ), array( 'jquery' ), 1.0, true );
  		wp_enqueue_style( 'custom_login_admin', plugins_url( 'assets/css/admin.css', CLP ), '', 1.0, 'all' );
    }

  }

endif;
