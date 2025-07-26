<?php

class Home extends Controller {

    public function index() {
      $user = $this->model('User');
      $data = $user->test();

      $this->view('home/index');
        die;
      }

      private function generateMovieReview($movie, $average){
        $api_key = $_ENV['Gemini'];
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=".$_ENV['Gemini'];

      $data = array(
        "contents" => array(
          array(
            "parts" => array(
              array(
                "text" => 'Please post a movie review for the movie '.$movie.' with an average rating of '.$average.' stars. Make sure to include a rating out of 10 stars as well as some overviews of them without resorting to AI generating texts.'
              )
            )
          )
        )
      );

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encode($data));
      curl_setopt($ch, CURLOPT_HTTPHEADER,['Content-Type: application/json', 'X-Goog-Api-Key:'.$api_key]);
        
      $response = curl_exec($ch);
      curl_close($ch);
      if(curl_close($ch)){
        echo 'Curl Error.'. curl_error($ch);
      }
      $response_data = json_decode($response, true);

      return $response_data['candidates'][0]['content']['parts'][0]['text'] ?? 'No review available.';
    }
  
  private function generateUserReview($movie, $rating) {
    $api_key = $_ENV['Gemini'];
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=".$_ENV['Gemini'];

    $data = array(
      "contents" => array(
        array(
          "parts" => array(
            array(
              "text" => 'What is your opinion on the movie '.$movie.'? Please write your review and also the '.$rating.' rating of the movie out of 10 stars.'
            )
          )
        )
      )
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER,['Content-Type: application/json', 'X-Goog-Api-Key:'.$api_key]);

    $response = curl_exec($ch);
    curl_close($ch);

    $response_data = $json_decode($response, true);
    return $response['candidates'][0]['content']['parts'][0]['text'] ?? 'No review available.';
  }
}
