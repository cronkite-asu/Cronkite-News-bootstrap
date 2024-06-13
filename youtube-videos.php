<?php
/**
 * Template Name: Youtube Videos list
 */
get_header('new2019');

// Your API key
$apiKey = 'AIzaSyD18QZUABnzCt1YPyxgVZbgVZpjQ1PKRGI';

// Channel ID (replace with the ID of the channel you want to get videos from)
$channelId = 'UCO8tHWm0LQy3QWFcnZeV4CQ';

// Define the base URL for the YouTube API
$apiUrl = 'https://www.googleapis.com/youtube/v3/search';

// Function to fetch data from the YouTube API
function fetchData($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    return json_decode($data, true);
}

// Function to get all videos from a channel
function getAllVideos($apiKey, $channelId) {
    $videos = [];
    $pageToken = '';

    do {
        // Prepare the API URL with parameters
        $url = sprintf(
            '%s?part=snippet&channelId=%s&maxResults=50&order=date&type=video&key=%s&pageToken=%s',
            $apiUrl,
            $channelId,
            $apiKey,
            $pageToken
        );

        // Fetch data from the API
        $data = fetchData($url);

        // Check if we got a valid response
        if (isset($data['items'])) {
            // Add videos to the list
            $videos = array_merge($videos, $data['items']);
        }

        // Get the next page token
        $pageToken = isset($data['nextPageToken']) ? $data['nextPageToken'] : '';
    } while (!empty($pageToken));

    return $videos;
}

// Fetch all videos
$videos = getAllVideos($apiKey, $channelId);

// Output the video titles and IDs
foreach ($videos as $video) {
    $videoId = $video['id']['videoId'];
    $title = $video['snippet']['title'];
    echo "Title: $title, Video ID: $videoId\n";
}
?>
