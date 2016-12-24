<?php
use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
?>
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap" role="document">
      <div class="content container">
        <main class="row">
          <aside id="todos" class="col-md-8"> 
            <?php 
            	include Wrapper\template_path();
            	global $wp;
  			      $type = key($wp->query_vars);
  		      ?>
            <?php get_template_part('templates/' . $type); ?>
          </aside>
          <?php if (Setup\display_sidebar()) : ?>
        	<aside id="page-sidebar" class="col-md-4 col-sm-12 hidden-xs">
            <div class="sidebar-page">
        		  <?php include Wrapper\sidebar_path(); ?>
            </div>
        	</aside><!-- /.sidebar -->
        	<?php endif; ?>
        </main><!-- /.main -->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
