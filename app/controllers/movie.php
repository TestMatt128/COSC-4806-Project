<?php

class movie {
  public function index() {
    header ("Location: /");
    exit;
  }
  public function search() {
    if(isset($_GET['title']) || empty(trim($_GET['title']))) {
      die("Please enter a movie title.");
    }

    $title = urlencode(trim($_GET['title']));
    $api_key = $_ENV['omdb_key'];
    $queryurl = "http://www.omdbapi.com/?t=" . $title . "&apikey=" . $api_key;

    $json = file_get_contents($queryurl);
    $object = json_decode($json);

    if (!object || $object->Response == "False"){
      die("Movie not found.");
    }
    $movie = (array) $object);

    require_once 'app/database.php';
    $db = db_connect();
  }
}

?>