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
  'lib/customizer.php', // Theme customizer
  'lib/wp_bootstrap_navwalker.php' // Bootstrap nav added
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


/**
 * Returns an estimated reading time in a string
 * idea from @link http://briancray.com/posts/estimated-reading-time-web-design/
 * @param  string $content the content to be read
 * @return string          estimated read time eg. 1 minute, 30 seconds
 */
function time_to_read( $content = false ) {
 
    if ( is_single () ) {
 
        if ( !$content ) { $content = get_the_content(); $add = false; } else { $add = true; }
 
      $time = str_word_count( strip_tags( $content ) ) / 300;
        if ( $time == 0 ) { $time = 0.1; } // If there is no content, report < 1 minute
      $rounded = ceil( $time );
        $output = '' . ( $time<1?'<':'' ) . $rounded . ' min.' . ( $rounded>1?'':'' ) . ' read';
 
        if ( $add ) { $content = $output . $content; } else { $content = $output; }
 
    }
 
    return $content;
}



function redt_popular_posts($post_id) {
  $count_key = 'popular_posts';
  $count = get_post_meta($post_id, $count_key, true);
  if ($count == '') {
    $count = 0;
    delete_post_meta($post_id, $count_key);
    add_post_meta($post_id, $count_key, '0');
  } else {
    $count++;
    update_post_meta($post_id, $count_key, $count);
  }
}

function redt_track_posts($post_id) {
  if (!is_single()) return;
  if (empty($post_id)) {
    global $post;
    $post_id = $post->ID;
  }
  redt_popular_posts($post_id);
}
add_action('wp_head', 'redt_track_posts');


// Creates Listings Custom Post Type
function deals_init() {
    $args = array(
      'label' => 'Deals',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'deal'),
        'query_var' => true,
        'menu_icon' => 'dashicons-desktop',
        'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );
    register_post_type( 'deal', $args );
}
add_action( 'init', 'deals_init' );


function reorder_admin_menu( $__return_true ) {
    return array(
         'index.php',               // Dashboard
         'acf-options',             // Home Page
         'edit.php?post_type=page', // Pages
         'edit.php?post_type=deal', // Listings
         'edit.php', // Posts
         'separator1', // --Space--
         'separator1', // --Space--
         'separator2', // --Space--
         'separator3', // --Space--
         'upload.php', // Media
         'edit-comments.php', // Comments
         'separator1', // --Space--
         'separator1', // --Space--
         'themes.php', // Appearance
         'users.php', // Users
         'separator4', // --Space--
         'plugins.php', // Plugins
         'tools.php', // Tools
         'options-general.php', // Settings
   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );



// Enable ACF Options Page
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}

if (function_exists('acf_set_options_page_title')){
  acf_set_options_page_title('Footer Featured Logo Settings');
}

if (function_exists('acf_set_options_page_menu')){
  acf_set_options_page_menu('Featured Logos');
}

// Enable Shortcodes in Widget Areas
// Will be used for Event Calendar Shortcodes
// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');


// filter the Gravity Forms button type
add_filter('gform_submit_button_2', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='btn btn-primary btn-block' id='gform_submit_button_{$form['id']}'><span>Subscribe</span></button>";
}

