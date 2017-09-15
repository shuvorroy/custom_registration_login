<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if( ! class_exists( 'Custom_Login_Public' ) ) :

  class Custom_Login_Public{

    public function enqueue_scripts() {
      wp_enqueue_script( 'custom_login_public', plugins_url( 'assets/js/public.js', CLP ), array( 'jquery' ), 1.0, true );
      wp_enqueue_style( 'custom_login_public', plugins_url( 'assets/css/public.css', CLP ), '', 1.0, 'all' );
			wp_localize_script('custom_login_public', 'ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
    }

		public function custom_register_page(){
			include dirname( CLP ) . '/templates/template_registration_form.php';
		}

		public function custom_login_page(){
			include dirname( CLP ) . '/templates/template_login_form.php';
		}


  }


endif;
