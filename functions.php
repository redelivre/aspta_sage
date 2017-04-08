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
	    'rewrite' 			=> array( 'slug' => 'temas-de-intervencao' ),
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
	    'rewrite' 			=> array( 'slug' => 'programas' ),
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

// Custom Post Type for pdf newspaper

add_action('init', 'create_newspaper_pdf');
function create_newspaper_pdf() {
 $labels = array(
    'name'               => esc_html__( 'PDF Revista', 'aspta_sage' ),
    'singular_name'      => esc_html__( 'PDF Revista', 'aspta_sage' ),
    'add_new'            => esc_html__( 'Adicionar Novo', 'aspta_sage' ),
    'add_new_item'       => esc_html__( 'Adicionar Novo PDF Revista', 'aspta_sage' ),
    'edit_item'          => esc_html__( 'Editar PDF Revista', 'aspta_sage' ),
    'new_item'           => esc_html__( 'Novo PDF Revista', 'aspta_sage' ),
    'all_items'          => esc_html__( 'Cadastrar Revista do histórico', 'aspta_sage' ),
    'view_item'          => esc_html__( 'Visualizar PDF Revista', 'aspta_sage' ),
    'search_items'       => esc_html__( 'Buscar PDF Revista', 'aspta_sage' ),
    'not_found'          => esc_html__( 'Nada Encontrado', 'aspta_sage' ),
    'not_found_in_trash' => esc_html__( 'Nada encontrado na Lixeira', 'aspta_sage' ),
    'parent_item_colon'  => ''
  );

  $args = array(
    'labels'             => $labels,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'can_export'         => true,
    'show_in_nav_menus'  => true,
    'query_var'          => true,
    'has_archive'        => true,
    'capability_type'    => 'post',
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail' ),
    'menu_icon'          =>  'dashicons-media-document',
  );


  $plugin = "issuem/issuem.php";

  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if ( is_plugin_active($plugin) ){
    $args['show_in_menu'] = 'edit.php?post_type=article';
  }

  register_post_type( 'pdf_newspaper', $args );
}


add_action("admin_menu", "update_menu");

function update_menu() {
  global $menu;

  $menu[26][0] = "Revista Agriculturas";
}

add_action('add_meta_boxes', 'add_custom_meta_boxes');
function add_custom_meta_boxes() {
  add_meta_box('pdf_newspaper-meta-box', __('Anexar PDF', 'aspta_sage'), 'display_pdf_box', 'pdf_newspaper', 'normal', 'high');
}

function display_pdf_box(){
  $html = '<p class="description">';
  $html .= 'Upload your PDF here.';
  $html .= '</p>';
  $html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" value="" size="25">';
  echo $html;

  global $post;
  $pdf = get_post_meta( $post->ID, "wp_custom_attachment", true);
  if($pdf){
    echo "<p>";
    echo '<a src="' . $pdf["url"] . '">Link para o pdf</a>';
    echo "</p>";
  }
}

add_action('save_post', 'save_custom_meta_data');
function save_custom_meta_data($id) {
    if(!empty($_FILES['wp_custom_attachment']['name'])) {
        $supported_types = array('application/pdf');
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];

        if(in_array($uploaded_type, $supported_types)) {
            $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('Aconteceu um erro ao tentar fazer o upload do seu arquivo. O erro foi: ' . $upload['error']);
            } else {
                update_post_meta($id, 'wp_custom_attachment', $upload);
            }
        }
        else {
            wp_die("O arquivo que você esta tentando enviar não é um PDF.");
        }
    }
}

add_action('post_edit_form_tag', 'update_edit_form');
function update_edit_form() {
    echo ' enctype="multipart/form-data"';
}
