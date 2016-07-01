<?php //dynamic_sidebar('sidebar-primary'); ?>
<div class="sidebar-module">
<h2>Revista Agriculturas</h2>
<?php
query_posts( array (
      'post_type'      => 'revista',
      'post_parent'    => 0,
      'posts_per_page' => 1,
      'paged'          => $paged
      ));
if ( have_posts() ) : 
  while ( have_posts() ) : the_post()?>
  <a href="<?php echo get_permalink( $revista->ID ); ?> "><?php the_revista_thumbnail( 'large' ); ?></a>
  <?php
  endwhile;
  endif;
  ?>

  <h2>Blog em pratos Limpos</h2>
<?php
  $rss = fetch_feed('http://pratoslimpos.org.br/?feed=rss2');


  if (!is_wp_error( $rss ) ) : 

    $maxitems = $rss->get_item_quantity(6); 
    $rss_items = $rss->get_items(0, $maxitems); 
    endif;
?>
<?php 
if ($maxitems == 0) echo '<li>'.__("Não há itens no blog.").'</li>';
else 
foreach ( $rss_items as $item ) : ?>
<a href='<?php echo esc_url( $item->get_permalink() ); ?>' title='<?php echo esc_html( $item->get_title() ); ?>'> <?php echo esc_html( $item->get_title() ); ?></a>
<?php endforeach; ?>




<h2> Consulte Também</h2>

<img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/alizanza.png" alt="parceiro: Alianza por la Agroecologia"/>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/agroecologia-em-rede.png" alt="parceiro: Agroecologia em Rede"/>
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/aba.png" alt="parceiro: aba Agroecologia"/>

</div>
