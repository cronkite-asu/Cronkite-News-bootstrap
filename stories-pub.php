<?php
/**
 * Template Name: Story pub
 */
get_header('new2019'); ?>


<h2>Published stories</h2>

<?php
  $args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'category__not_in' => [ 11, 22877 ],
    'date_query' => [
                      [
                          'after'     => 'August 1, 2022',
                          'before'    => 'January 15, 2022',
                          'inclusive' => true,
                    ]],
  ];
$query = new WP_Query($args);
echo '<p>Count: '.$count = $query->found_posts.'</p>';
?>

<h2>Sports stories</h2>

<?php
  $args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'category__in' => [ 185 ],
    'date_query' => [
                      [
                          'after'     => 'May 16, 2024',
                          'before'    => 'August 15, 2024',
                          'inclusive' => true,
                    ]],
  ];
$query = new WP_Query($args);
echo '<p>Count: '.$count = $query->found_posts.'</p>';
?>



<?php get_footer('new2020'); ?>
