<?php
/*
 * Template Name: Edições Anteriores
 */
query_posts( array (
      'post_type'   => 'revista',
      'post_parent' => 0,
      'posts_per_page'=> -1,
      'paged'     => $paged
      ));

?>
<h4>Edições anteriores</h4>
<div id="revistas-anteriores">
<?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post()?>
  <a href="<?php echo get_permalink( get_the_ID() ); ?> "><?php the_revista_thumbnail( 'medium' ); ?></a>
  <?php
  endwhile;
  endif;
  ?>
</div>


