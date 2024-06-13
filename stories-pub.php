<?php
/**
 * Template Name: Story pub
 */
get_header('new2019'); ?>


<h2>Published stories</h2>

<?php
//22877 - noticias
//11 - newscast

  $args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'category__not_in' => [ 11 ],
    'date_query' => [
                      [
                          'after'     => 'January 1, 2023',
                          'before'    => 'December 31, 2023',
                          'inclusive' => true,
                    ]],
  ];
$query = new WP_Query($args);
echo '<p>Count: '.$count = $query->found_posts.'</p>';
?>

<?php if ($query->have_posts()) : ?>
  <table>
  <thead>
    <tr>
      <th width="30%">Title</th>
      <th width="20%">Verticals</th>
      <th width="20%">Author</th>
      <th width="20%">URL</th>
      <th width="10%">Pub Date</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
      <tr>
        <td><?php echo get_the_title(); ?></td>
        <td></td>
        <td><a href="<?php echo get_permalink(); ?>" target="_blank"><?php echo get_permalink(); ?></a></td>
        <td><strong>by</strong> <?php echo $author = get_the_author(); ?></td>
        <td><?php get_the_date('F M Y'); ?>  </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<?php endif; ?>


<?php get_footer(); ?>
