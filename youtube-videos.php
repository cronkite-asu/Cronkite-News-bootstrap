<?php
/**
 * Template Name: Youtube Videos list
 */
get_header('new2019');

echo 'HERE!';

$API_key    = 'AIzaSyD18QZUABnzCt1YPyxgVZbgVZpjQ1PKRGI';
$channelID  = 'UCO8tHWm0LQy3QWFcnZeV4CQ';
$max_results = 50000;
$table = array();
$file_name = 'all-videos.json';

function youtube_search($API_key, $channelID, $max_results, $next_page_token,$videos,$file){

    $dataquery = "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=".$channelID."&maxResults=".$max_results."&order=date&pageToken=".$next_page_token."&key=".$API_key;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $dataquery);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);

    $data = json_decode($response);


    foreach ($data->items as $item){
        array_push($videos,$item);
    }

    $content = json_encode($videos);
    print_r($content);
    file_put_contents($file, $content);

    if(!empty($data->nextPageToken)){

        youtube_search($API_key, $channelID, $max_results, $data->nextPageToken, $videos, $file);
    }
}

youtube_search($API_key, $channelID, $max_results, $next_page_token='', $table, $file_name);
?>
