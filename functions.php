<?php add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
add_action( 'wp_enqueue_scripts', 'bundleJS' );
function bundleJS() {
  wp_enqueue_script(
    'bundleJS', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/bundle.js', NULL, NULL, true
  );
}

?>