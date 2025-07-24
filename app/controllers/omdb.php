<?php

class omdb extends Controller {
  public function index() {
    $queryurl = "http://www.omdbapi.com/?apikey=4304688b&s=" . $_ENV['omdb_key'];

    echo "<pre>";
    print_r($movie);
    die;
  }
}
?>