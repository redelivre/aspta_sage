<?php
	$feature = new WP_Query(
			array(
				'posts_per_page' => 5,
				'ignore_sticky_posts' => 1,
				'meta_key' => '_home',
				'meta_value' => 1
			));
	$feature_ids = array();
	if($feature->have_posts())
	{
		?>
		<div class="cycle-slideshow highlights">
			<ul class="slides">
				<div class="cycle-pager"></div>
				<div class="cycle-prev"></div>
				<div class="cycle-next"></div><?php
				while ( $feature->have_posts() ) : $feature->the_post();
					$feature_ids[] = get_the_ID();?>
					<li class="cycles-slide">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="media slide cf"><?php
								if ( has_post_thumbnail() ) : ?>
									<div class="entry-image"><?php
										$post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
										$thumb = wp_get_attachment_image_src($post_thumbnail_id, 'slider', false);
										if(is_array($thumb))
										{?>
											<div class="highlights-image" style="background-image: url(<?php echo $thumb[0]; ?>)" ></div><?php
										}?>
									</div><?php
								endif; ?>
								<div class="bd">
									<div class="entry-meta">
										<?php $category = get_the_category();
										if(is_array($category) && count($category) > 0)
										{?>
											<a href="<?php echo get_category_link( $category[0]->term_id ); ?>"><?php echo $category[0]->cat_name; ?></a><?php
										}?>
									</div>
									<h2 class="entry-title">
										<a href="<?php the_permalink(); ?>"><?php echo substr(the_title($before = '', $after = '', FALSE), 0, 60).'...'; ?></a>
									</h2>
									<div class="entry-summary">
										<?php the_excerpt(); ?>
									</div>
								</div>
							</div><!-- /slide -->
						</article><!-- /article -->
					</li>
				<?php endwhile; ?>
			</ul><!-- .swiper-wrapper -->
		</div><!-- .swiper-container -->
		<?php
		wp_reset_postdata();
	}
	else
	{
		if ( current_user_can( 'edit_theme_options' ) )
		{?>
			<div class="empty-feature">
				<p><?php printf( __( 'To display your featured posts here go to the <a href="%s">Post Edit Page</a> and check the "Feature" box. You can select how many posts you want, but use it wisely.', 'guarani' ), admin_url('edit.php') ); ?></p>
			</div><?php
		}
	} // have_posts()
?>
<div class="clearfix"></div>

<?php dynamic_sidebar('sidebar-home-session-1'); ?>
<?php dynamic_sidebar('sidebar-home-session-2'); ?>
<?php dynamic_sidebar('sidebar-home-session-banners'); ?>
