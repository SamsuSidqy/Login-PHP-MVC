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

		if ($value) {
			$username = $request['email'];
			$password = $request['password'];

			if ($email && $password) {
				$_SESSION['authentication'] = true;
				$_SESSION['user'] = 'asep';
				header('Location:'.$_ENV['ADDRESS']);
			}
		}
	}

}
