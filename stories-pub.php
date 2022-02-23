<?php
/*
  Template Name: Story pub
*/
get_header('new2019'); ?>

<h2>L.A.</h2>
<?php
  $args = array(
    'author' => 29,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'category__not_in' => array( 11 ),
    'date_query' => array(
                      array(
                          'after'     => 'August 18, 2021',
                          'before'    => 'today',
                          'inclusive' => true
                    ))
  );

  $args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'suppress_filters' => FALSE,
    'category__not_in' => array( 11 ),
    'date_query' => array(
                      array(
                          'after'     => 'May 20, 2020',
                          'before'    => 'today',
                          'inclusive' => true
                    )),
    'posts_per_page' => -1,
    'meta_query'	=> array(
      'relation' => 'OR',
      array(
        'key'		=> 'byline_info_cn_staff',
        'compare'	=> 'LIKE',
        'value'		=> '137386'
      ),
      array(
        'key'		=> 'byline_info_cn_staff',
        'compare'	=> 'LIKE',
        'value'		=> '129167'
      ),
      array(
        'key'		=> 'byline_info_cn_staff',
        'compare'	=> 'LIKE',
        'value'		=> '137214'
      ),
      array(
        'key'		=> 'byline_info_cn_staff',
        'compare'	=> 'LIKE',
        'value'		=> '142625'
      ),
      array(
        'key'		=> 'byline_info_cn_staff',
        'compare'	=> 'LIKE',
        'value'		=> '142666'
      ),
      array(
        'key'		=> 'byline_info_cn_staff',
        'compare'	=> 'LIKE',
        'value'		=> '142660'
      ),
      array(
        'key'		=> 'byline_info_cn_staff',
        'compare'	=> 'LIKE',
        'value'		=> '142767'
      ),
      array(
        'key'		=> 'byline_info_cn_staff',
        'compare'	=> 'LIKE',
        'value'		=> '142738'
      ),
      array(
        'key'		=> 'byline_info_cn_staff',
        'compare'	=> 'LIKE',
        'value'		=> '142718'
      ),
      array(
        'key'		=> 'byline_info_cn_staff',
        'compare'	=> 'LIKE',
        'value'		=> '129816'
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

<h2>D.C.</h2>

<?php
  $args = array(
    'author' => 29,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'category__not_in' => array( 11 ),
    'date_query' => array(
                      array(
                          'after'     => 'August 18, 2021',
                          'before'    => 'today',
                          'inclusive' => true
                    ))
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

<h2>PHOENIX</h2>
<?php
  $args = array(
    'author' => -29,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    /*'category__not_in' => array( 11 ),*/
    'date_query' => array(
                      array(
                          'after'     => 'August 18, 2021',
                          'before'    => 'today',
                          'inclusive' => true
                    ))
  );
  $query = new WP_Query( $args );
  echo '<p>Count: '.$count = $query->found_posts.'</p>';
?>

<?php if ( $query->have_posts() ) : ?>
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <p><a href="<? echo get_permalink(); ?>" target="_blank"><?php echo get_the_title(); ?></a> <strong>by</strong> <?php echo $author = get_the_author(); ?></p>

  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
