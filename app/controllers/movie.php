<?php

class Movie extends Controller {
  public function index() {
    $this->view('movie/index');
  }
  public function search() {
    if(!isset($_REQUEST['movie'])){
       // if search is empty, return to movie page.
      die("Movie not found.");
      header('Location: /movie');
    }
  
    $title = urlencode(trim($_GET['title']));
    $api_key = $_ENV['omdb_key'];
    $queryurl = "http://www.omdbapi.com/?t=" . $title . "&apikey=" . $api_key;

    $json = file_get_contents($queryurl);
    $object = json_decode($json);

    if (!object || $object->Response == "False"){
      die("Movie not found.");
    } 
    $title = (array) $object;

    require_once 'app/database.php';
    $db = db_connect();
    
  }
 
}

?>