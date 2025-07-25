<?php

class omdb extends Controller {
  public function index() {
    $queryUrl = "http://www.omdbapi.com/?i=tt3896198&apikey=".$_ENV['omdb_key']."&t=the+matrix&y=1999";

    $json = file_get_contents($queryUrl);
    $phpObj = json_decode($json);
    $movie =  (array) $phpObj;

    echo "<pre>";
    print_r ($movie);
    die;

  }
  
}
?>