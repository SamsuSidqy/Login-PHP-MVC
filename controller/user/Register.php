<?php

require_once __DIR__ . '/../../view/template.php';
require_once __DIR__ . '/../../model/user/User.php';

class Register{

	public static function Index($request,$page,$type){
		$views = new Template();	

		return $views->view($page,$type);
	}

	public static function HandleRegister($request,$page,$type){
		$user = new User();
		$views = new Template();		

		if (extract($request)) {
			$username = $request['username'];
			$email = $request['email'];
			$password = password_hash($request['password'],PASSWORD_DEFAULT);
			$name = $request['name'];

			$cekEmail = $user->cekEmail($request['email']);
			if ($cekEmail > 0) {
				return false;	
			}

			list($option,$result) = $user->insertUser($email,$username,$password,$name);
			var_dump($option);
			if ($option) {
				$_SESSION['authentication'] = true;
				$_SESSION['user'] = $username;
				$_SESSION['id'] = $result;
				$_SESSION['expired'] = time();
				header('Location:'.$_ENV['ADDRESS']);
			}
		}
	}

}
