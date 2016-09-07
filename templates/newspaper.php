<?php 

  $edition = urldecode(get_query_var( 'newspaper' ));
  if (!(strpos($edition, 'V') == 0) && !(strpos($edition, 'N') == 5)) {
    $edition = 'V13, N1';
  }
  ?>
  <div class="sidebar-module">
  <h3>Revista Agriculturas Edições anteriores</h3>
  <?php
    query_posts( array (
      'post_type'      => 'revista',
      's' => $edition,
      'post_parent'    => 0,
      'posts_per_page' => 1
    ));
    if ( have_posts() ) : 
    while ( have_posts() ) : the_post()
  ?>
  <a href="<?= get_permalink( get_the_ID() ); ?> "><?php the_revista_thumbnail( 'large' ); ?></a>
  <?php
    endwhile;
    endif;
    wp_reset_query();
  ?>
  </div>
  <?php
	    $args = array( 
		    'post_type' => 'revista',
		    's' => $edition,
		    'posts_per_page' => 6,
		    'post_status' => 'publish',
	    );

	    // The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
		  echo '<ul>';
		  while ( $the_query->have_posts() ) {
		    $the_query->the_post();
    ?>
		    <a href="<?= get_permalink(); ?>"><li><?php echo get_the_title() ?></li></a>
		    <li><?= get_the_author(); ?></li>
    <?php
		}
		echo '</ul>';
		/* Restore original Post Data */
		wp_reset_postdata();
		} else {
		  // no posts found
		  _e("No posts found");
		}

		$the_query = new WP_Query( array (
	        'post_type'   => 'revista',
	      	'post_parent' => 0,
	      	'posts_per_page'=> -1,
      	));

		?>
		<h4>Edições anteriores</h4>
		<div id="revistas-anteriores">
        <?php
		while ( $the_query->have_posts() ):
			$the_query->the_post();
			$target = get_the_title();
			preg_match("/V\d{1,3},\sN\d{1,3}/", $target , $keyword);
			if (!empty($keyword)): ?>
  				<a href="<?php echo get_site_url(); ?>/revistas/<?php echo $keyword[0]; ?>">
  				<?php the_revista_thumbnail( 'medium' ); ?></a>
				<?php
			endif;
		endwhile;
        wp_reset_query();
       ?>
	   </div>
