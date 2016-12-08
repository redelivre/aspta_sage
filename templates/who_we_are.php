<?php
/**
 * Template Name: Quem Somos
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */
?>
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
</article>
<?php endwhile; ?>

<div id="menu-quem-somos" class="col-md-8">
	<a class="btn btn-default btn-lg btn-block btn-quem-somos" href="" role="button">Conselho Administrativo</a>
	<a class="btn btn-default btn-lg btn-block btn-quem-somos" href="" role="button">Equpe Executiva</a>
	<a class="btn btn-default btn-lg btn-block btn-quem-somos" href="" role="button">Agências Parceiras</a>
	<a class="btn btn-default btn-lg btn-block btn-quem-somos" href="" role="button">Planos Trienais</a>
	<a class="btn btn-default btn-lg btn-block btn-quem-somos" href="" role="button">Relatórios de Atividades</a>
	<a class="btn btn-default btn-lg btn-block btn-quem-somos" href="" role="button">Estatutos e Atas</a>
	<a class="btn btn-default btn-lg btn-block btn-quem-somos" href="" role="button">Demonstrações Financeiras</a>
	<a class="btn btn-default btn-lg btn-block btn-quem-somos" href="" role="button">Certidões e Títulos</a>
	<a class="btn btn-default btn-lg btn-block btn-quem-somos" href="" role="button">Licitações</a>
	<a class="btn btn-default btn-lg btn-block btn-quem-somos" href="" role="button">Apoiadores</a>
</div>
