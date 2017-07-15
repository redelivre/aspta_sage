<?php
/*
 * Template Name: Edições Anteriores
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */

query_posts( array (
      'post_type'   => 'revista',
      'post_parent' => 0,
      'posts_per_page'=> -1,
      'paged'     => $paged
      ));

?>
<h4>Edições anteriores</h4>
<div id="revistas-anteriores" style="position:relative; float:left; clear:both">
<?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post()?>
  <a href="<?php echo get_permalink( get_the_ID() ); ?> "><?php the_revista_thumbnail( 'medium' ); ?></a>
  <?php
    if (preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', get_the_content(), $match))
      echo '<br><a href="'.$match[0][0].'">Download PDF</a>';
  ?>
  <?php
  endwhile;
  endif;
  ?>
</div>


