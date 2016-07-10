<?php 
/* 
Template Name: Biblioteca 
*/

      var_dump($_POST);

?>

<h1><?php the_title();?></h1>

<form method="post">

<div class="library-box">
  <h4>Tipos de Materiais</h4>
  <?php 
  $terms = get_terms( 'category', array( 'hide_empty' => false ) );
  foreach($terms as $term){

    if ($term->slug !== "sem-categoria"){
      ?>
      <input type='checkbox' name="material[]" 
      <?php echo isset($_POST["material"]) ? (in_array($term->term_id, $_POST["material"])?"checked":""):"" ?> 
      value="<?php echo $term->term_id ?>" />
      <a href="<?php echo get_term_link($term) ?>"><label for="material[]"><?php echo $term->name ?></label></a>
      <?php
    }
  }
  
  ?>
<div>
<div class="library-box">
  <h4>Temas de intervenção</h4>
  <?php
  
  $terms = get_terms( 'temas-de-intervencao', array( 'hide_empty' => false ) );
  
  foreach($terms as $term){

    // arrumar o $_POST sendo obtido direto isso vai dar problema... :(
    ?>
      <input type='checkbox' name="theme[]" 
      <?php echo isset($_POST["theme"])? (in_array($term->term_id, $_POST["theme"])?"checked":""): ""; ?> 
      value="<?php echo $term->term_id ?>" />
      <a href="<?php echo get_term_link($term) ?>"><label for="theme[]"><?php echo $term->name ?></label></a>
      <?php
  }
  ?>
</div>
<div class="library-box">
  <h4>Revista Agriculturas</h4>
  <p>
    <label>Titúlo de artigo</label>
    <input type="text" name="article_title" value="<?php echo isset($_POST['article_title'])?$_POST['article_title']:"" ?>" />
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
    <br>
    <select name ="_author">
    <option value="">Nenhum autor selecionado!</option>
<?php

  foreach ($_authors as $_author) {
    ?>
      <option value="<?php echo $_author->ID ?>" 
      <?php echo isset($_POST["_author"])?($_author->ID==$_POST["_author"]?"selected":""):"" ?>>
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
  <option value="<?php echo $keyword[0]; ?>" <?php is_selected($keyword[0],$_POST, "edition"); ?>><?php echo $keyword[0]; ?></option>
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
    <?php $_years = range(date("Y"), 2011);  ?>
    <select name="_year">
    <option value="">Nenhum ano selecionado!</option>
     <?php foreach($_years as $_year){ ?>
     <option value="<?php echo $_year; ?>" <?php is_selected($_year,$_POST, "_year"); ?>><?php echo $_year; ?></option>
     <?php } ?>
    </select>
  </p>
</div>
<div class="library-box">
  <h4>Programas</h4>
  <?php
  
  $terms = get_terms( 'programas', array( 'hide_empty' => false ) );
  
  foreach($terms as $term){
  ?>
      <input type='checkbox' name="program[]" 
      <?php echo isset($_POST["program"])? (in_array($term->term_id, $_POST["program"])?"checked":""): ""; ?> 
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

// formando array de tipos de materiais

wp_reset_query();


// data declaration

$material = array();
$theme = array();
$author = "";
$_year = "";
$all_post_type = array('post', 'revista', 'campanha');


// data validation

if(isset($_POST["article_title"])){
  $article_title = $_POST["article_title"];
}

if(isset($_POST["material"]))
  $material = $_POST["material"];

if(isset($_POST["theme"]))
  $theme = $_POST["theme"];

if (isset($_POST["_author"])) {
  $author = $_POST["_author"];
}

if (isset($_POST["_year"])) {
  $_year = (int)$_POST["_year"];
}

// data prepare

$aux = array();

foreach ($material as $key => $value) {
  $aux[] = $value;
}

$material = $aux;

$aux = array();


foreach ($theme as $key => $value) {
  $aux[] = $value;
}


$theme = $aux;

var_dump($material);
var_dump($theme);


$args = array();

if (isset($_POST["article_title"]) || isset($_POST["_author"])) {
  $args = array( 
    'post_type' => 'revista',
    's' => $article_title,
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'author' => $author,
    'date_query' => array( 'year' => $_year),
  );
}else{
  $args = array( 
    'post_type' => array('post', 'revista', 'campanha'),
    'cat' => $material,
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'tax_query' => array(
      array(
        'taxonomy' => 'temas-de-intervencao',
        'field' => 'term_id',
        'terms' => $theme,
      ),
    ),
  );  
}





// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
  echo '<ul>';
  while ( $the_query->have_posts() ) {
    $the_query->the_post();?>
    <a href="<?php echo get_permalink(); ?>"><h4><?php echo get_the_title() ?></h4></a>
    <!--li><?php echo get_post_type() ?></li-->
  <?php
  }
  echo '</ul>';
  /* Restore original Post Data */
  wp_reset_postdata();
} else {
  // no posts found
}

$numberofpost = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts;");
 
echo "The number of rows in posts table are:" .$numberofpost;
