<?php
/**
 * Template Name: Revistas Antigas
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */

$plugin = "issuem/issuem.php";
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active($plugin) ){
  // plugin esta ativo
  echo do_shortcode('[issuem_articles posts_per_page="6" order="ASC"]');
} else {
  echo "<p><strong>Você precisa habilitar o plugin IssueM</strong></p>";
}

echo "<h1>Numeros Anteriores</h1>";

$args = array('post_type' => 'pdf_newspaper');

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
    echo get_the_post_thumbnail();

    $post_id = get_the_ID();
    $pdf = get_post_meta( $post_id, "wp_custom_attachment", true);
    echo "<p>";
    echo '<a href="' . $pdf["url"] . '">' . get_the_title() . '</a>';
    echo "</p>";
	}
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	echo "Você não possui nenhuma revista antiga. Por favor adicione uma revista para visualizar o resultado nesta página.";
}
