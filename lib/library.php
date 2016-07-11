<?php

namespace Roots\Sage\Widget;

use WP_Widget;
use WP_Query;

/**
 * Footer widget
 */

class LibraryWidget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'library_widget',
      'description' => __('Search Library AS-PTA'),
    );
    parent::__construct( 'library_widget', __('Search Library Widget'), $widget_ops );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    ?>
    <form method="get" action="<?php echo get_site_url() ?>/biblioteca">

<div class="library-box">
  <h4>Tipos de Materiais</h4>
  <?php 
  $terms = get_terms( 'category', array( 'hide_empty' => false ) );
  foreach($terms as $term){

    if ($term->slug !== "sem-categoria"){
      ?>
      <input type='checkbox' name="material[]" 
      <?php echo isset($_GET["material"]) ? (in_array($term->term_id, $_GET["material"])?"checked":""):"" ?> 
      value="<?php echo $term->term_id ?>" />
      <a href="<?php echo get_term_link($term) ?>"><label for="material[]"><?php echo $term->name ?></label></a>
      <?php
    }
  }
  
  ?>
</div>
<div class="library-box menu-sanfona">
  <h4>Temas de intervenção</h4>
  <?php
  
  $terms = get_terms( 'temas-de-intervencao', array( 'hide_empty' => false ) );
  
  foreach($terms as $term){

    // arrumar o $_GET sendo obtido direto isso vai dar problema... :(
    ?>
      <input type='checkbox' name="theme[]" 
      <?php echo isset($_GET["theme"])? (in_array($term->term_id, $_GET["theme"])?"checked":""): ""; ?> 
      value="<?php echo $term->term_id ?>" />
      <a href="<?php echo get_term_link($term) ?>"><label for="theme[]"><?php echo $term->name ?></label></a>
      <?php
  }
  ?>
</div>
<div class="library-box menu-sanfona">
  <h4>Revista Agriculturas</h4>
  <p>
    <label>Titúlo de artigo</label>
    <input type="text" name="article_title" value="<?php echo isset($_GET['article_title'])?$_GET['article_title']:"" ?>" />
  </p>
  <p>
    <label>Autor</label>
    <?php
  $args = array(
      'orderby' => 'nicename',
      'role__not_in' => 'administrator'
    );
   $_authors = get_users($args);
    ?>
    <select name ="_author">
    <option value="">Nenhum autor selecionado!</option>
<?php

  foreach ($_authors as $_author) {
    ?>
      <option value="<?php echo $_author->ID ?>" 
      <?php echo isset($_GET["_author"])?($_author->ID==$_GET["_author"]?"selected":""):"" ?>>
      <?php echo $_author->user_nicename ?></option>
    <?php
  }
?>
</select>
  </p>
  <p>
    <label>Edição</label>
<?php
// Create a new Query
$args = array(
         'post_type' => 'revista',
         'fields' => 'ids',
       'post_status' => 'publish',
       's' => 'V',
       'posts_per_page' => -1
  );
$the_query = new WP_Query( $args );
 
// The Loop
?>
<select name ="edition">
<option value="">Nenhuma edição Selecionada!</option>
<?php
while ( $the_query->have_posts() ):
$the_query->the_post();
$target = get_the_title();
preg_match("/V\d{1,3},\sN\d{1,3}/", $target , $keyword);
if (!empty($keyword)){
?>
  <option value="<?php echo $keyword[0]; ?>" <?php is_selected($keyword[0],$_GET, "edition"); ?>><?php echo $keyword[0]; ?></option>
<?php
}

endWhile;
?>
</select>
<?php 
// Restore original Query
wp_reset_query();

?>
  </p>
  <p>
    <label>Ano</label>
    <!-- this is cool -> https://codex.wordpress.org/Function_Reference/get_year_link -->
    <?php $_years = range(date("Y"), 2011);  ?>
    <select name="_year">
    <option value="">Nenhum ano selecionado!</option>
     <?php foreach($_years as $_year){ ?>
     <option value="<?php echo $_year; ?>" <?php is_selected($_year,$_GET, "_year"); ?>><?php echo $_year; ?></option>
     <?php } ?>
    </select>
  </p>
</div>
<div class="library-box menu-sanfona">
  <h4>Programas</h4>
  <?php
  
  $terms = get_terms( 'programas', array( 'hide_empty' => false ) );
  
  foreach($terms as $term){
  ?>
      <input type='checkbox' name="program[]" 
      <?php echo isset($_GET["program"])? (in_array($term->term_id, $_GET["program"])?"checked":""): ""; ?> 
      value="<?php echo $term->term_id ?>" />
      <a href="<?php echo get_term_link($term) ?>"><label for="program[]"><?php echo $term->name ?></label></a>
  <?php
  }
?>
</div>
<div>
<br>
<input type="submit" id="submit" class="button button-primary" value="Pesquisar" />
<div>
</form>
<?php
  }

  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    // outputs the options form on admin
  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   */
  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
  }
}
