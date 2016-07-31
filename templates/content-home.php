			<aside id="destaques">
				<div class="container hidden-xs">
					<div class="row">
						<div class="col-md-12 destaques-slides">
							<?php
							$feature = new WP_Query(
								array(
									'posts_per_page' => 5,
									'ignore_sticky_posts' => 1,
									'meta_key' => '_home',
									'meta_value' => 1
								));
							$feature_ids = array();
							if($feature->have_posts()) { ?>
							<div class="cycle-slideshow highlights">
								<ul class="slides">
									<div class="cycle-pager"></div>
									<div class="cycle-prev"></div>
									<div class="cycle-next"></div>
									<?php while ( $feature->have_posts() ) : $feature->the_post();
									$feature_ids[] = get_the_ID();?>
									<li class="cycles-slide">
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<div class="slide cf">
												<?php if ( has_post_thumbnail() ) : ?>
												<div class="entry-image">
													<?php
													$post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
													$thumb = wp_get_attachment_image_src($post_thumbnail_id, 'slider', false);
													if(is_array($thumb)) {?>
													<div class="highlights-image">
														<?php the_post_thumbnail('slide'); ?>
														<!--img class="img-responsive" src="<?php echo $thumb[0]; ?>" /-->
													</div>
													<?php } else { ?>
													<div class="highlights-image"><img class="img-responsive" src="http://placehold.it/1140x400/"></div>
													<?php } ?>
												</div>
												<?php endif; ?>
												<div class="bd">
													<div class="entry-meta">
														<?php $category = get_the_category();
														if(is_array($category) && count($category) > 0)
														{?>
														<a href="<?php echo get_category_link( $category[0]->term_id ); ?>"><?php echo $category[0]->cat_name; ?></a>
														<?php } ?>
													</div>
													<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo substr(the_title($before = '', $after = '', FALSE), 0, 70).'...'; ?></a></h3>
													<div class="btn-saibamais"><a href="<?php the_permalink(); ?>" class="btn btn-lg" role="button">saiba mais</a></div>
													<div class="entry-summary">
														<?php the_excerpt(); ?>
													</div>
												</div>
											</div><!-- /.slide -->
										</article><!-- /article -->
									</li>
									<?php endwhile; ?>
								</ul><!-- .swiper-wrapper -->
							</div><!-- .swiper-container -->
							<?php wp_reset_postdata(); }
							else {
								if ( current_user_can( 'edit_theme_options' ) )
							{?>
							<div class="empty-feature">
								<p>
									<?php printf( __( 'Para exibir suas imagens destacadas aqui, acesse a <a href="%s">Página de Edição de Posts</a> e selecione a opção "Imagem Destacada" em seus posts. Você pode selecionar quantas você desejar, mas use com sabedoria.', 'aspta' ), admin_url('edit.php') ); ?></p>
							</div>
							<?php }
							} // have_posts() ?>
						</div>
					</div>
				</div>
			</aside><!-- /.destaques -->
			
			<div class="clearfix"></div>
			
			<aside id="noticias">
				<div class="container">
					<div class="row">
						<?php 
						$news = new WP_Query(
							array(
								'posts_per_page' => 3, // TODO Custom option
								'ignore_sticky_posts' => 1,
								'orderby' => 'date', // TODO Custom option
								'order' => 'DESC', // TODO Custom option
								'post__not_in' => $feature_ids // Remove highlighted posts
							));
						$news_ids = array();
						if($news->have_posts()) : while ( $news->have_posts() ) : $news->the_post();
						$news_ids[] = get_the_ID(); ?>
						<div class="col-md-4 col-sm-4 noticia center-block home-news-list">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-meta">
									<?php $category = get_the_category(); ?>
									<div class="cat-title">
										<h5><a href="<?php echo get_category_link( $category[0]->term_id ); ?>"><?php echo $category[0]->cat_name; ?></a></h5>
									</div> 
								</div><!-- /.entry-meta -->
								<div class="home-news">
									<a id="featured-thumbnail" href="<?php the_permalink(); ?>" rel="nofollow">
										<div class="entry-image">
											<?php if ( has_post_thumbnail() ) {
												the_post_thumbnail('destaque');
											} else { ?>
											<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/aspta-no-thumb.jpg">
											<?php } ?>
										</div>
									</a>
									<div class="entry-title post-title">
										<a href="<?php the_permalink(); ?>"><h4><?php echo substr(the_title($before = '', $after = '', FALSE), 0, 60).'...'; ?></h4></a>
									</div>
								</div><!-- /.home-news -->
							</article><!-- /article -->
						</div><!-- /.home-news-list -->
						
						<?php endwhile;

						/* If no posts, then serve error message */
						else: ?>
						<div class="col-md-12 noticia center-block home-news-list">
							<article>
								<p><?php _e( 'Em breve você poderá ler notícias aqui.', 'aspta' ); ?></p>
							</article>
						</div>
						<?php endif; ?>
					</div>

					<div class="row">
						<div class="btn-noticias"><a class="btn btn-lg" href="<?= get_site_url(); ?>/noticias" role="button">ver todas as notícias</a></div>
					</div>
				</div>
			</aside><!-- /.noticias -->
			
			<div class="clearfix"></div>
			
			<aside id="prog-midias">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-10 programas-locais">
							<h3>Programas Locais</h3>
							<?php
							$programs = get_terms("programas");

                                                        foreach($programs as $program){
                                                          ?>
							  <div class="programa">
                                                            <h3 class="prog-title" ><?= $program->name; ?></h3>
						            <h4 class="prog-desc"><?= $program->description; ?></h4>
						            <div class="btn-saibamais"><a class="btn btn-lg" role="button" href="<?= get_term_link($program); ?>">saiba mais</a></div>
							  </div>
                                                          <?php
                                                        }
							?>
						</div><!-- /.programas-locais -->
						
						<div class="col-md-4 col-sm-10 video-da-semana">
							<h3>Vídeo da Semana</h3>
							<div class="video">
								<h4>Assista aos vídeos da ASPTA.</h4>
								<div class="box-video">
									<img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-video.jpg" alt="">
								</div>
							</div>
						</div><!-- /.video-da-semana -->
						
						<div class="col-md-4 col-sm-10 revista">
							<h3>Revista Agriculturas</h3>
							<img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-revista.jpg" alt="Revista Agriculturas">
						</div>
					</div>
				</div>
			</aside><!-- /.prog-midias -->
			
			<div class="clearfix"></div>
			
			<aside id="camp-blog">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-10 boletim-campanha">
							<h3 class="text-uppercase branco">Brasil livre de transgênicos e agrotóxicos</h3>
							<h4>Comentários ao pedido de liberação comercial do milho transgênico Liberty Link</h4>
							<h4 class="branco">Rotular é preciso</h4>
							<h4 class="sem-borda">Livro: Lavouras Transgênicas - Riscos e incertezas: mais de 750 estudos desprezados pelos órgãos reguladores de OGMs</h4>
							<h4 class="text-uppercase branco assine">Assine o Boletim da Campanha</h4>
							<form>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Digite seu e-mail e aperte enter">
								</div>
								<button type="submit" class="btn btn-lg btn-enviar">enviar</button>
							</form>
						</div>
						<div class="col-md-4 col-sm-10 blog-pratos-limpos">
							<h3 class="text-uppercase">Blog Em Pratos Limpos</h3>
							<?php
							$rss = fetch_feed('http://pratoslimpos.org.br/?feed=rss2');
							if (!is_wp_error( $rss ) ) :
								$maxitems = $rss->get_item_quantity(6);
								$rss_items = $rss->get_items(0, $maxitems);
							endif;
							if ($maxitems == 0){ ?><li><?php _e("Não há itens no blog."); ?></li><?php }
							else
							$numItems = count($rss_items);
							$i = 0;
							foreach ( $rss_items as $item ) : ?>
							<p><strong><h4 class="<?php if( ++$i === $numItems ) echo "sem-borda"; ?>" ><a href='<?php echo esc_url( $item->get_permalink() ); ?>' title='<?php echo esc_html( $item->get_title() ); ?>' target="_blank"><?php echo esc_html( $item->get_title()); ?></a></h4></strong></p>
							<?php endforeach; ?>
							<!-- apenas como o rodi fez as coisas devemos usar como referencia -->
							<!--h4>Sementes da Paixão - Calendário 2016 da AS-PTA e do Polo da Borborema</h4>
							<h4>Nota da ANA "Em defesa da Democracia e contra o golpe"</h4>
							<h4 class="laranja">TTIP: já ouviu falar?</h4>
							<h4>La tierra en Paraguay</h4>
							<h4>Pela redução de agrotóxicos</h4>
							<h4 class="sem-borda">Nota do MST sobre o impeachment da presidenta Dilma</h4-->
						</div>
						
						<div class="col-md-4 col-sm-10 campanhas">
							<h3 class="text-uppercase">Campanhas</h3>
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-polo-da-borborema.jpg" alt="Polo da Borborema" />
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-coletivo-triunfo.jpg" alt="Coletivo triunfo" />
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-produtos-da-gente.jpg" alt="Produtos da Gente" />
						</div>
					</div>
				</div>
			</aside><!-- /.camp-blog -->
			
			<div class="clearfix"></div>
			
			<aside id="redes-e-parcerias">
				<div class="container">
					<div class="row">
						<div class="col-md-2 parcerias-title">
							<h3>redes e parcerias</h3>
						</div>
						<div class="col-md-10 parceiras-banner">
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-parcerias.jpg" />
						</div>
					</div>
				</div>
			</aside>
			
			<div class="clearfix"></div>
			
		</section>
