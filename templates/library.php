<?php
/**
 * Template Name: Biblioteca
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */
?>

			<aside id="biblioteca">
				<div class="container">
					<div class="row">
						<div class="col-md-8 titulo">
							<h1 class="titulo">Biblioteca</h1>
						</div>
						
						<div class="clearfix"></div>
						
						<form method="get">
						
						<div class="col-md-8 library-box tipos-de-materiais">
						  <h4>Tipos de Materiais</h4>
						  <div class="opcoes duas-colunas">
						  	<?php $terms = get_terms( 'category', array( 'hide_empty' => false ) );
						  		foreach($terms as $term){
						  			if ($term->slug !== "sem-categoria"){
							?>
							          <div class="input-group">
							          	<span class="input-group-addon">
							          		<input type='checkbox' name="material[]" <?php echo isset($_GET["material"]) ? (in_array($term->term_id, $_GET["material"])?"checked":""):"" ?> value="<?php echo $term->term_id ?>" />
								          <a href="<?php echo get_term_link($term) ?>"><label for="material[]"><?php echo $term->name ?></label></a>
							          	</span>
							          </div>
							    <?php } 
							    } ?>
						  </div>
						</div>
						
						<div class="clearfix"></div>
						
						<div class="col-md-8 library-box temas-de-intervencao">
						  <h4>Temas de intervenção</h4>
						  <div class="opcoes duas-colunas">
						  	<?php $terms = get_terms( 'temas-de-intervencao', array( 'hide_empty' => false ) );
						  		foreach($terms as $term){
							    // arrumar o $_GET sendo obtido direto isso vai dar problema... :( ?>
							    <div class="input-group">
							    	<span class="input-group-addon">
							    		<input type='checkbox' name="theme[]" <?php echo isset($_GET["theme"])? (in_array($term->term_id, $_GET["theme"])?"checked":""): ""; ?> value="<?php echo $term->term_id ?>" />
							    		<a href="<?php echo get_term_link($term) ?>"><label for="theme[]"><?php echo $term->name ?></label></a>
							    	</span>
							    </div>
							<?php } ?>
						  </div>
						</div>
						
						<div class="clearfix"></div>
						
						<div class="col-md-8 library-box revista-agriculturas">
						  <h4>Revista Agriculturas</h4>
						  <div class="opcoes">
						  	<div class="input-group">
						  		<span class="input-group-addon"><label>Titúlo de artigo</label></span>
					          	<input type="text" class="form-control" name="article_title" value="<?php echo isset($_GET['article_title'])?$_GET['article_title']:"" ?>" />  	
					        </div>
							  
						  	<div class="input-group">
						  		<span class="input-group-addon"><label>Autor</label></span>						
							    <?php $args = array(
									      'orderby' => 'nicename',
									      'role__not_in' => 'administrator'
									    );
									   $_authors = get_users($args);
							    ?>
					    		<select class="form-control" name ="_author">
							    	<option value="">Nenhum autor selecionado</option>
							    	<?php foreach ($_authors as $_author) { ?>
								        <option value="<?php echo $_author->ID ?>" <?php echo isset($_GET["_author"])?($_author->ID==$_GET["_author"]?"selected":""):"" ?>> <?php echo $_author->user_nicename ?></option>
								    <?php } ?>
					    		</select>
							</div>

						  	<div class="input-group">
						  		<span class="input-group-addon"><label>Edição</label></span>
								<?php // Create a new Query
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
								<select class="form-control" name ="edition">
									<option value="">Nenhuma edição Selecionada</option>
									<?php while ( $the_query->have_posts() ):
										$the_query->the_post();
										$target = get_the_title();
										preg_match("/V\d{1,3},\sN\d{1,3}/", $target , $keyword);
										if (!empty($keyword)){
									?>
									<option value="<?php echo $keyword[0]; ?>" <?php is_selected($keyword[0],$_GET, "edition"); ?>><?php echo $keyword[0]; ?></option>
									<?php } endWhile; ?>
								</select>
								<?php wp_reset_query(); // Restore original Query ?>
							</div>

						  	<div class="input-group">
						  		<span class="input-group-addon"><p><label>Ano</label></p></span>													    <!-- this is cool -> https://codex.wordpress.org/Function_Reference/get_year_link -->
							    <?php $_years = range(date("Y"), 2011);  ?>
							    <select class="form-control" name="_year">
								    <option value="">Nenhum ano selecionado</option>
								    <?php foreach($_years as $_year){ ?>
								    <option value="<?php echo $_year; ?>" <?php is_selected($_year,$_GET, "_year"); ?>><?php echo $_year; ?></option>
								    <?php } ?>
							    </select>
							  </div>
						  </div>
						</div>
						
						<div class="clearfix"></div>
						
						<div class="col-md-8 library-box programas">
							<h4>Programas</h4>
							<div class="opcoes">
								<?php $terms = get_terms( 'programas', array( 'hide_empty' => false ) );
									foreach($terms as $term){
								?>
							    <div class="input-group">
							    	<span class="input-group-addon">
							    		<input type='checkbox' name="program[]" <?php echo isset($_GET["program"])? (in_array($term->term_id, $_GET["program"])?"checked":""): ""; ?> value="<?php echo $term->term_id ?>" />
							    		<a href="<?php echo get_term_link($term) ?>"><label for="program[]"><?php echo $term->name ?></label></a>
							    	</span>
							    </div>
								<?php } ?>
							</div>
						</div>
						
						<div class="clearfix"></div>

						<div class="col-md-8 pesquisar">
							<button type="submit" id="submit" class="btn btn-lg btn-enviar" value="Pesquisar">Pesquisar</button>
						</div>
						
						<div class="clearfix"></div>

						</form>

					</div>
					
					<div class="row">
						<div class="col-md-4 biblioteca-sidebar">

						</div>
						
						<div class="clearfix"></div>
						
					</div>
				</div>
			</aside>
		</section>

<?php
// formando array de tipos de materiais
wp_reset_query();
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
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'tax_query' => $tax_query,
  ); 
}else{
  // revista
  $args = array( 
    'post_type' => 'revista',
    's' => $article_title,
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'author' => $author,
    'date_query' => array( 'year' => $_year),
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
