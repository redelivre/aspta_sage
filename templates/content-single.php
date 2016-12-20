<section id="pagina">
	<?php while (have_posts()) : the_post(); ?>
	<article class="pagina-conteudo" <?php post_class(); ?>>
                <?php if (wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))){ ?>
		<div class="pagina-img">
			<img class="img-responsive" src="<?php wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ? the_post_thumbnail_url('destaque-pagina') : get_template_directory_uri().'/assets/images/aspta-no-thumb.jpg'; ?>" />
		</div>
                <?php } ?>
		<div class="pagina-data">
			<time class="updated" datetime="<?php get_post_time('c', true); ?>"><?php the_date(); ?></time>
		</div>
		<div class="pagina-categoria">
			<?php the_category(); ?>
		</div>
		<h1 class="entry-title"><strong><?php the_title(); ?></strong></h1>
	    <div class="entry-content">
	    	<?php the_content(); ?>
	    </div>
	    <div class="pagina-meta">
	    	<div class="pagina-tags">
	    		<span><?php the_tags(); ?></span>
	    	</div>
	    </div>
	</article>
	
	<article class="pagina-conteudo">
		<div class="noticias-relacionadas">
			<h3 class="text-uppercase">Notícias Relacionadas</h3>
			<?php $categories = get_the_category($post->ID);  
			if ($categories) {  $category_ids = array();  
				foreach($categories as $individual_category)  
					$category_ids[] = $individual_category->term_id; 
		 
				$args=array( 
					'category__in' => $category_ids, 
					'post__not_in' => array($post->ID), 
					'showposts'=>3, // Number of related posts that will be shown. 
					'ignore_sticky_posts'=>1 
				); 
				$my_query = new wp_query($args); 
				if( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
			        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				    <?php endwhile;
				    wp_reset_postdata();
				} 
			} ?>
		</div>
	</article>
	
	<div class="pagina-compartilhamento">
		<span>Compartilhe esse conteúdo</span><br /><br />
		<div class="btn-share">
			<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php the_title_attribute(); ?>" target="_blank">
				<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook-share.png" />
			</a>
		</div>
		<div class="btn-share">
			<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank">
				<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/google-share.png" />
			</a>
		</div>
		<div class="btn-share">
			<a href="https://twitter.com/share?text=<?php the_title(); ?>&?url=<?php the_permalink(); ?>&via=aspta" data-dnt="true" target="_blank">
				<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-share.png" />
			</a>
			<script>window.twttr = (function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0],
			    t = window.twttr || {};
			  if (d.getElementById(id)) return t;
			  js = d.createElement(s);
			  js.id = id;
			  js.src = "https://platform.twitter.com/widgets.js";
			  fjs.parentNode.insertBefore(js, fjs);

			  t._e = [];
			  t.ready = function(f) {
			    t._e.push(f);
			  };

			  return t;
			}(document, "script", "twitter-wjs"));</script>
		</div>
		<div class="btn-share">
			<a href="whatsapp://send?text=<?php the_title(); ?>: <?php the_permalink(); ?>" data-dnt="true" target="_blank">
				<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-share.png" />
			</a>
		</div>
	</div>

	<div class="pagina-comentarios">
		<?php comments_template('/templates/comments.php'); ?>
	</div>
    
	  <?php endwhile; ?>
</section>
