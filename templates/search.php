<article <?php post_class(); ?>>
  <div id="lista" class="entry-summary">
    <?php 
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_content(), $matches);
  	  $first_img = $matches[1];
  	  if ( !empty($first_img) ) :?>
  	    <div class="image_search_post" style="height:160px; width:220px; background-image: url('<?php echo $first_img[0]; ?>')"" ></div>
  	<?php endif; ?>
  	<?php 
  	  foreach (wp_get_post_categories(get_the_ID()) as $category) {
        echo the_category($category);
      } 
    ?>
  	<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
  	<?php the_excerpt(); ?>
    <strong><time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time></strong>
    <hr class="next_post">
  </div>
</article>
