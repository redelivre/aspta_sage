<?php

global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
		$search_query['posts_per_page'] = 5;
		$search_query['paged'] = get_query_var('paged');
		$search_query['post_status'] = 'publish';
	} // foreach
} //if

$the_query = new WP_Query( $search_query );

?>


<div id="lista">
	<div class="titulo-pagina"><h1>Resutados para: <?php echo $search_query['s']; ?></h1></div>
</div>

<?php if (!$the_query->have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Nenhum resultado encontrado', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
  <div id="lista">
  	<?php get_template_part('templates/search', 'search'); ?>
  </div>
<?php endwhile; ?>

<div class="col-md-8 text-center paginacao">
<?php $big = 999999999; // need an unlikely integer
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $the_query->max_num_pages,
	'prev_next' => false,
) ); ?>
