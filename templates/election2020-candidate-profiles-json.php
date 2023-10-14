<?php
/**
 * Template Name: Election 2020 - Candidate Profiles Sidebar
 * Created: Monday, Sept. 28, 2020
 */

header("Content-Type: application/json; charset=UTF-8");
?>

<?php
    $json = [];

if (have_rows('candidate_profiles', 'option')) {
    while (have_rows('candidate_profiles', 'option')) {
        the_row();
        $it = [
        'headline' => get_sub_field('headline'),
        'image' => get_sub_field('photo'),
        'link' => get_sub_field('link'),
        'pubDate' => get_post_time('D, d M Y H:i:s O', true),
        ];
        $json[] = $it;
    }
}
echo(json_encode($json, JSON_PRETTY_PRINT));
?>
