<?php
/**
 * Template Name: Biblioteca
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */

// data declaration

$material = array();
$theme = array();
$program = array();
$author = "";
$_year = null;
$article_title = "";
$all_post_type = array('post', 'revista', 'campanha');

// data validation
{
  // this two if's walk together
  if(isset($_GET["article_title"])){
    $article_title = $_GET["article_title"];
  }
  if (isset($_GET["edition"])) {
    if ($_GET["edition"]!="") {
      $article_title = $_GET["edition"] ;  
    }
    
  }  
}
if(isset($_GET["material"]))
  $material = $_GET["material"];
if(isset($_GET["theme"]))
  $theme = $_GET["theme"];
if (isset($_GET["program"])) {
  $program = $_GET["program"];
}
if (isset($_GET["_author"])) {
  $author = $_GET["_author"];
}
if (isset($_GET["_year"])) {
  $_year = (int)$_GET["_year"];
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
$aux = array();
foreach ($program as $key => $value) {
  $aux[] = $value;
}
$program = $aux;
$args = array();
$tax_query =  array();
if (isset($_GET["theme"])) {
      $tax_query[] = array(
        'taxonomy' => 'temas-de-intervencao',
        'field' => 'term_id',
        'terms' => $theme,
      );   
}   
if (isset($_GET["program"])) {
      $tax_query[] = array(
        'taxonomy' => 'programas',
        'field' => 'term_id',
        'terms' => $program,
      );
}
if (isset($_GET["material"]) || isset($_GET["theme"]) || isset($_GET["program"])) {
  //todos
  $args = array( 
    'post_type' => array('post', 'revista', 'campanha'),
    'cat' => $material,
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'tax_query' => $tax_query,
  ); 
}else{
  // revista
  $args = array( 
    'post_type' => 'revista',
    's' => $article_title,
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'author' => $author,
    'date_query' => array( 'year' => $_year),
  );
 
}
?>
<div class="col-md-8 col-sm-offset-1">
  <h1 class="row col-sm-offset-1" ><?= the_title(); ?></h1>
  <hr>
  <?php
  // The Query
  $the_query = new WP_Query( $args );
  // The Loop
  if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) : ?>
      <?= $the_query->the_post(); ?>
      <div class="row" >
        <div class="col-md-4">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <img class="img-responsive" src="<?= 
                wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ? 
                  the_post_thumbnail_url('medium') : 
                  get_template_directory_uri().'/assets/images/aspta-no-thumb.jpg'; 
             ?>"/>
          </a>
        </div>
        <div class="col-md-16">
          <div>
            <strong><?php foreach (wp_get_post_categories(get_the_ID()) as $category){ echo the_category($category);}?></strong>
          </div>
          <div>
            <h4><a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a></h4>
          </div>
          <?= the_excerpt(); ?>
          <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
        </div>
      </div>
      <hr>
    <?php endwhile;
    /* Restore original Post Data */
    wp_reset_postdata();
  } else {
    // no posts found
    _e("No posts...", "aspta");
  }
  ?>
  
  <div class="col-md-8 text-center">
  <?php
  $big = 999999999; // need an unlikely integer
  
  echo paginate_links( array(
  	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  	'format' => '?paged=%#%',
  	'current' => max( 1, get_query_var('paged') ),
  	'total' => $the_query->max_num_pages,
          'prev_next' => false,
  ) );
  ?>
  </div>
</div>
