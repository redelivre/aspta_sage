<?php
/**
 * Template Name: Noticias
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */
?>

					<aside id="lista">
						<div class="titulo-pagina"><h1><?php the_title(); ?></h1></div>
				        <div class="clearfix"></div>
				        <?php // The Query
				        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
				        $the_query = new WP_Query( 
				        	array(
				        		'posts_per_page' => '5',
				        		'paged'  => $paged,
				        		'ignore_sticky_posts' => 1,
				        		'orderby' => 'date',
				        		'order' => 'DESC',
				        	)
				        ); // The Loop
				        if ( $the_query->have_posts() ) {
				        	while ( $the_query->have_posts() ) : ?>
				        	<?php $the_query->the_post(); ?>
				        	<div class="row lista-post">
				        		<div class="col-md-4 lista-img">
				        			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img class="img-responsive" src="<?php wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ? the_post_thumbnail_url('medium') : get_template_directory_uri().'/assets/images/aspta-no-thumb.jpg'; ?>" /></a>
				        		</div>
				        		<div class="col-md-8 lista-conteudo">
				        			<div class="lista-categoria">
				        				<?php foreach (wp_get_post_categories(get_the_ID()) as $category){ echo the_category($category); } ?>
				        			</div>
				        			<div class="lista-titulo">
				        				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				        			</div>
									<div class="lista-resumo">
										<?php the_excerpt(); ?>
									</div>
									<div class="lista-meta-time">
										<time class="updated" datetime="<?php get_post_time('c', true); ?>"><?php the_date(); ?></time>
									</div>
				        		</div>
				        	</div>
					      <hr>
					      <?php endwhile; /* Restore original Post Data */
					      wp_reset_postdata();
					      } else { // no posts found
					      	_e("No posts...", "aspta");
					      } ?>
					      
					      <div class="col-md-8 text-center paginacao">
					      	<?php $big = 999999999; // need an unlikely integer
					      	echo paginate_links( array(
					      		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					      		'format' => '?paged=%#%',
					      		'current' => max( 1, get_query_var('paged') ),
					      		'total' => $the_query->max_num_pages,
					      		'prev_next' => false,
					      	) ); ?>
					      </div>
					</aside><!-- /#noticias -->