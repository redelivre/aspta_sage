<?php use Roots\Sage\Titles;

if (!isset($issue)) {
  $issue = get_term_by('id', get_newest_issuem_issue_id(), 'issuem_issue');
} ?>

<div class="lista page-header newspaper-header">
  <div class="titulo-pagina newspaper-title"><h1><?= get_issuem_issue_title(); ?></h1></div>
  <div class="newspaper-cover"><?= wp_get_attachment_image(get_issuem_issue_cover(), 'issuem-cover-image'); ?></div><!-- using widget for this -->
  <div class="newspaper-descricao"><?= $issue->description; ?></div>
</div>
