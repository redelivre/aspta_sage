<?php
namespace Roots\Sage\Widget;
use WP_Widget;

/**
 * Blog_Clean_Plates Widget
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */
 
class BlogCleanPlatesWidget extends WP_Widget {
	/**
	* Sets up the widgets name etc
	*/
	public function __construct() {
		$widget_ops = array(
			'classname' => 'clean_plates_widget',
			'description' => __('Posts from blog Clean Plates AS-PTA'),
		);
		parent::__construct( 'clean_plates_widget', __('Posts Clean Plates AS-PTA'), $widget_ops );
	}
	/**
	* Outputs the content of the widget
	*
	* @param array $args
	* @param array $instance
	*/
	public function widget( $args, $instance ) { ?>
		<div class="sidebar-module blog-pratos-limpos">
			<h3 class="text-uppercase">Blog em Pratos Limpos</h3>
			<?php $rss = fetch_feed('http://pratoslimpos.org.br/?feed=rss2');
				$maxitems = 0;
				$rss_items = array();
				if (!is_wp_error( $rss ) ) :
					$maxitems = $rss->get_item_quantity(6);
					$rss_items = $rss->get_items(0, $maxitems);
				endif;
				if ($maxitems == 0){ ?> <li class="sem-borda"><?php _e("Não há itens no blog."); ?></li> <?php }
				else {
					foreach ( $rss_items as $item ) : ?>
  						<p><strong><h5><a href="<?php echo esc_url( $item->get_permalink() ); ?>" title="<?php echo esc_html( $item->get_title() ); ?>"><?php echo esc_html( $item->get_title() ); ?></h5></a></strong></p>
  					<?php endforeach; 
  				} ?>
  		</div>
	<?php }
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