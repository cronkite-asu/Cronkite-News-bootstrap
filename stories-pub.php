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
                          'after'     => 'September 1, 2022',
                          'before'    => 'April 30, 2025',
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
                          'after'     => 'September 1, 2022',
                          'before'    => 'April 30, 2025',
                          'inclusive' => true,
                    ]],
  ];
$query = new WP_Query($args);
echo '<p>Count: '.$count = $query->found_posts.'</p>';
?>



<?php get_footer('new2020'); ?>
