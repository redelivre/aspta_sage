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

?>

<div class="lista page-header">
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
    $covers = AsptaNewspaper::get_issuem_archive_covers(array(), array(106,150));
    
    //array_shift( $issues );
    foreach($covers as $cover){ ?>
		<div class="issuem_archive">
			<div>
				<a href="<?php echo $cover['url']; ?>" class="featured_archives_cover" >
					<?php echo $cover['cover']; ?>
				</a>
				<p style="width:100px;">
					<?php echo $cover['pdf']; ?>
				</p>
			</div>
       	</div><?php
    }
    do_issuem_archives(array());
    while ( have_posts() ) : the_post();
        if (
            preg_match_all(
                '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', get_the_content(), $match
    	    )
        ):
        ?>
    		<div class="issuem_archive">
                <div>
                	<a href="<?php echo get_permalink( get_the_ID() ); ?>" class="featured_archives_cover" >
                		<?php the_revista_thumbnail( 'medium' ); ?>
                	</a>
                	<p style="width:100px;">
                        <a href="<?php echo $match[0][0]; ?>"><?php _e('Download PDF', 'aspta'); ?></a>
                    </p>
                </div>
        	</div><?php
        endif;
    endwhile;?>
	</div><?php
endif;