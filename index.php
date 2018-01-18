<?php

include "twitteroauth/twitteroauth.php";

$consumer_key = "XXXXXXXXXXXXXXX";
$consumer_secret = "XXXXXXXXXXXXXXX";
$access_token = "XXXXXXXXXXXXXXX";
$access_token_secret = "XXXXXXXXXXXXXXX";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

//$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=gdgjalandhar&result_type=recent&count=20');
//print_r($tweets);
//$tweetsme = $twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json');//?q=gdgjalandhar&result_type=recent&count=20');
//print_r($tweetsme);
$t_has_gdgjalandhar1 = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=%23gdgjalandhar');
$t_has_gdgjalandhar = $twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=gdgjalandhar');
//print_r($t_has_gdgjalandhar);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tweets GDGJalandhar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">
    <?php
    foreach ($t_has_gdgjalandhar1->statuses as $key => $tweet) {
       if  (isset($tweet->entities->media)) {
        $media_url = $tweet->entities->media[0]->media_url; // Or $media->media_url_https for the SSL version.
        //echo '<img src="'.$media_url.'" alt="">';
        echo '<div class="col-md-3">';
        echo '<div class="card">';
        echo '<div class="card-header">';
        echo '<img class="card-img-bottom" src="'.$tweet->user->profile_image_url.'" alt="Card image" style="width:40%">';
        echo '<p class="card-title">'.$tweet->user->name.'</p>';
        echo '</div>';
        echo '<img class="card-img-top" src="'.$media_url.'" alt="Media by user" style="width:40%">';
        echo '<div class="card-body">';
        echo '<p class="card-text"> Tweeted At: '.$tweet->created_at.'</p>';
        echo '<p class="card-text">'.$tweet->text.'</p>';
        echo '<a href="'.$tweet->entities->media[0]->url.'" class="btn btn-primary">See Post</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      else {
        echo '<div class="col-md-3">';
        echo '<div class="card">';
        echo '<div class="card-header">';
        echo '<img class="card-img-bottom" src="'.$tweet->user->profile_image_url.'" alt="Card image" style="width:40%">';
        echo '<p class="card-title">'.$tweet->user->name.'</p>';
        echo '</div>';
        echo '<img class="card-img-top" src="images/download.png" alt="Media by user" style="width:40%">';
        echo '<div class="card-body">';
        echo '<p class="card-text"> Tweeted At: '.$tweet->created_at.'</p>';
        echo '<p class="card-text">'.$tweet->text.'</p>';
        $add1='https://twitter.com/shivprakash1997/status/';
        $add2=$tweet->id_str;
        echo '<a href="'.$add1.$add2.'" class="btn btn-primary">See Post</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    }?>
  <?php foreach ($t_has_gdgjalandhar as $key => $tweet) {
    echo '<div class="col-md-3">';
    echo '<div class="card">';
    echo '<div class="card-header">';
    echo '<img class="card-img-bottom" src="'.$tweet->user->profile_image_url.'" alt="Card image" style="width:40%">';
    echo '<p class="card-title">'.$tweet->user->name.'</p>';
    echo '</div>';
    echo '<img class="card-img-top" src="images/download.png" alt="Media by user" style="width:40%">';
    echo '<div class="card-body">';
      echo '<p class="card-text"> Tweeted At: '.$tweet->created_at.'</p>';
      echo '<p class="card-text">'.$tweet->text.'</p>';
      if  (isset($tweet->entities->urls[0])) {
      echo '<a href="'.$tweet->entities->urls[0]->url.'" class="btn btn-primary">See Post</a>';
      }
      else {
        echo '<a href="#" class="btn btn-danger">Link Not available</a>';
      }
      echo '</div>';
      echo '</div>';
      echo '</div>';

   } ?>
 </div>
</div>

</body>
</html>
