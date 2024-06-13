<?php
/**
 * Template Name: Youtube Videos list
 */
get_header('new2019');

echo 'HERE!';


// API config
$API_Key    = 'AIzaSyD18QZUABnzCt1YPyxgVZbgVZpjQ1PKRGI';
$Channel_ID = 'UCO8tHWm0LQy3QWFcnZeV4CQ';
$Max_Results = 5000;

$baseUrl = 'https://www.googleapis.com/youtube/v3/';
   // https://developers.google.com/youtube/v3/getting-started
   $apiKey = 'AIzaSyD18QZUABnzCt1YPyxgVZbgVZpjQ1PKRGI';
   // If you don't know the channel ID see below
   $channelId = 'UCO8tHWm0LQy3QWFcnZeV4CQ';

   $params = [
       'id'=> $channelId,
       'part'=> 'contentDetails',
       'key'=> $apiKey
   ];
   $url = $baseUrl . 'channels?' . http_build_query($params);
   $json = json_decode(file_get_contents($url), true);

   $playlist = $json['items'][0]['contentDetails']['relatedPlaylists']['uploads'];

   $params = [
       'part'=> 'snippet',
       'playlistId' => $playlist,
       'maxResults'=> '5000',
       'key'=> $apiKey
   ];
   $url = $baseUrl . 'playlistItems?' . http_build_query($params);
   $json = json_decode(file_get_contents($url), true);

   $videos = [];
   foreach($json['items'] as $video)
       $videos[] = $video['snippet']['resourceId']['videoId'];

   while(isset($json['nextPageToken'])){
       $nextUrl = $url . '&pageToken=' . $json['nextPageToken'];
       $json = json_decode(file_get_contents($nextUrl), true);
       foreach($json['items'] as $video)
           $videos[] = $video['snippet']['resourceId']['videoId'];
   }
   print_r($videos);

?>
