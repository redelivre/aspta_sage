<?php get_header(); ?>
  <div class="wrap">
    <div class="content col-sm-11 blog-sidebar">
      <?php echo get_query_var( 'newspaper'); ?>
    </div>

  </div>
  	<div class="col-sm-3 blog-sidebar" style="float:left;">
	  <?php //dynamic_sidebar('sidebar-primary'); ?>
	</div>
<footer class="content-info">
  <div class="container">
    <div class="row">
    	<?php dynamic_sidebar('sidebar-logo-text-footer'); ?>
    	<?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
  </div>
</footer>







