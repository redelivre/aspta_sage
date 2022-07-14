<section class="aspta-content">
	<aside id="destaques">
		<div class="container">
			<div class="row">
				<div class="col-md-12 destaques-slides">
					<?php
					$feature = new WP_Query(
						array(
							'posts_per_page' => 5,
							'ignore_sticky_posts' => 1,
							'meta_key' => '_home',
							'meta_value' => 1,
							'category_name' => 'noticias'
						));
					$feature_ids = array();
					if($feature->have_posts()) { ?>
					<div class="cycle-slideshow highlights" data-cycle-center-horz="true" data-cycle-center-vert="true">
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
											</div>
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
											<div class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo substr(the_title($before = '', $after = '', FALSE), 0, 250); ?></a></div>
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
						'posts_per_page' => 3,
						'ignore_sticky_posts' => 1,
						'orderby' => 'date',
						'order' => 'DESC',
						'post__not_in' => $feature_ids // Remove highlighted posts
					));
				$news_ids = array();
				if($news->have_posts()) : while ( $news->have_posts() ) : $news->the_post();
				$news_ids[] = get_the_ID(); ?>
				<div class="col-md-4 col-sm-12 col-xs-12 noticia center-block home-news-list">
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
									<?php aspta_get_post_thumbnail(); ?>
								</div>
							</a>
							<div class="entry-title post-title">
								<a href="<?php the_permalink(); ?>"><h4><?php echo the_title(); ?></h4></a>
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
				<div class="btn-noticias"><a class="btn btn-lg" href="<?php get_site_url(); ?>/noticias" role="button">ver todas as notícias</a></div>
			</div>
		</div>
	</aside><!-- /.noticias -->

	<div class="clearfix"></div>

	<aside>
		<div id="prog-midias" class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12 blog-pratos-limpos">
					<h3 class="text-uppercase">Blog Em Pratos Limpos</h3>
					<?php $rss = fetch_feed('http://pratoslimpos.org.br/?feed=rss2');
					$maxitems = 0;
					$rss_items = array();
					if (!is_wp_error( $rss ) ) :
						$maxitems = $rss->get_item_quantity(6);
						$rss_items = $rss->get_items(0, $maxitems);
					endif;
					if ($maxitems == 0){ ?><li class="sem-borda"><?php _e("Não há itens no blog."); ?></li><?php }
					else {
						$numItems = count($rss_items);
						$i = 0;
						foreach ( $rss_items as $item ) : ?>
							<p><strong><h4 class="<?php if( ++$i === $numItems ) echo "sem-borda"; ?>" ><a href='<?php echo esc_url( $item->get_permalink() ); ?>' title='<?php echo esc_html( $item->get_title() ); ?>' target="_blank"><?php echo esc_html( $item->get_title()); ?></a></h4></strong></p>
						<?php endforeach;
					} ?>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12 revista">
					<?php dynamic_sidebar('agricultures_newspaper_home'); ?>
					<div class="row">
						<div class="btn-assine"><a class="btn btn-lg" href="<?php get_site_url(); ?>/revista-agriculturas/mobilize/" role="button">assine</a></div>
					</div>
				</div><!-- /.revista -->
				
				<div class="col-md-4 col-sm-6 col-xs-12 campanhas">
					<h3 class="text-uppercase">Campanhas</h3>
					<a href="https://agroecologiaemrede.org.br/" ><img class="img-responsive" style="margin-top: 2px; padding-top: 0;" src="<?php echo get_template_directory_uri(); ?>/assets/images/Banner_AeR_310x120.png" alt="Banner AeR" /></a>
					<a href="<?php get_site_url(); ?>/2015/05/metodo/" ><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner_lume.png" alt="Lume" /></a>
					<a href="<?php get_site_url(); ?>/tag/Acesso-a-mercados/" ><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-mercado-home.jpeg" alt="Alimentos Saudáveis" /></a>
					<a href="https://aspta.org.br/hortas-organicas-em-faixas-de-dutos/" ><img class="img-responsive" src="https://aspta.org.br/files/2022/07/Banner-digital_02.jpg" alt="Hortas Orgânicas em Faixas-de-Dutos" /></a>
				</div>
			</div>
		</div>
	</aside><!-- /.prog-midias -->

	<div class="clearfix"></div>

	<aside>
		<div class="container">
			<div class="row">
				<div id="redes-e-parcerias" class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 parcerias-title">
						<h3>redes e parcerias</h3>
					</div>
					<div class="col-md-10">
						<div class="parceria-banner">
							<a href="http://www6.ufrgs.br/abaagroeco" target="_blank"><img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-aba.jpg" /></a>
						</div>
						<div class="parceria-banner">
							<a href="http://alianzaagroecologia.redelivre.org.br/" target="_blank"><img class="mg-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-alianza.jpg" /></a>
						</div>
						<div class="parceria-banner" style="max-height: 141px;max-width: 180px;padding: 1em;margin-top: 4%;">
							<a href="https://www.agroecologiaemrede.org.br/" target="_blank"><img class="img-responsive center-block" center-block src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar_partiners/logo_AeR_cor_horizontal.png" /></a>
						</div>
						<div class="parceria-banner">
							<a href="http://www.agroecologia.org.br/" target="_blank"><img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-ana.jpg" /></a>
						</div>
						<div class="parceria-banner">
							<a href="http://www.agriculturesnetwork.org/" target="_blank"><img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-agriculture-network.jpg" /></a>
						</div>
						<div class="parceria-banner">
							<a href="http://www.asabrasil.org.br/" target="_blank"><img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-asa.jpg" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</aside>

	<div class="clearfix"></div>
</section>