
		<footer class="footer clearfix">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 footer-assinatura">
						<?php dynamic_sidebar('sidebar-logo-text-footer'); ?>
					</div><!-- /.footer-assinatura -->
			    	<div class="col-md-8 footer-menu hidden-xs hidden-sm">
			    	  <?php dynamic_sidebar('sidebar-menu-footer'); ?>
			        </div>
			    </div>
			  </div>
  			<div class="footer-redes-sociais container-fluid">
				<div class="row">
					<div class="col-md-12">
						<ul class="footer-icones">
							<a href="http://www.facebook.com/asptaagroecologia/" target="_blank"><li class="fa fa-facebook" aria-hidden="true"></li></a>
							<a href="http://www.twitter.com/aspta/" target="_blank"><li class="fa fa-twitter" aria-hidden="true"></li></a>
							<a href="http://plus.google.com" target="_blank"><li class="fa fa-google-plus" aria-hidden="true"></li></a>
							<a href="http://www.youtube.com/channel/UCfRvRTdz58FkPVese6OzQmA" target="_blank"><li class="fa fa-youtube" aria-hidden="true"></li></a>
							<a href="http://vimeo.com/user7077452" target="_blank"><li class="fa fa-vimeo" aria-hidden="true"></li></a>
							<a href="https://www.instagram.com/agroecologiaaspta/" target="_blank"><li class="fa fa-instagram" aria-hidden="true"></li></a>
						</ul>
					</div>
				</div>
			</div>
			<script>
				jQuery(document).ready(function(){
					new UISearch( document.getElementById( 'sb-search' ) );
				});
			</script>
			<?php wp_footer(); ?>
		</footer>
