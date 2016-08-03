<?php

namespace Roots\Sage\Widget;

use WP_Widget;

/**
 * Footer widget
 */

class NewsPaperWidget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'newspaper_widget',
      'description' => __('Last newspaper AS-PTA'),
    );
    parent::__construct( 'newspaper_widget', __('Last Newspaper AS-PTA'), $widget_ops );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    ?>
    <div class="sidebar-module row">
    <h3>Revista Agriculturas</h3>
    <?php
    query_posts( array (
          'post_type'      => 'revista',
          'post_parent'    => 0,
          'posts_per_page' => 1
          ));
    if ( have_posts() ) : 
      while ( have_posts() ) : the_post()?>
      <a class="img-responsive" href="<?php echo get_permalink( get_the_ID() ); ?> "><?php the_revista_thumbnail( 'large' ); ?></a>
      <?php
      endwhile;
      endif;
      ?>
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
