<?php use Roots\Sage\Titles;

$issue = false;
if (isset($_REQUEST['issue']) ) {
	$issue = get_term_by('slug', esc_attr($_REQUEST['issue']), 'issuem_issue');
} else {
	$issue = get_term_by( 'id', get_newest_issuem_issue_id(), 'issuem_issue' );
}
?>

<div class="lista page-header newspaper-header">
  <div class="titulo-pagina newspaper-title"><h1><?= get_issuem_issue_title($issue->term_id); ?></h1></div>
  <?php
  $issue_meta = get_option( 'issuem_issue_' . $issue->term_id . '_meta' );
  if( is_array($issue_meta) && isset( $issue_meta['cover_image'] ) ):
  ?>
  	<div class="newspaper-cover"><?= wp_get_attachment_image(get_issuem_issue_cover($issue->term_id), 'issuem-cover-image'); ?></div><!-- using widget for this -->
  <?php
  endif;
  ?>
  <div class="newspaper-descricao"><?= $issue->description; ?></div>
</div>
