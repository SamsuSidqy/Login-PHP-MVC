<?php  
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
session_start();

require __DIR__ . '/vendor/autoload.php';
require 'app/route.php';
require 'app/middleware.php';
require 'controller/user/Login.php';
require 'controller/user/Register.php';
require 'controller/dash/Settings.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Controller
$Controllerlogin = new Login();
$ControllerRegister = new Register();
$ControllerSetting = new SettingsController();

// Middleware
$Middleware = new MiddlewareMain();

$route = new Route();






if (isset($_GET['page']) && empty($_SESSION['authentication']) OR !isset($_SESSION)) {
	
	if ($_GET['page'] == 'login') {
		$route::get($_GET,'login',$Controllerlogin::Index($_GET,'login','auth'));		

	}else if($_GET['page'] == 'register'){
		$route::get($_GET,'register',$ControllerRegister::Index($_GET,'register','auth'));
	}else{
		include 'view/errors/404.php';
	}
	
	

	
}else if(isset($_GET['page']) && isset($_SESSION['authentication'])){
	$cek = $Middleware::ExpiredSession($_SESSION['expired']);
	if ($_GET['page'] == 'settings' && $cek == false) {
		$route::get($_GET,'settings',$ControllerSetting::Index($_GET,'settings','authenticated'));
	}else{
		include 'view/errors/404.php';
	}
}else{
	if (isset($_SESSION['authentication'])) {
		$cek = $Middleware::ExpiredSession($_SESSION['expired']);
		if($cek == false){
			include 'view/dashboard/index.php';
			
		}
		header('Location:'. $_ENV['ADDRESS'].'?page=login&message=timesout');
	}else{
		header('Location:'. $_ENV['ADDRESS'].'?page=login');
	}
}


?>