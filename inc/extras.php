<?php
/**
 * Aspta Custom Logo
 */
function aspta_customize_register($wp_customize) {
    $wp_customize->add_setting( 'aspta_logo' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'aspta_logo', array(
        'label'    => __('Upload da imagem de Logo de topo', 'aspta'),
        'section'  => 'title_tagline',
        'settings' => 'aspta_logo',
    ) ) );
}

add_action('customize_register', 'aspta_customize_register');

/**
 * Add <body> classes
 */
function aspta_body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', 'aspta_body_class');

/**
 * Clean up the_excerpt()
 */
function aspta_excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'aspta') . '</a>';
}
add_filter('excerpt_more', 'aspta_excerpt_more');