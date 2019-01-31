<?php
/**
 * Template Name: Revistas Antigas
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */

// $plugin = "issuem/issuem.php";
// include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
// if ( is_plugin_active($plugin) ){

//   the_widget( 'IssueM_Active_Issue', array(
//     'display_issue_cover' => true,
//     'display_issue_name' => false,
//     'display_pdf_link' => true)
//   );

//   $issuem_settings = get_issuem_settings();

//   the_widget('IssueM_Article_List' , array('article_format' => '%CATEGORY[1]% %TITLE% %BYLINE%'));
 
// }
// echo "<h1>Numeros Anteriores</h1>";
// $orderby = 'issue_order';
// 		$issues = array();
// 		$count = 0;
// 		$issuem_issues = get_terms( 'issuem_issue' );
// 		foreach ( $issuem_issues as $issue ) {
// 			$issue_meta = get_option( 'issuem_issue_' . $issue->term_id . '_meta' );
// 			// If issue is not a Draft, add it to the archive array;
// 			if ( !empty( $issue_meta ) && !empty( $issue_meta['issue_status'] )
// 				&& ( 'Live' === $issue_meta['issue_status'] || current_user_can( apply_filters( 'see_issuem_draft_issues', 'manage_issues' ) ) ) ) {
// 				switch( $orderby ) {
// 					case "issue_order":
// 						if ( !empty( $issue_meta['issue_order'] ) )
// 							$issues[ $issue_meta['issue_order'] ] = $issue->term_id;
// 						else
// 							$issues[ '-' . ++$count ] = $issue->term_id;
// 						break;
// 					case "name":
// 						$issues[ $issue_meta['name'] ] = $issue->term_id;
// 						break;
// 					case "term_id":
// 						$issues[ $issue->term_id ] = $issue->term_id;
// 						break;
// 				}
// 			} else {
// 				$issues[ '-' . ++$count ] = $issue->term_id;
// 			}
// 		}
// 		krsort( $issues );
// 		//array_shift( $issues );
// foreach($issues as $issue){
//  echo '<img src="'.get_site_url().'/wp-content/uploads/2017/06/'.basename(get_attached_file(get_issuem_issue_cover($issue))).'">';
// }

// novas revistas antigas (apos o lancamento do site novo - issueM)

// $args = array(
// 	'post_type' => 'article',
//         'tax_query' => array(
//                         'taxonomy'      => 'issuem_issue',
//                         'field'         => 'slug',
//                         'terms'         => get_active_issuem_issue()
//                 ),
// );
// // The Query
// $the_query = new WP_Query( $args );
// // The Loop
// if ( $the_query->have_posts() ) {
// 	echo '<ul>';
// 	while ( $the_query->have_posts() ) {
// 		$the_query->the_post();
// 		echo '<li>' . get_the_title() . '</li>';
// 	}
// 	echo '</ul>';
// 	/* Restore original Post Data */
// 	wp_reset_postdata();
// } else {
// 	// no posts found
// }


?>

<div id="lista" class="page-header">
  <div class="titulo-pagina"><h1><?php echo get_the_title() ?></h1></div>
</div>

<?php
// revistas antigas (antes do site novo)
query_posts( array (
      'post_type'   => 'revista',	
      'post_parent' => 0,
      'posts_per_page'=> -1,
      ));
?>

<?php
if ( have_posts() ) :?>
    <div class="issuem_archives_shortcode" >
    <?php
    while ( have_posts() ) : the_post();
        if (
            preg_match_all(
                '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', get_the_content(), $match
    	    )
        ):
        ?>
    		<div class="issuem_archive">
                <div>
                	<a href="<?php echo get_permalink( get_the_ID() ); ?> " class="featured_archives_cover">
                		<?php the_revista_thumbnail( 'medium', '' ); ?>
                	</a>
                	<p style="width:100px;">
                        <a href="<?php echo $match[0][0]; ?>">PDF</a>
                    </p>
                </div>
        	</div><?php
        endif;
    endwhile;?>
	</div><?php
endif;