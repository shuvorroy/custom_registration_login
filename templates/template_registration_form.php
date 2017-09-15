<?php

if( is_user_logged_in() ){
  $logout = wp_logout_url( get_permalink() );
  echo "<h2>You are already Logged in <a href='{$logout}'>Logout</a></h2>";
}else{
  ?>
  <form id="custom-register-form" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="custom-register-user">
    <div class="form_row">
      <label for="first-name"><?php _e( 'First Name', 'custom_login' ); ?><sup>*</sup></label>
      <input id="first-name" type="text" name="first-name" required>
    </div>

    <div class="form_row">
      <label for="last-name"><?php _e( 'Last Name', 'custom_login' ); ?><sup>*</sup></label>
      <input id="last-name" type="text" name="last-name" required>
    </div>

    <div class="form_row">
      <label for="email"><?php _e( 'Email', 'custom_login' ); ?><sup>*</sup></label>
      <input id="email" type="text" name="email" required>
    </div>

    <div class="form_row">
      <label for="password"><?php _e( 'Password', 'custom_login' ); ?><sup>*</sup></label>
      <input id="password" type="password" name="password" required>
    </div>

    <div class="form_row">
      <label for="password2"><?php _e( 'Password Again', 'custom_login' ); ?><sup>*</sup></label>
      <input id="password2" type="password" name="password2" required>
    </div>

    <div class="form_row">
  		<input id="submit" type="submit" value="<?php _e( 'Register', 'custom_login' ); ?>"  required>
  		<div class="response-message" style="display: none;"></div>
    </div>
  </form>

<?php }
