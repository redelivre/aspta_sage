							<article id="lista" <?php post_class(); ?>>
						    	<div class="row lista-post">
						    		<div class="col-md-4 lista-img">
					                    <?php $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_content(), $matches);
					                      $first_img = $matches[1];
					                      if ( !empty($first_img) ) :?>
					                        <a id="featured-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="nofollow"><div class="image_search_post img-responsive" style="height:230px; width:100%; background-image: url('<?php echo $first_img[0]; ?>')"></div></a>
					                    <?php else; ?>
					                    	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img class="img-responsive" src="<?php wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ? the_post_thumbnail_url('medium') : get_template_directory_uri().'/assets/images/aspta-no-thumb.jpg'; ?>" /></a>
					                    <?php endif; ?>
									</div>
									<div class="col-md-8 lista-conteudo">
										<div class="lista-titulo">
											<h4 style="margin-top:0;"><a href="<?php the_permalink(); ?>" rel="nofollow"><?php the_title(); ?></a></h4>
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
							</article><!-- /#item -->
