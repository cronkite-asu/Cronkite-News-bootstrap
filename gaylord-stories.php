<?php
/*
  Template Name: Gaylord Stories
*/
get_header('new2019'); ?>

<?php
  /*$args = array(
    'author' => 29,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'category__not_in' => array( 11 ),
    'date_query' => array(
                      array(
                          'after'     => 'January 1, 2021',
                          'before'    => 'today',
                          'inclusive' => true
                    ))
  );*/

  $args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'suppress_filters' => FALSE,
    /*'category__not_in' => array( 11 ),*/
    'date_query' => array(
                      array(
                          'after'     => 'Janaury 1, 2021',
                          'before'    => 'today',
                          'inclusive' => true
                    )),
    'posts_per_page' => -1,
    'meta_query'	=> array(
      //'relation' => 'OR',
      array(
        'key'		=> 'author_title_site',
        'compare'	=> 'LIKE',
        'value'		=> 'gaylord news'
      )
    )
   );

  $query = new WP_Query( $args );
  echo '<p>Count: '.$count = $query->found_posts.'</p>';
?>

<?php if ( $query->have_posts() ) : ?>
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <p><a href="<? echo get_permalink(); ?>" target="_blank"><?php echo get_the_title(); ?></a> <strong>by</strong> <?php echo $author = get_the_author(); ?></p>

  <?php endwhile; ?>
<?php endif; ?>

<hr />


<?php get_footer(); ?>
