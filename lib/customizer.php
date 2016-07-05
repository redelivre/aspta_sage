<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;
use WP_Customize_Image_Control;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  
  $wp_customize->add_section('aspta_sage_logo', array(
  	'title'    => __('Header', 'aspta_sage'),
  	'description' => '',
  	'priority' => 120,
  ));
  $wp_customize->add_setting('aspta_sage_upload_logo', array(
  	'capability'        => 'edit_theme_options',
  	'default'           => false,
  ));
  
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'aspta_sage_upload_logo', array(
  	'label'    => __('Upload imagem de Logo', 'aspta_sage'),
  	'section'  => 'aspta_sage_logo',
  	'settings' => 'aspta_sage_upload_logo',
  )));
  
  $wp_customize->add_setting('aspta_sage_header_background', array(
  	'capability'        => 'edit_theme_options',
  	'default'           => false,
  ));
  
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'aspta_sage_header_background', array(
  	'label'    => __('Header Background Image', 'aspta_sage'),
  	'section'  => 'aspta_sage_logo',
  	'settings' => 'aspta_sage_header_background',
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

/**
 * This will output the custom WordPress settings to the live theme's WP head.
 *
 * Used for inline custom CSS
 *
 * @since Aspta 1.0
 */
function aspta_customize_css()
{
	?>
	<!-- Customize CSS -->
	<?php
	// Main font
	/*$font_css = get_theme_mod( 'aspta_font_main' ); //TODO font select

	if ( is_array( $font_css ) ) : ?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $font_css['url']; ?>' rel='stylesheet' type='text/css'>
		<style type="text/css">
			h1,
			h2,
			h3,
			h4,
			h5,
			h6,
			blockquote,
			.main-navigation a,
			.entry-meta,
			.entry-title,
			.site-content .site-navigation,
			.comment-author,
			.widget-title,
			.eletro_widgets_content h2 {
				font-family: <?php echo $font_css['name']; ?>, serif;
			}
		</style>
	<?php
	endif;*/
	?>
	<style type="text/css"><?php
		$top_bg = get_theme_mod('aspta_sage_header_background', '');
		if(!empty($top_bg))
		{
			?>
			.header-background {
				background-image: url(<?php echo esc_url($top_bg); ?>);
			}
			<?php
		}
		?>
	</style> 
	<!-- /Customize CSS -->
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\\aspta_customize_css' );
