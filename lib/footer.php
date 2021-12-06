<?php

namespace Roots\Sage\Widget;

use WP_Widget;

/**
 * Footer widget
 */

class FooterWidget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'footer_widget',
      'description' => __('Logo and text for footer AS-PTA'),
    );
    parent::__construct( 'footer_widget', __('Logo/Text AS-PTA'), $widget_ops );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    ?>
    <a href="<?php bloginfo('url'); ?>" title="AS-PTA"><img class="img-responsive center-block footer-logo" src="<?php echo get_theme_mod('aspta_logo') ? get_theme_mod('aspta_logo') : get_stylesheet_directory_uri(). "/assets/images/logo_aspta.png"; ?>" alt=""/></a>
    <p class="footer-descricao">A AS-PTA - Agricultura Familiar e Agro&shy;ecologia é uma associação de direito civil sem fins lucrativos que, desde 1983, atua para o fortalecimento da agricultura familiar e a promoção do desenvolvi&shy;mento rural sustentável no Brasil.</p>
    <?php
  }

  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    // outputs the options form on admin
  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   */
  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
  }
}
