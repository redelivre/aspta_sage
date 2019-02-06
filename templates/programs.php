<?php
/**
 * Template Name: Programas
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */
/**
 * Falta resolver o filtro da Taxonomia Programas para exibir apenas os três programas.
 */

$args = array(
    'post_status'   => 'publish',
    'post_type'     => 'page',
    'posts_per_page'=> -1,
    'post_parent'   => $post->ID
);
?>
					<div class="lista">
						<div class="titulo-pagina"><h1><?php the_title(); ?></h1></div>
						<?php // The Query
                        $the_query = new WP_Query( $args ); // The Loop
                        if ( $the_query->have_posts() ) :
                          while ( $the_query->have_posts() ) : $the_query->the_post() ?>
                          <div id="post-<?php the_ID(); ?>" class="row lista-post">

                          <?php if ( has_post_thumbnail() ) { ?>

                            <div class="col-md-4 lista-img">
                                <a id="featured-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="nofollow"><div class="image_search_post img-responsive"><?php the_post_thumbnail(); ?></div></a>
                            </div>
                            <div class="col-md-8 lista-conteudo">
                          <?php } else { ?>
                            <div class="col-md-12 lista-conteudo">
                          <?php } ?>
                                <div class="lista-titulo">
                                    <h4><a href="<?php the_permalink(); ?>" rel="nofollow"><?php the_title(); ?></a></h4>
                                </div>
                                <div class="lista-resumo">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>                          
                       <?php endwhile;
                            wp_reset_postdata();
                        else:  // no posts found
                            _e("Sem publicações...", "aspta");
                        endif;?>
                    </div> <!-- /#programas -->
