<?php

require_once __DIR__ . '/../../view/template.php';
require_once __DIR__ . '/../../model/user/User.php';
require __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();



class Login{
	
	public static function Index($request,$page,$type){
		$views = new Template();
		$data = new User();


		$data = [
			"data" => $data->getAllData(),
		];

		return $views->view($page,$type,$data);
	}

	public static function HandleLogin($request,$page,$type){
		$value = extract($request);
		$user = new User();
		if ($value) {
			$email = $request['email'];
			$password = $request['password'];

			if ($email && $password) {
				list($option,$result) = $user->authenticate($email,$password);

				if ($option) {
					$_SESSION['authentication'] = true;
					$_SESSION['user'] = $result['username'];
					$_SESSION['id'] = $result['id'];
					$_SESSION['expired'] = time();
					header('Location:'.$_ENV['ADDRESS']);
				}

			}
		}
	}

}
