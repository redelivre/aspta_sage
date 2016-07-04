<?php

namespace Roots\Sage\Widget;

use WP_Widget;

/**
 * Footer widget
 */

class SeeAlsoWidget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'see_also_widget',
      'description' => __('See also about AS-PTA'),
    );
    parent::__construct( 'see_also_widget', __('See also AS-PTA'), $widget_ops );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    ?>
    <div class="sidebar-module">
    <h3>Consulte Também</h3>
      <div class="logo_partiners" >
        <a href="http://aspta.org.br/2014/03/projeto-alianca-pela-agroecologia/" >
          <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/alizanza.png" alt="parceiro: Alianza por la Agroecologia"/>
        </a>
        <a href="http://www.agroecologiaemrede.org.br/" >
          <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/agroecologia-em-rede.png" alt="parceiro: Agroecologia em Rede"/>
        </a>
        <a href="http://www6.ufrgs.br/abaagroeco" >
          <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/aba.png" alt="parceiro: aba Agroecologia"/>
        </a>
      </div>
    </div>
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
