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
  'lib/assets.php',									// Scripts and Stylesheets
  'lib/blog_clean_plates.php',						// Blog Clean Plates Widget
  'lib/customizer.php',								// Theme Customizer
  'lib/extras.php',									// Custom Functions
  'lib/footer.php',									// Footer Widget
  'lib/hacklab_post2home/hacklab_post2home.php',	// Hacklab Fetured Posts
  'lib/library.php',								// Library AS-PTA Widget
  'lib/newspaper.php',								// Newspaper AS-PTA Widget
  'lib/see_also.php',								// See also about AS-PTA Widget
  'lib/setup.php',									// Theme Setup
  'lib/titles.php',									// Page Titles
  'lib/wp_bootstrap_navwalker.php',					// Nav Walker Class
  'lib/wrapper.php',								// Theme Wrapper Class
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


/*
 * newspaper Agriculturas e Campanha
 * 
 * Inclui os arquivos relacionados com estas duas áreas do site
 */
include( plugin_dir_path( __FILE__ ).'functions-revista.php' );
include( plugin_dir_path( __FILE__ ).'functions-campanha.php' );

/*
 * Custom Taxonomies
 * Criando as taxonomias personalizadas 'Temas de intervenção' / 'Programas'
 */
function aspta_build_taxonomies() {

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
	    'add_new_item' 		=> 'Adicionar Novo Tema de intervenção',
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

add_action( 'init', 'aspta_build_taxonomies', 0 );

/** Mau Alert
    The ideia is insert functions on extras but dont works now... :(

    get selected mark for options on newspaper edition select
    but this is usable for ...
**/

function is_selected($value, $get, $name) {
    if (isset($get[$name]) && $value == $get[$name])
      echo "selected";
}

// Create the query var so that WP catches the custom /member/username url
add_filter('query_vars', function($vars){
  $vars[] = 'newspaper';
  return $vars;
} , 100);

// create page newspaper
add_action( 'init', function(){
  add_rewrite_tag('%newspaper%', '([^&]+)');
  add_rewrite_rule('^revistas/([^/]*)?', 'index.php?newspaper=$matches[1]', 'top');
});

add_action( 'init', function(){
  $rules = get_option('rewrite_rules');
  $found = false;
  if(is_array($rules))
  {
    foreach($rules as $rule)
    {
      if(strpos($rule, 'newspaper') !== false)
      {
        $found = true;
        break;
      }
    }
    if(! $found)
    {
      global $wp_rewrite;
      $wp_rewrite->flush_rules();
    }
  }
});
