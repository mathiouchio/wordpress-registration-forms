<?php
/*
Plugin Name: User Register
Description: Expand user registration
Author: Matheus C Li
Author URI: http://matheus.li
Version: 0.0.1
*/

//1. Add a new form element...
add_action( 'register_form', 'myplugin_register_form' );
function myplugin_register_form() {

$first_name = ( ! empty( $_POST['first_name'] ) ) ? trim( $_POST['first_name'] ) : '';
$last_name = ( ! empty( $_POST['last_name'] ) ) ? trim( $_POST['last_name'] ) : '';
$age = ( ! empty( $_POST['age'] ) ) ? trim( $_POST['age'] ) : '';

$parents_name = ( ! empty( $_POST['parents_name'] ) ) ? trim( $_POST['parents_name'] ) : '';
$parents_phone = ( ! empty( $_POST['parents_phone'] ) ) ? trim( $_POST['parents_phone'] ) : '';
$release_form = ( ! empty( $_POST['release_form'] ) ) ? trim( $_POST['release_form'] ) : '';

// questionaires
$type_geek = ( ! empty( $_POST['type_geek'] ) ) ? trim( $_POST['type_geek'] ) : '';
$cool_thing = ( ! empty( $_POST['cool_thing'] ) ) ? trim( $_POST['cool_thing'] ) : '';
$escape_how = ( ! empty( $_POST['escape_how'] ) ) ? trim( $_POST['escape_how'] ) : '';
$boredom_killer = ( ! empty( $_POST['boredom_killer'] ) ) ? trim( $_POST['boredom_killer'] ) : '';
$scary_thing = ( ! empty( $_POST['scary_thing'] ) ) ? trim( $_POST['scary_thing'] ) : '';
?>
  <br/>
  <h2>Bio</h2>
  <p>
    <label for="first_name"><?php _e( 'First Name', 'mydomain' ) ?><br />
    <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr( wp_unslash( $first_name ) ); ?>" size="25" /></label>
  </p>
  <p>
    <label for="last_name"><?php _e( 'Last Name', 'mydomain' ) ?><br />
    <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr( wp_unslash( $last_name ) ); ?>" size="25" /></label>
  </p>
  <p>
    <label for="age"><?php _e( 'Age', 'mydomain' ) ?><br />
    <input type="text" name="age" id="age" class="input" value="<?php echo esc_attr( wp_unslash( $age ) ); ?>" size="3" /></label>
  </p>

  <br/>
  <h2>Parent Info</h2>
  <p>
    <label for="parents_name"><?php _e( 'Parents Name', 'mydomain' ) ?><br />
    <input type="text" name="parents_name" id="parents_name" class="input" value="<?php echo esc_attr( wp_unslash( $parents_name ) ); ?>" size="3" /></label>
  </p>
  <p>
    <label for="parents_phone"><?php _e( 'Parents Phone', 'mydomain' ) ?><br />
    <input type="text" name="parents_phone" id="parents_phone" class="input" value="<?php echo esc_attr( wp_unslash( $parents_phone ) ); ?>" size="3" /></label>
  </p>
  <p>
    <input type="checkbox" name="release_form" id="release_form" class="input" value="<?php echo esc_attr( wp_unslash( $parents_phone ) ); ?>" /></label>
    <label for="release_form"><?php _e( 'Release form', 'mydomain' ) ?></label>
  </p>

  <br/>
  <h2>Questionnaires</h2>
  <p>
    <label for="type_geek"><?php _e( 'Tell us what kind of Geek you are?', 'mydomain' ) ?><br />
    <input type="text" name="type_geek" id="type_geek" class="input" value="<?php echo esc_attr( wp_unslash( $type_geek ) ); ?>" size="3" /></label>
  </p>
  <p>
    <label for="cool_thing"><?php _e( 'What’s the coolest thing you’ve ever made? (could be a 5 layer Ham Sandwich, a robot, a science experiment …', 'mydomain' ) ?><br />
    <input type="text" name="cool_thing" id="cool_thing" class="input" value="<?php echo esc_attr( wp_unslash( $cool_thing ) ); ?>" size="3" /></label>
  </p>
  <p>
    <label for="escape_how"><?php _e( 'You are trapped in a castle tower, who would you ask to help you escape and why?)', 'mydomain' ) ?><br />
    <input type="text" name="escape_how" id="escape_how" class="input" value="<?php echo esc_attr( wp_unslash( $escape_how ) ); ?>" size="3" /></label>
  </p>
  <p>
    <label for="boredom_killer"><?php _e( 'What do you do when you are bored?', 'mydomain' ) ?><br />
    <input type="text" name="boredom_killer" id="boredom_killer" class="input" value="<?php echo esc_attr( wp_unslash( $boredom_killer ) ); ?>" size="3" /></label>
  </p>
  <p>
    <label for="scary_thing"><?php _e( 'What’s the scariest thing you’ve ever done?', 'mydomain' ) ?><br />
    <input type="text" name="scary_thing" id="scary_thing" class="input" value="<?php echo esc_attr( wp_unslash( $scary_thing ) ); ?>" size="3" /></label>
  </p>

<?php
}

//2. Add validation. In this case, we make sure first_name is required.
add_filter( 'registration_errors', 'myplugin_registration_errors', 10, 3 );
function myplugin_registration_errors( $errors, $sanitized_user_login, $user_email ) {
  /*if ( empty( $_POST['first_name'] ) || ! empty( $_POST['first_name'] ) && trim( $_POST['first_name'] ) == '' ) {
    $errors->add( 'first_name_error', __( '<strong>ERROR</strong>: You must include a first name.', 'mydomain' ) );
  }
  if ( empty( $_POST['last_name'] ) || ! empty( $_POST['last_name'] ) && trim( $_POST['last_name'] ) == '' ) {
    $errors->add( 'last_name_error', __( '<strong>ERROR</strong>: You must include a last name.', 'mydomain' ) );
  }
  if ( empty( $_POST['age'] ) || ! empty( $_POST['age'] ) && trim( $_POST['age'] ) == '' ) {
    $errors->add( 'age_error', __( '<strong>ERROR</strong>: You must specify your age.', 'mydomain' ) );
  }
  if ( empty( $_POST['parents_name'] ) || ! empty( $_POST['parents_name'] ) && trim( $_POST['parents_name'] ) == '' ) {
    $errors->add( 'parents_name_error', __( '<strong>ERROR</strong>: You must include a parent\'s name.', 'mydomain' ) );
  }
  if ( empty( $_POST['parents_phone'] ) || ! empty( $_POST['parents_phone'] ) && trim( $_POST['parents_phone'] ) == '' ) {
    $errors->add( 'parents_phone_error', __( '<strong>ERROR</strong>: You must include parent\'s phone number.', 'mydomain' ) );
  }
  if( !isset($_POST['release_form']) ) {
    $errors->add( 'release_form_error', __( '<strong>ERROR</strong>: You must view and agree to our release forms.', 'mydomain' ) );
  }*/

  // remove error message
  if(isset($errors->errors['empty_username'])){
    unset($errors->errors['empty_username']);
  }

  return $errors;
}

//3. Finally, save our extra registration user meta.
add_action( 'user_register', 'myplugin_user_register' );
function myplugin_user_register( $user_id ) {
  if ( !empty($_POST['first_name']) ) {
    update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
  }
  if ( !empty($_POST['last_name']) ) {
    update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
  }
  if ( !empty($_POST['age']) ) {
    update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
  }
  if ( !empty($_POST['parents_name']) ) {
    update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
  }
  if ( !empty($_POST['parents_phone']) ) {
    update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
  }
  if ( !empty($_POST['type_geek']) ) {
    update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
  }
  if ( !empty($_POST['cool_thing']) ) {
    update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
  }
  if ( !empty($_POST['escape_how']) ) {
    update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
  }
  if ( !empty($_POST['boredom_killer']) ) {
    update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
  }
  if ( !empty($_POST['scary_thing'])  ) {
    update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
  }

  //Remove username requirement
  $_POST['user_login'] = $_POST['user_email'];
}