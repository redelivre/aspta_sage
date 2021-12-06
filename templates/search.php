              <article <?php post_class(); ?>>
                <div class="row lista-post">
                  <div class="col-md-4 lista-img">
                  	<?php AsptaDivi::get_post_thumbnail(); ?>
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
              </article><!-- /#item -->