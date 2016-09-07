		<footer class="footer clearfix">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 footer-assinatura">
						<?php dynamic_sidebar('sidebar-logo-text-footer'); ?>
					</div><!-- /.footer-assinatura -->
    	<div class="footer-menu hidden-xs hidden-sm">
    	  <?php dynamic_sidebar('sidebar-footer'); ?>
        </div>
    </div>
  </div>
  <div class="footer-redes-sociais">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="footer-icones">
								<ul>
									<li class="icone"><a href="http://www.facebook.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt=""/></a></li>
									<li class="icone"><a href="http://plus.google.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-gplus.png" alt=""/></a></li>
									<li class="icone"><a href="http://www.youtube.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.png" alt=""/></a></li>
								</ul>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
			<script src="<?php bloginfo('template_url'); ?>/js/classie.js"></script>
			<script src="<?php bloginfo('template_url'); ?>/js/uisearch.js"></script>
			<script src="<?php bloginfo('template_url'); ?>/js/jquery.cycle2.min.js"></script>
			<script>
				new UISearch( document.getElementById( 'sb-search' ) );
			</script>
			<?php wp_footer(); ?>		
</footer>
