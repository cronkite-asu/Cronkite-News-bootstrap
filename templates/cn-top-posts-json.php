<?php
/*
Template Name: Election 2020 Top Posts JSON Feed
Created: Monday, Sept. 21, 2020
*/

header("Content-Type: application/json; charset=UTF-8");
?>

<?php
    $json = array();

if (have_rows('main_stories', 'option')) {
    while (have_rows('main_stories', 'option')) {
        the_row();
        $source = ucwords(str_replace('-', ' ', get_sub_field('source')));
        $it = array(
        'title' => get_sub_field('headline'),
        'description' => get_sub_field('summary'),
        'image' => get_sub_field('photo'),
        'link' => get_sub_field('external_link'),
        'pubDate' => get_post_time('D, d M Y H:i:s O', true),
        'source' => $source
        );
        $json[] = $it;
    }
}
    echo(json_encode($json, JSON_PRETTY_PRINT));
?>
