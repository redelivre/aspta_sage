<?php //dynamic_sidebar('sidebar-primary'); ?>

<div class="col-sm-11 col-sm-offset-1 blog-sidebar">
<div class="sidebar-module">
<h3>Revista Agriculturas</h3>
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
</div>
<div class="sidebar-module">
<h3>Blog em pratos Limpos</h3>
<?php
  $rss = fetch_feed('http://pratoslimpos.org.br/?feed=rss2');
  if (!is_wp_error( $rss ) ) : 
    $maxitems = $rss->get_item_quantity(6); 
    $rss_items = $rss->get_items(0, $maxitems); 
    endif;
if ($maxitems == 0){
?>
  <li><?php _e("Não há itens no blog."); ?></li>
<?php
}
else 
foreach ( $rss_items as $item ) : ?>
  <p>
    <strong>
      <a href='<?php echo esc_url( $item->get_permalink() ); ?>' 
      title='<?php echo esc_html( $item->get_title() ); ?>'>
      <?php echo esc_html( $item->get_title() ); ?></a>
    </strong>
  </p>
  
<?php endforeach; ?>
</div>
<div class="sidebar-module">
  <h3> Consulte Também</h3>
  <div class="logo_partiners" >
    <a href="http://aspta.org.br/2014/03/projeto-alianca-pela-agroecologia/" >
      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/alizanza.png" alt="parceiro: Alianza por la Agroecologia"/>
    </a>
    <a href="http://www.agroecologiaemrede.org.br/" >
      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/agroecologia-em-rede.png" alt="parceiro: Agroecologia em Rede"/>
    </a>
    <a href="http://www6.ufrgs.br/abaagroeco" >
      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_partiners/aba.png" alt="parceiro: aba Agroecologia"/>
    </a>
  </div>
</div>
</div>
