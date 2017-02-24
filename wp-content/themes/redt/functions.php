<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


//****************************
// Theme Customizer Additions
//****************************
function theme_theme_customizer($wp_customize) {

  $wp_customize->add_section( 'theme_logo_section' , array(
      'title'       => __( 'Logo', 'theme' ),
      'priority'    => 30,
      'description' => 'Upload a logo for this theme',
  ) );

  $wp_customize->add_setting( 'theme_logo', array(
    'default' => get_bloginfo('template_directory') . '/images/default-logo.png',
  ) );

  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_logo', array(
    'label'    => __( 'Current logo', 'theme' ),
    'section'  => 'theme_logo_section',
    'settings' => 'theme_logo',
  ) ) );  


  $wp_customize->add_section( 'theme_footer_logo_section' , array(
      'title'       => __( 'Footer Logo', 'theme' ),
      'priority'    => 31,
      'description' => 'Upload a footer logo for this theme',
  ) );

  $wp_customize->add_setting( 'theme_footer_logo', array(
    'default' => get_bloginfo('template_directory') . '/images/default-logo.png',
  ) );

  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_logo2', array(
    'label'    => __( 'Current footer logo', 'theme' ),
    'section'  => 'theme_footer_logo_section',
    'settings' => 'theme_footer_logo',
  ) ) );  


}
add_action('customize_register', 'theme_theme_customizer');