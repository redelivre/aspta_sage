<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <!-- removendo o header pois o css esta sendo carregado na tag e nao em uma classe. -->
    <!--header-->
      <?php
        if(has_post_thumbnail()): ?>
          <img class="img-responsive" src="<?php echo the_post_thumbnail_url(); ?>">
      <?php
        endif;
      ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    <!--/header-->
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
