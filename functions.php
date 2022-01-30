<?php
/** * Completely Remove jQuery From WordPress */
function my_init() {
  if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', false);
  }
}
add_action('init', 'my_init');
add_theme_support( 'custom-logo');
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
add_action( 'wp_enqueue_scripts', 'bundleJS' );
function bundleJS() {
  wp_enqueue_script(
    'bundleJS', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/bundle.js', NULL, NULL, true
  );
}

?>