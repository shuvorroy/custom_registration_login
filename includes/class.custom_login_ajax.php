<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if( ! class_exists( 'Custom_Login_AJAX' ) ) :

	class Custom_Login_AJAX{

		public function custom_register_user(){
			$data = $_POST;
			$user_id = username_exists( $data['email'] );
			if ( !$user_id and email_exists($data['email']) == false ) {
				$user_id = wp_create_user( $data['email'], $data['password'], $data['email'] );
				if($user_id){
					$response['success'] = 1;
					$response['message'] =  __('You have successfully Registered.');
					update_user_meta( $user_id, 'first_name', $data['first-name'] );
					update_user_meta( $user_id, 'last_name', $data['last-name'] );
					$response['go_to'] = get_edit_user_link( $user_id );
				}
			} else {
				$response['success'] = 0;
				$response['message'] = __('User already exists.');
				$response['go_to'] = wp_login_url();
			}
			wp_send_json( $response );
		}


		public function custom_login_user(){
			$creds = $_POST;
			unset($creds['action']);
			$user = wp_signon( $creds, false );
			if ( is_wp_error($user) ) {
				$response['success'] = 0;
				$response['message'] = __('Login Unsuccessfull! Please check you Username and Password.');
			} else {
				$response['success'] = 1;
				$response['message'] =  __('You have successfully Logged In.');;
				$response['go_to'] = get_home_url();
			}
			wp_send_json( $response );
		}

	}


endif;
