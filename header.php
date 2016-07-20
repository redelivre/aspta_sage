<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.js"></script>
		<?php wp_head(); ?>
	</head>

	<body>
		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-sm-7">
						<!--form class="pesquisa-topo search" role="search">
							<div class="input-group">
								<input type="text" class="form-control search-input" placeholder="Pesquisar">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default search-submit">Pesquisar</button>
								</span>
							</div>
						</form-->
						<div id="sb-search" class="sb-search hidden-xs">
							<form>
								<input class="sb-search-input" placeholder="Digite o que procura e pressione enter..." type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search" aria-hidden="true" data-icon="&#xf002;"></span>
							</form>
						</div>
					</div>
					<div class="col-md-5 col-sm-5 logo"><a href="<?php bloginfo('home'); ?>" title="AS-PTA"><img src="<?php echo get_theme_mod('aspta_logo'); ?>" class="img-responsive center-block"></a></div>
				</div>
			</div><!-- /.topo -->
			
			<div class="menu-topo">
				<div class="container">
					<div class="row">
						<nav class="navbar navbar-justified" role="navigation">
						  <div class="container-fluid">
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
						                'menu'              => 'primary',
						                'theme_location'    => 'primary',
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
				</div>
			</div><!-- /.menu-topo -->
			
			<div class="clearfix"></div>
			
		</header><!-- /.header -->