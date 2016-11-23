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
          <?php if (Setup\display_sidebar()) : ?>
          <aside id="biblioteca" class="col-md-4 col-sm-12 hidden-xs">
            <div class="sidebar">
              <?php include Wrapper\sidebar_library(); ?>
            </div>
          </aside><!-- /.sidebar -->
          <?php endif; ?>
          <aside id="lista" class="col-md-8">
          <?php 
          	include Wrapper\template_path();
          	global $wp;
			      $type = key($wp->query_vars);
		      ?>
          <?php get_template_part('templates/' . $type); ?>
          </aside>
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
