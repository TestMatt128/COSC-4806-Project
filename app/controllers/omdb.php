<?php

class omdb extends Controller {
  public function index() {
    if (isset($_GET['title']) || empty(trim($_GET['title']))){
      die('Please enter a movie title.');
    }
    $title = urlencode(trim($_GET['title']));
    $apiKey = $_ENV['omdb_key'];
    $queryUrl = "http://www.omdbapi.com/?apikey=$apiKey&t=$title";

    $json = file_get_contents($queryUrl);
    $phpObj = json_decode($json);

    if(!$phpObj || $phpObj->Response == "False"){
      die('Movie not found.');
    }
    $movie =  (array) $phpObj;

    require_once 'app/database.php';
    $db = db_connect();

    echo "<pre>";
    print_r ($movie);
    die;

  }
  
}
?>