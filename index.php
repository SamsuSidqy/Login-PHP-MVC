<?php  
session_start();
require __DIR__ . '/vendor/autoload.php';
require 'app/route.php';
require 'controller/user/Login.php';
require 'controller/user/Register.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Controller
$Controllerlogin = new Login();
$ControllerRegister = new Register();


$route = new Route();

if (isset($_GET['page'])) {
	
	if ($_GET['page'] == 'login') {
		$route::get($_GET,'login',$Controllerlogin::Index($_GET,'login','auth'));		
	}else if($_GET['page'] == 'register'){
		$route::get($_GET,'register',$ControllerRegister::Index('register','auth'));
	}

	
}else{
	if ($_SESSION['authentication'] && $_SESSION['user'] != null) {
		include 'view/dashboard/index.php';	
	}else{
		header('Location:' . $_ENV['ADDRESS'] . '?page=login&message=LoginRequired');
	}
}




?>