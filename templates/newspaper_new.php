<?php
/**
 * Template Name: Nova Revista
 */
?>

<?php $issue = get_term_by( 'id', get_newest_issuem_issue_id(), 'issuem_issue' ); ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/newspaper', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
