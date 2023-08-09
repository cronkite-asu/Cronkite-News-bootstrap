<?php
  $post = $wp_query->post;

  if (in_category('noticias')) {
      get_template_part('partials/content', 'long-form-noticias');
  } else if (get_the_ID() == 188653) {
      get_template_part('partials/content', 'long-form-biosphere');
  } else if (get_the_ID() == 213407) {
      get_template_part('partials/content', 'long-form-eve-insomnia');
  } else {
      get_template_part('partials/content', 'long-form-news');
  }
?>
