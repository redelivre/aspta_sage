<?php
/**
 * Template Name: Nova Revista
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/newspaper', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
