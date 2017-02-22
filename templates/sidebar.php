  <?php
    if('campanha' == get_post_type())
      dynamic_sidebar('sidebar-campaign');
    if('article' == get_post_type())
      dynamic_sidebar('sidebar-articles-newspaper');
  ?>
  <?php dynamic_sidebar('sidebar-primary'); ?>
