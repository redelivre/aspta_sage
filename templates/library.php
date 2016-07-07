<?php 
/* 
Template Name: Biblioteca 
*/

      var_dump($_GET);

?>

<h1><?php the_title();?></h1>

<form method="get">

<div class="library-box">
  <h4>Tipos de Materiais</h4>
  <?php 
  $terms = get_terms( 'category', array( 'hide_empty' => false ) );

  foreach($terms as $term){

    if ($term->slug !== "sem-categoria"){

      ?>
      <input type='checkbox' name="<?php echo $term->slug ?>" <?php echo isset($_GET[$term->slug])?"checked":"" ?> value="<?php echo $term->name ?>" />
      <label for="<?php echo $term->slug ?>"><?php echo $term->name ?></label>
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
    ?>
      <input type='checkbox' name="<?php echo $term->slug ?>" <?php echo isset($_GET[$term->slug])?"checked":"" ?> value="<?php echo $term->name ?>" />
      <label for="<?php echo $term->slug ?>"><?php echo $term->name ?></label>    <?php
  }
  ?>
</div>
<div class="library-box">
  <h4>Revista Agriculturas</h4>
  <p>
    <label>Titúlo de artigo</label>
    <input type="text" name="article_title" value="<?php echo isset($_GET['article_title'])?$_GET['article_title']:"" ?>" />
  </p>
  <p>
    <label>Autor</label>
    <input type="text" name="article_author" value="<?php echo isset($_GET['article_author'])?$_GET['article_author']:"" ?>" />
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
    <?php $years = range(date("Y"), 2011); ?>
    <select name="year">
     <?php foreach($years as $year){ ?>
     <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
     <?php } ?>
    </select>
  </p>
</div>
<div class="library-box">
  <h4>Programas</h4>
  <?php
  
  $terms = get_terms( 'programas', array( 'hide_empty' => false ) );
  
  foreach($terms as $term){
    echo "<label for='term-" . $term->slug . "'>" . $term->name . "</label>";
    echo "<input type='checkbox' name='term-" . $term->slug . "' value='" . $term->name . "' />";
  }
?>
</div>
<div>
<br>
<input type="submit" id="submit" class="button button-primary" value="Pesquisar"        />
<div>
</form>
