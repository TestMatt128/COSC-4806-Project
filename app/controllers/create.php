<?php

class Create extends Controller {

    public function index() {		
	    $this->view('create/index');
    }
    public function create(){
      $user = $this->model('User');
      $username = trim($_POST['username']);
      $password = $_POST['password'];

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      if($user->create($username, $hashed_password)){
        header('Location: /home');
        exit;
      }
    }
}
