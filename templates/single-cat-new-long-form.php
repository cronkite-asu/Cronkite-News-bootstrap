<?php
  $post = $wp_query->post;

  if (in_category('noticias')) {
    get_template_part( 'partials/content', 'long-form-noticias' );
  } else if (get_the_ID() == 188653) {    
    get_template_part( 'partials/content', 'long-form-biosphere' );
  } else {
    get_template_part( 'partials/content', 'long-form-news' );
  }
?>
