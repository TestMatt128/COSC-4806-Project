<?php

class Home extends Controller {

    public function index() {
      $user = $this->model('User');
      $data = $user->test();

      $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=".$_ENV['Gemini'];

        $data = array(
          "contents" => array(
            array(
              "parts" => array(
                array(
                  "text" => 'Please write a movie review for the movie "The Matrix" with a rating of 8.5.'
                )
              )
            )
          )
        );

        $json_data = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        if(curl_close($ch)){
          echo 'Curl Error.'. curl_error($ch);
        }
        $response_data = json_decode($response, true);
        echo "<pre>";
        echo $response_data['candidates'][0]['content']['parts'][0]['text'];
        die;

        $this->view('home/index');
        die;
      
    }
  
}
