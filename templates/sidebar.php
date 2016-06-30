<?php //dynamic_sidebar('sidebar-primary'); ?>
<div class="sidebar-module">
<h2>Blog em pratos Limpos</h2>
<img src="http://fase.org.br/wp-content/uploads/2014/11/foto_capa-agriculturas.jpg"  />
<?php

$args = array(
       'post_type' => 'post',
       'fields' => 'ids',
       'post_status' => 'publish',
       'order' => 'DESC',
       'orderby' => 'date',
       'posts_per_page' => 6 
  );
$the_query = new WP_Query( $args );

?>

<h2>Blog em pratos Limpos</h2>

<?php
while ( $the_query->have_posts() ):
$the_query->the_post();
?> 

<p><a href="<?php get_permalink( the_ID() ); ?>"><?php echo get_the_title(); ?></a></p>

<?php
endWhile;
?>
<h2> Consulte Também</h2>

<img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/alizanza.png" alt="parceiro: Alianza por la Agroecologia"/>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/agroecologia-em-rede.png" alt="parceiro: Agroecologia em Rede"/>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/aba.png" alt="parceiro: aba Agroecologia"/>

</div>
