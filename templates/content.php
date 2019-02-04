							<article <?php post_class('lista'); ?>>
                <div class="row lista-post">
                <?php $thumb = aspta_get_post_thumbnail(false);
                      if ($thumb !== false) { ?>
                  <div class="col-md-4 lista-img">
                    <a class="featured-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="nofollow">
                      <div class="image_search_post">
                        <?php aspta_get_post_thumbnail(); ?>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-8 lista-conteudo">
                <?php } else { ?>
                  <div class="col-md-12 lista-conteudo">
                <?php } ?>
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
							</article><!-- /#item -->