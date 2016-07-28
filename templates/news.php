<?php
/**
 * Template Name: Noticias
 */

// The Query
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
var_dump($paged);
$the_query = new WP_Query( array(  'posts_per_page' => '5', 'paged'  => $paged ) );

// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) : ?>
		<?= $the_query->the_post(); ?>
		<div><a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a></div>
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
