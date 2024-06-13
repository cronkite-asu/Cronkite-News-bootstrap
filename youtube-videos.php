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

// Get videos from channel by YouTube Data API
echo $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$Channel_ID.'&maxResults='.$Max_Results.'&key='.$API_Key.'');
if($apiData){
    echo 'HERE';
    $videoList = json_decode($apiData);
}else{
    echo 'Invalid API key or channel ID.';
}
if(!empty($videoList->items)){
    echo 'HERE 2';
    foreach($videoList->items as $item){
        // Embed video
        if(isset($item->id->videoId)){
            echo '
            <div class="yvideo-box">
                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                <h4>'. $item->snippet->title .'</h4>
            </div>';
        }
    }
}else{
    echo '<p class="error">'.$apiError.'</p>';
}

?>
