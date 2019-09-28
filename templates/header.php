<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="me" href="https://twitter.com/aspta">
		<link rel="canonical" href="/web/tweet-button">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
			
	<body <?php body_class(); ?>>
		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-sm-7 search">
						<div id="sb-search" class="sb-search hidden-xs">
							<form>
								<input class="sb-search-input" placeholder="Digite o que procura e pressione enter..." type="text" value="" name="s" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search" aria-hidden="true" data-icon="&#xf002;"></span>
							</form>
						</div>
					</div>
					<div class="col-md-5 col-sm-5 logo"><a href="<?php bloginfo('url'); ?>" title="AS-PTA"><img src="<?php echo get_theme_mod('aspta_logo') ? get_theme_mod('aspta_logo') : get_template_directory_uri(). "/assets/images/logo_aspta.png"; ?>" class="img-responsive center-block"></a></div>
				</div>
			</div><!-- /.topo -->
			
			<div class="menu-topo container-fluid">
				<div class="row">
					<nav class="navbar navbar-justified" role="navigation">
						<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

							<?php
								wp_nav_menu( array(
									'menu'              => 'aspta',
									'theme_location'    => 'aspta',
									'depth'             => 2,
									'container'         => 'div',
									'container_class'   => 'collapse navbar-collapse',
									'container_id'      => 'bs-example-navbar-collapse-1',
									'menu_class'        => 'nav navbar-nav',
									'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
									'walker'            => new wp_bootstrap_navwalker())
								);
							?>
						</div>
					</nav>
				</div>
			</div><!-- /.menu-topo -->
			
			<div class="clearfix"></div>
			
		</header><!-- /.header -->
