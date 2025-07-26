<?php

class Login extends Controller {
	// sample logins for the professor:
	// username: Test, password: Test1234
	// username: Matt, password: Hi
	
    public function index() {		
	    $this->view('login/index');
    }
    
    public function verify() {
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];

			
			$user = $this->model('User');
			$user->authenticate($username, $password); 
    }

}
