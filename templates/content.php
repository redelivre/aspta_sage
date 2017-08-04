							<article id="lista" <?php post_class(); ?>>
                <div class="row lista-post">
                <?php if (has_post_thumbnail()) { ?>
                  <div class="col-md-4 lista-img">
                    <a id="featured-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="nofollow">
                      <div class="image_search_post">
                        <?php if (has_post_thumbnail()) {
                          the_post_thumbnail('lista-categoria');
                        } else {
                          $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_content(), $matches);
                          $first_img = $matches[1];
                          if ( !empty($first_img) ) { ?>
                            <img class="img-responsive" src="<?php echo $first_img[0]; ?>" />
                          <?php }
                        }?>
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
                <hr>
							</article><!-- /#item -->