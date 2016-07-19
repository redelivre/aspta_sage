<header class="banner">
  <div class="container">
  	<div class="header-background">
	<div id="sb-search" class="sb-search">
		<form role="search" method="get" class="searchform group">
			<input class="sb-search-input" placeholder="Busca!" 
			type="search" 
			value="<?php echo get_search_query() ?>" 
			name="s" 
			id="search" 
			title="<?php echo esc_attr_x( 'Search for: ', ' label' ) ?>"
			action="<?php echo home_url( '/' ); ?>">

			<input class="sb-search-submit" type="submit" value="">
			<span class="sb-icon-search"></span>
		</form>
	</div>	    
	    <?php
	    	$logo = get_theme_mod( 'aspta_sage_upload_logo', false );
	    	if ( $logo ) : ?>
		    <div class='site-logo'>
		      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( $logo ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
		    </div>
		<?php else : ?>
		    <hgroup>
		        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
		        <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
		    </hgroup>
		<?php endif; ?>
	</div>
    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
    </nav>
  </div>
  <script type='text/javascript' src='http://aspta.pretao/wp-content/themes/aspta_sage/assets/scripts/classie.js'></script>
  <script type='text/javascript' src='http://aspta.pretao/wp-content/themes/aspta_sage/assets/scripts/uisearch.js'></script>
  <script>
	new UISearch( document.getElementById( 'sb-search' ) );
  </script>
</header>
