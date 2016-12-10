<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme Setup
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */

function setup() {
	// Enable features from Soil when plugin is activated
	// https://roots.io/plugins/soil/
	// comented because we dont use soils plugin
	// add_theme_support('soil-clean-up');
	// add_theme_support('soil-nav-walker');
	// add_theme_support('soil-nice-search');
	// add_theme_support('soil-jquery-cdn');
	// add_theme_support('soil-relative-urls');

	// Make theme available for translation
	// Community translations can be found at https://github.com/roots/sage-translations
	load_theme_textdomain('aspta', get_template_directory() . '/lang');

	// Enable plugins to manage the document title
	// http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	add_theme_support('title-tag');

	// Register wp_nav_menu() menus
	// http://codex.wordpress.org/Function_Reference/register_nav_menus
	register_nav_menus([
	'primary_navigation' => __('Menu Principal', 'aspta')
	]);

	// Enable post thumbnails
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size('640', '', true);
	add_image_size('slide', '1140', '400', true);
	add_image_size('destaque-pagina', '750', '400', true);
	add_image_size('destaque', '360', '258', true);
	add_image_size('medio', '200', '200', true);
	add_image_size('pequeno', '150', '150', true);

	// Enable post formats
	// http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

	// Enable HTML5 markup support
	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

	// Use main stylesheet for visual editor
	// To add custom styles edit /assets/styles/layouts/_tinymce.scss
	add_editor_style(Assets\asset_path('styles/main.css'));

}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Menu Primário', 'aspta'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
  register_sidebar([
    'name'          => __('Logo e texto do Rodapé', 'aspta'),
    'id'            => 'sidebar-logo-text-footer',
    'before_widget' => '<section class="widget col-sm-4 %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
  register_sidebar([
    'name'          => __('Rodapé', 'aspta'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget col-sm-1 %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
  register_sidebar([
  	'name'          => __('Home Seção 1', 'aspta'),
  	'id'            => 'sidebar-home-session-1',
  	'before_widget' => '<section class="widget col-sm-3 %1$s %2$s">',
  	'after_widget'  => '</section>',
  	'before_title'  => '<h3>',
  	'after_title'   => '</h3>'
  ]);
  
  register_sidebar([
  	'name'          => __('Home Seção 2', 'aspta'),
  	'id'            => 'sidebar-home-session-2',
  	'before_widget' => '<section class="widget col-sm-3 %1$s %2$s">',
  	'after_widget'  => '</section>',
  	'before_title'  => '<h3>',
  	'after_title'   => '</h3>'
  ]);
  register_sidebar([
  	'name'          => __('Home Seção Banners', 'aspta'),
  	'id'            => 'sidebar-home-session-banners',
  	'before_widget' => '<section class="widget col-sm-3 %1$s %2$s">',
  	'after_widget'  => '</section>',
  	'before_title'  => '<h3>',
  	'after_title'   => '</h3>'
  ]);

  register_sidebar([
  	'name'          => __('Campanha Transgênicos', 'aspta'),
  	'id'            => 'gm-sidebar',
  	'before_widget' => '<section class="widget col-sm-3 %1$s %2$s">',
  	'after_widget'  => '</section>',
  	'before_title'  => '<h3>',
  	'after_title'   => '</h3>'
  ]);

  register_sidebar([
  	'name'          => __('Quem Somos', 'aspta'),
  	'id'            => 'who_we_are',
  	'before_widget' => '<section class="widget col-sm-3 %1$s %2$s">',
  	'after_widget'  => '</section>',
  	'before_title'  => '<h3>',
  	'after_title'   => '</h3>'
  ]);
  
  register_sidebar([
    'name'          => __('Biblioteca Lista', 'aspta'),
    'id'            => 'library_list',
    'before_widget' => '<section class="widget col-sm-3 %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Nova Revista', 'aspta'),
    'id'            => 'newspaper_new',
    'before_widget' => '<section class="widget col-sm-3 %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Revista Agriculturas - Home', 'aspta'),
    'id'            => 'agricultures_newspaper_home',
    'before_widget' => '<section class="widget col-sm-3 %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);
  wp_enqueue_style('defaut_css', get_template_directory_uri() . '/assets/styles/geral.css', false, null);
 
  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
  wp_enqueue_script('jquery-cycle2', get_template_directory_uri() . '/assets/scripts/jquery.cycle2.min.js', array('jquery'), null, true);
  wp_enqueue_script('jquery-cycle2-carousel', get_template_directory_uri() . '/assets/scripts/jquery.cycle2.carousel.min.js', array('jquery-cycle2'), null, true);
  wp_enqueue_script('jquery-cycle2-swipe', get_template_directory_uri() . '/assets/scripts/jquery.cycle2.swipe.min.js', array('jquery-cycle2'), null, true);
  wp_enqueue_script('jquery-cycle2-center', get_template_directory_uri() . '/assets/scripts/jquery.cycle2.center.min.js', array('jquery-cycle2'), null, true);
  wp_enqueue_script('jquery-slider-scroller', get_template_directory_uri() . '/assets/scripts/jquery.slider.scroller.js', array('jquery-cycle2'), null, true);
 
  wp_enqueue_script('search_modernizr', get_template_directory_uri() . '/assets/scripts/modernizr.custom.js', array('jquery'), null, true);
  wp_enqueue_script('search_classie', get_template_directory_uri() . '/assets/scripts/classie.js', array('search_modernizr'), null, true);
  wp_enqueue_script('search_uisearch', get_template_directory_uri() . '/assets/scripts/uisearch.js', array('search_modernizr','search_classie'), null, true);
  
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

// register all as-pta widget's

add_action( 'widgets_init', function(){
     register_widget( 'Roots\Sage\Widget\FooterWidget' );
     register_widget( 'Roots\Sage\Widget\LibraryWidget' );
     register_widget( 'Roots\Sage\Widget\NewsPaperWidget' );
     register_widget( 'Roots\Sage\Widget\BlogCleanPlatesWidget' );
     register_widget( 'Roots\Sage\Widget\SeeAlsoWidget' );
});

