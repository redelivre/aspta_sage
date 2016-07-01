<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  
  $wp_customize->add_section('aspta_sage_logo', array(
  	'title'    => __('Upload Logo', 'aspta_sage'),
  	'description' => '',
  	'priority' => 120,
  ));
  $wp_customize->add_setting('aspta_sage_upload_logo', array(
  	'capability'        => 'edit_theme_options',
  	'type'           => 'option',
  ));
  
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'aspta_sage_upload_logo', array(
  	'label'    => __('Upload imagem de Logo', 'aspta_sage'),
  	'section'  => 'aspta_sage_logo',
  	'settings' => 'aspta_sage_upload_logo',
  )));
  
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');
