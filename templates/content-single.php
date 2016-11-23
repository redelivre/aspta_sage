<section id="pagina">
	<?php while (have_posts()) : the_post(); ?>
	<article class="pagina-conteudo" <?php post_class(); ?>>
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="pagina-img">
			<?php  the_post_thumbnail('destaque-pagina');  ?>
		</div>
		<?php endif; ?>
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
	    	<!--div class="pagina-programa">
	    		<span>Programa: <?php // $program; ?></span>
	    	</div>
	    	<div class="pagina-tema">
	    		<span>Tema: <?php // $theme; ?></span>
	    		
	    	</div-->
	    	<div class="pagina-tags">
	    		<span><?php the_tags(); ?></span>
	    	</div>
	    </div>
	</article>
	
	<article class="pagina-conteudo">
		<div class="noticias-relacionadas">
			<h3 class="text-uppercase">Notícias Relacionadas</h3>
		</div>
	</article>
	
	<div class="pagina-compartilhamento">
		<span>Compartilhe esse conteúdo</span><br /><br />
		<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/redes_sociais.png" />
	</div>

	<div class="pagina-comentarios">
		<?php comments_template('/templates/comments.php'); ?>
	</div>
    
	  <?php endwhile; ?>
</section>