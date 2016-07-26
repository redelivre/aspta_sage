<div class="programas">
  Programas: <?= get_the_term_list( get_the_ID(), "programas" ); ?>
</div>
<div class="temas">
  Tema: <?= get_the_term_list( get_the_ID(), "temas-de-intervencao" ); ?>
</div>
<div class="tags">
  Tags: <?= get_the_tag_list('',', '); ?>
</div>
<hr>
<h2><?php _e("Noticias Relacionas", "aspta"); ?></h2>
<?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_tags($post->ID);
if ($tags) {
$first_tag = $tags[0]->term_id;
$args=array(
             'tag__in' => array($first_tag),
             'post__not_in' => array($post->ID),
             'posts_per_page'=>5,
             'caller_get_posts'=>1
           );
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) :
while ($my_query->have_posts()) : $my_query->the_post(); ?>
  <hr>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Link para <?php the_title_attribute(); ?>">
      <?php the_title(); ?>
    </a>
<?php
endwhile;
?>
<hr>
<hr>
<?php
endif;
wp_reset_query();
}
?>


