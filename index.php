<?php

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/flickr.api.php";
require __DIR__ . "/config.php";

$img    = "";
$rand   = "";

if(isset($_GET["tag"]))
{
    $img  = getPhotos($_GET["tag"], $flickrApiKey);
    $rand = array_rand($img);
    $rand = $img[$rand];
}

if(!isset($_GET["fb"]))
{
    // OUTPUT JUST FOR TESTING
    echo "Count: " . count($img) . "<br />";
    echo "Random Image: " . $rand['url_l'] . "<br />";
    echo "<img width='200' src='" . $rand["url_l"] . "'/>";
    echo "<hr />";
    foreach ($img as $imgurl)
    {
        echo "<img width='100' src='" . $imgurl["url_sq"] . "'/>";
    }
}
else
{
    $fb = new Facebook\Facebook([
        "app_id"        => $fbAppID,
        "app_secret"    => $fbAppSecret,
        "default_graph_version" => "v2.2",
    ]);
    $data = [
        "message"   => "Awesome kitten for world domination!",
        "picture"   => $rand["url_l"],
        "link"      => $rand["url_l"],
        // "name"   => "NAME OF IMGE HERE",
        // "caption" => "PLACE IMAGEECAPTION HERE",
        "privacy" => ["value" => "EVERYONE"]
    ];

    $fb->post("/me/feed", $data, $fbAccessToken);
}

/**
 * @param $tags
 * @param $apikey
 * @return array
 */
function getPhotos($tags, $apikey)
{
    $flickr = new FlickrApi($apikey);
    $params = [
        "method"	    => "flickr.photos.search",
        "tags"          => $tags,
        "content_type"  => 7,
        "extras"        => "url_l,url_sq",
        "media"         => "photos",
        "sort"          => "relevance",
        "per_page"      => 500
    ];
    $photos = $flickr->api($params); // GET PHOTOS
    $result = [];

    foreach($photos['photos']['photo'] as $p)
    {
        if(!isset($p['url_l'])) continue; // DOESN'T HAVE BIG IMAGE, SKIP IT
        $data   = [];
        $data['url_l']  = $p['url_l'];
        $data['url_sq'] = $p['url_sq'];
        $result[] = $data;
        if(count($result) >= 500) return $result; // ANYWAY, 500 IMAGES IS THE LIMIT
    }
    shuffle($result);
    return $result;
}

die();