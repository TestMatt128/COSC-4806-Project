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
                "text" => 'Print Numbers 1-10.'
              )
            )
          )
        )
      );

      $json_data = json_encode($data);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
      $response = curl_exec($ch);
      curl_close($ch);
      if(curl_close($ch)){
        echo 'Curl Error.'. curl_error($ch);
      }
      $response_data = json_decode($response, true);
      echo "<pre>";
      print_r($response_data);
      die;

	    $this->view('home/index');
	    die;
    }

}
