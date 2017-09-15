<?php

if( is_user_logged_in() ){
  $logout = wp_logout_url( get_permalink() );
  echo "<h2>You are already Logged in <a href='{$logout}'>Logout</a></h2>";
}else{
  ?>
  <form id="custom-login-form" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="custom-login-user">
    <div class="form_row">
      <label for="user_login"><?php _e( 'User Login', 'custom_login' ); ?><sup>*</sup></label>
      <input id="user_login" type="text" name="user_login" required>
    </div>
    <div class="form_row">
      <label for="user_password"><?php _e( 'Password', 'custom_login' ); ?><sup>*</sup></label>
      <input id="user_password" type="text" name="user_password" required>
    </div>
    <div class="form_row">
      <label for="remember"><?php _e( 'Remember Me', 'custom_login' ); ?><sup>*</sup></label>
      <input id="remember" type="checkbox" name="remember" value="1">
    </div>
    <div class="form_row">
  		<input id="submit" type="submit" value="<?php _e( 'Login', 'custom_login' ); ?>"  required>
  		<div class="response-message" style="display: none;"></div>
    </div>
  </form>

<?php }
