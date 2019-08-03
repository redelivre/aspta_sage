<?php
namespace Roots\Sage\Widget;
use WP_Widget;

/**
 * NewsPaper widget
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
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
		$cover_id = get_issuem_issue_cover();
		if($cover_id) {
			$issuem_settings = get_issuem_settings();
			$issue = get_active_issuem_issue();
			
			if ( 0 == $issuem_settings['page_for_articles'] ) {
				$article_page = get_bloginfo( 'wpurl' ) . '/' . apply_filters( 'issuem_page_for_articles', 'article/' );
			} else {
				$article_page = get_page_link( $issuem_settings['page_for_articles'] );
			}
			$issue_url = get_term_link( $issue, 'issuem_issue' );
			if ( !empty( $issuem_settings['use_issue_tax_links'] ) || is_wp_error( $issue_url ) ) {
				$issue_url = add_query_arg( 'issue', $issue, $article_page );
			}
			?>
			<div class="sidebar-module revista col-md-12 col-sm-6">
				<h3 class="text-uppercase">Revista Agriculturas</h3>
	    		<a class="img-responsive text-center" href="<?php echo $issue_url; ?>"><?php echo wp_get_attachment_image( $cover_id, 'issuem-cover-image' ); ?></a>
		    </div> <?php 
		} else {
			?>
		    <div class="sidebar-module revista col-md-12 col-sm-6">
			    <h3 class="text-uppercase">Revista Agriculturas</h3>
			    <?php query_posts( array (
			    	'post_type'      => 'revista',
			    	'post_parent'    => 0,
			    	'posts_per_page' => 1
			    ));
			    if ( have_posts() ) :
			    	while ( have_posts() ) : the_post()?>
			    		<a class="img-responsive text-center" href="<?php echo get_permalink( get_the_ID() ); ?> "><?php the_revista_thumbnail( 'large' ); ?></a>
			    	<?php endwhile;
			    endif; ?>
		    </div>
    <?php
		}
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