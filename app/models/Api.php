<?php

class Api {

  public $movie;
  public $average;
  public $rating;

    public function __construct(){
      
    }
    public function generateMovieReview($movie, $average){
      $apiKey = $_ENV['Gemini'];
      $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=".$_ENV['Gemini'];
      $data = array(
        "contents" => array(
          array(
            "parts" => array(
              array(
                "text" => 'Please write a movie review for the movie '.$movie.' with a rating of '.$average.' Make the review sound like a movie critic and to the point.'
              )
            )
          )
        )
      );
  
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
      curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Content-Type: application/json',
          'X-goog-api-key: ' . $apiKey
      ]);
      $response = curl_exec($ch);
      curl_close($ch);
      if(curl_close($ch)){
        echo 'Curl Error.'. curl_error($ch);
      }
      $response_data = json_decode($response, true);
      return $response_data['candidates'][0]['content']['parts'][0]['text'] ?? 'No review generated.';
    }
  public function generateUserReview($movie, $rating){
    $apiKey = $_ENV['Gemini'];
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=".$_ENV['Gemini'];
    $data = array(
      "contents" => array(
        array(
          "parts" => array(
            array(
              "text" => 'Now you do your user review~ Please write a movie review for the movie '.$movie.' with a rating of '.$rating.' of your choice. Feel free to express your opinions on it in any way you want.'
            )
          )
        )
      )
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'X-goog-api-key: ' . $apiKey
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    if(curl_close($ch)){
      echo 'Curl Error.'. curl_error($ch);
    }
    $response_data = json_decode($response, true);
    return $response_data['candidates'][0]['content']['parts'][0]['text'] ?? 'No review made.';
  }
  
}