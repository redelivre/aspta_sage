<?php
/**
 * Template Name: Campanha Transgênicos
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */
?>

<h1><?= the_title(); ?></h1>
<hr>
<?php
// The Query
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$the_query = new WP_Query( 
              array(
              	'posts_per_page' => '5',
              	'paged'  => $paged,
              	'ignore_sticky_posts' => 1,
              	'orderby' => 'date',
              	'order' => 'DESC',
              	'post_type' => 'campanha',
              	'post_status' => 'publish',
              	'tax_query' => array(
              		array(
              			'taxonomy' => 'itens-de-campanha',
                      	'field'    => 'slug',
                      	'terms'    => 'campanha-transgenicos',
                    	),
                	),
            	)
			);
// The Loop
if ( $the_query->have_posts() ) {
  while ( $the_query->have_posts() ) : ?>
    <?= $the_query->the_post(); ?>
    <?php if ( has_post_thumbnail() ) : ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <img src="<?php the_post_thumbnail_url('medium'); ?>"/>
      </a>
    <?php endif; ?>
    <a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a>
    <?= the_excerpt(); ?>
    <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
    <hr>
  <?php
  endwhile;
/* Restore original Post Data */
wp_reset_postdata();
} else {
	// no posts found
}
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $the_query->max_num_pages
) );
?>