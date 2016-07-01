<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/bootstrap-nav-walker.php', // nav walker class
  'lib/hacklab_post2home/hacklab_post2home.php' // hacklab fetured posts
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


/*
 * Revista Agriculturas e Campanha
 * 
 * Inclui os arquivos relacionados com estas duas áreas do site
 */
include( plugin_dir_path( __FILE__ ).'functions-revista.php' );
include( plugin_dir_path( __FILE__ ).'functions-campanha.php' );

/*
 * Custom Taxonomies
 * Criando as taxonomias personalizadas 'Temas de intervenção' / 'Programas'
 */
function build_taxonomies() {

	// Temas de intervenção
	  $labels = array(
	    'name' 				=> 'Temas de intervenção',
	    'singular_name'	 	=> 'Tema de intervenção',
	    'search_items' 		=> 'Pesquisar temas',
	    'all_items' 		=> 'Todos os temas',
	    'parent_item' 		=> 'Tema pai',
	    'parent_item_colon' => 'Tema pai: ',
	    'edit_item' 		=> 'Editar tema', 
	    'update_item' 		=> 'Atualizar tema',
	    'add_new_item' 		=> 'Adicionar Novo Tema de Intervenção',
	    'new_item_name' 	=> 'Novo tema',
	    'menu_name' 		=> 'Temas de intervenção'
	  ); 	
	
	  register_taxonomy( 'temas-de-intervencao', 'post', array(
	    'hierarchical'		=> true,
	    'labels' 			=> $labels,
	    'show_ui' 			=> true,
	  	'show_in_nav_menus' => false,
	    'query_var' 		=> true,
	  	'capabilities'      => array('edit_terms' => false,'manage_terms' => false),
	    'rewrite' 			=> array( 'slug' => 'aspta-temas-de-intervencao' ),
	  ));

	  // Programas
	  $labels = array(
	    'name' 				=> 'Programas',
	    'singular_name'	 	=> 'Programa',
	    'search_items' 		=> 'Pesquisar programas',
	    'all_items' 		=> 'Todos os programas',
	    'parent_item' 		=> 'Programa pai',
	    'parent_item_colon' => 'Programa pai: ',
	    'edit_item' 		=> 'Editar programa', 
	    'update_item' 		=> 'Atualizar programa',
	    'add_new_item' 		=> 'Adicionar Novo Programa',
	    'new_item_name' 	=> 'Novo programa',
	    'menu_name' 		=> 'Programas'
	  ); 	
	
	  register_taxonomy( 'programas', 'post', array(
	    'hierarchical'		=> true,
	    'labels' 			=> $labels,
	    'show_ui' 			=> true,
	  	'show_in_nav_menus' => false,
	    'query_var' 		=> true,
	  	'capabilities'      => array('edit_terms' => false,'manage_terms' => false),
	    'rewrite' 			=> array( 'slug' => 'aspta-programas' ),
	  ));
}

add_action( 'init', 'build_taxonomies', 0 );

