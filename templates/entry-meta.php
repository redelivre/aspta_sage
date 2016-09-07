<time class="updated" datetime="<?php get_post_time('c', true); ?>"><?php get_the_date(); ?></time>
<p class="byline author vcard"><?php __('By', 'aspta'); ?> <a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php get_the_author(); ?></a></p>
